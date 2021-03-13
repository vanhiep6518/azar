<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DataHelpers;
use App\Helpers\StringHelpers;
use App\Http\Controllers\Controller;
use App\Models\PriceCat;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AdminVideoController extends Controller
{
    public function index(){
        $listCat = Video::all();
        return view('admin.videos.index',compact('listCat'));
    }

    public function addVideo(Request $request){
        $messages = [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại'
        ];
        $customAttr = [
            'video_id' => 'Video id',
        ];
        $validator = Validator::make($request->all(), [
            'video_id' => 'required|string',
        ],$messages,$customAttr);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator->errors());
        }

        if(Video::all()->count() > 0){
            return redirect()->back()->withInput()
                ->withErrors(['video_id' => 'Chỉ được thêm 1 video']);
        }

        Video::create([
            'video_id' => $request->input('video_id'),
        ]);

        return redirect()->back()->with('status', 'Thêm Video thành công');
    }

    public function ajaxEdit(Request $request){
        $video = Video::find($request->id);
        return view('admin.elements.edit-video',compact('video'));
    }

    public function updateVideo($id,Request $request){
        $video_id = $request->input('video_id');
        $video = Video::find($id);

        if($video){
           $video->video_id = $video_id;
           $video->save();
           Alert::success('Thông báo','Cập nhật video thành công');
        }
        return redirect()->back();
    }
}
