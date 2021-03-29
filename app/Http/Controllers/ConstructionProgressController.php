<?php

namespace App\Http\Controllers;

use App\Models\ConstructionProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConstructionProgressController extends Controller
{
    public function index(){
        return view('con-progress.search');
    }

    public function store(Request $request){
        $messages = [
            'required' => ':attribute không được để trống',
        ];
        $customAttr = [
            'code' => 'Mã tiến trình',
        ];
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
        ],$messages,$customAttr);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator->errors());
        }

        $code = $request->code;
        $progress = ConstructionProgress::where('code',$code)->first();
        if($progress){
            return view('con-progress.detail',compact('progress'));
        }
        return redirect()->back()->with('status', 'Không tìm thấy thi công nào');
    }
}
