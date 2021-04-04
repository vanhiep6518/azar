<?php

namespace App\Http\Controllers;

use App\Mail\AdviceMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class AdviceController extends Controller
{
    public function sendAdvice(Request $request){
        $messages = [
            'required' => ':attribute không được để trống',
        ];
        $customAttr = [
            'name' => 'Tiêu đề Dự án',
            'phone' => 'Nội dung Dự án',
            'email' => 'Danh mục',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
        ],$messages,$customAttr);

        if ($validator->fails()) {
            return json_encode(['status'=>'fail','errors'=>$request->all()]);
        }
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message ?? '',
        ];

        Mail::to(env('APP_MAIL'))->send(new AdviceMail($data));
        return json_encode(['status'=>'success']);
    }
}
