<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    public function passwordResetProcess(Request $request){
        if ($request->getMethod() == 'GET') {
            $email = $request->input(['email']);
            $token = $request->input(['token']);
            return view('admin.auth.reset-password-process',compact('email','token'));
        }
        $messages = [
            'password.regex' => 'The password field must contain at least one capital letter.',
            'required' => 'Enter your :attribute'
        ];
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|confirmed|min:8|regex:/[A-Z]/',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator->errors());
        }
//        dd($request);
        return $this->updatePasswordRow($request)->count() > 0 ? $this->resetPassword($request) : $this->tokenNotFoundError();
    }

    // Verify if token is valid
    private function updatePasswordRow($request){
        return DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ]);
    }

    // Token not found response
    private function tokenNotFoundError() {
        return redirect()->back()->withInput()
            ->withErrors(['password' => 'Token not found!']);
    }

    // Reset password
    private function resetPassword($request) {
        // find email
        $userData = Admin::whereEmail($request->email)->first();
        // update password
        $userData->update([
            'password'=>bcrypt($request->password)
        ]);
        // remove verification data from db
        $this->updatePasswordRow($request)->delete();

        // reset password response
        return view('admin.auth.success-reset-password');
    }

}
