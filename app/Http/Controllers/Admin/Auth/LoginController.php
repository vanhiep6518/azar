<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Mail\MailResetPassword;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('admin.auth.login');
        }

        $credentials = $request->only(['email', 'password']);
        $remember = $request->has('remember-me') ? true : false;

        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/login')
                ->withErrors($validator)
                ->withInput();
        }
        if (Auth::guard('admin')->attempt($credentials,$remember)) {
            return redirect()->route('admin.project');
        } else {
            return redirect()->back()->withInput()->withErrors(['login-err' => 'Tài khoản của bạn không tồn tại trên hệ thống']);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function sendResetPassword(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('admin.auth.reset-password');
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255|email',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/login')
                ->withErrors($validator)
                ->withInput();
        }

        if ($this->validEmail($request->input('email'))) {
//            send mail
            $this->sendMailResetPassword($request->input('email'));
            return view('admin.auth.confirm-reset-password');
        } else {
            return redirect()->back()->withInput()
                ->withErrors(['email' => 'Email không tồn tại trên hệ thống']);
        }
    }

    public function sendMailResetPassword($email){
        $token = $this->generateToken($email);
        $user = Admin::where('email', $email)->first();
        Mail::to($email)->send(new MailResetPassword($user, $token));
    }

    public function validEmail($email) {
        return !!Admin::where('email', $email)->first();
    }

    public function generateToken($email){
        $isOtherToken = DB::table('password_resets')->where('email', $email)->first();

        if($isOtherToken) {
            return $isOtherToken->token;
        }

        $token = Str::random(80);;
        $this->storeToken($token, $email);
        return $token;
    }

    public function storeToken($token, $email){
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }


}
