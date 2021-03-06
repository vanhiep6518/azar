<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Project;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class AdminSliderController extends Controller
{
    public function listSlider($status = 1,Request $request){
        $numberStatus['public'] = Slider::where('status',1)->count();
        $numberStatus['private'] = Slider::where('status',2)->count();
        $numberStatus['trash'] = Slider::where('status',3)->count();

        $projects = Slider::where('status',$status);

        if(!empty($request['search'])){
            $str = $request['search'];
            $projects->where('title','like','%'.$str.'%')
                ->orWhere('sub_title','like','%'.$str.'%')
                ->orWhere('detail_url','like','%'.$str.'%');
        }

        $projects = $projects->paginate(15);
        return view('admin.sliders.list',compact('numberStatus','projects'));
    }

    public function deleteSlider($id){
        $project = Slider::find($id);
        if($project){
            $project->delete();
        }
        return redirect()->back()->with('status', 'Xóa slider thành công');
    }

    public function saveSlider($id=null,Request $request){
        if ($request->getMethod() == 'GET') {
            if($id){
                $project = Slider::find($id);
                return view('admin.sliders.edit',compact('project'));
            }
            return view('admin.sliders.add');
        }

        $messages = [
            'required' => ':attribute không được để trống',
        ];
        $customAttr = [
            'title' => 'Tiêu đề',
            'sub_title' => 'Tiêu đề phụ',
            'detail_url' => 'Đường dẫn',
            'file' => 'Ảnh Slide',
            'status' => 'Trạng thái',
        ];
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'detail_url' => 'required|string',
//            'file' => 'required|max:10000|mimes:jpeg,jpg,png,gif',
            'status' => 'required|string',
        ],$messages,$customAttr);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator->errors());
        }



        $file = $request->file;
        $file_url = '';
        if($file){
            $file->storeAs('public/uploads', $file->getClientOriginalName());
            $file_url = URL::asset('storage/uploads/'.$file->getClientOriginalName());
        }else{
            if($id){
                $file_url = Slider::where('id',$id)->first()->image;
            }
        }

        if($id){
            Slider::where('id',$id)->update([
                'admin_id' => Auth::guard('admin')->user()->id,
                'title' => $request->input('title'),
                'sub_title' => $request->input('sub_title'),
                'detail_url' => $request->input('detail_url'),
                'image' => $file_url,
                'status' => $request->input('status'),
            ]);
            return redirect()->back()->with('status', 'Cập nhật Slider thành công');
        }

        Slider::create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'title' => $request->input('title'),
            'sub_title' => $request->input('sub_title'),
            'detail_url' => $request->input('detail_url'),
            'image' => $file_url,
            'status' => $request->input('status'),
        ]);

        return redirect()->back()->with('status', 'Thêm Slider thành công');
    }

    public function actionSlider(Request $request){
        $messages = [
            'required' => 'Bạn phải chọn :attribute',
        ];
        $customAttr = [
            'action' => 'Tác vụ',
            'list_check' => 'Dự án',
        ];
        $validator = Validator::make($request->all(), [
            'action' => 'required|string',
            'list_check' => 'required',
        ],$messages,$customAttr);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator->errors());
        }

        $action = $request->input('action');
        $list_check = $request->input('list_check');
        //code action
        if($action != 4){
            Slider::whereIn('id',$list_check)->update(['status' => $action]);
        }else{
            Slider::whereIn('id',$list_check)->delete();
            return redirect()->back()->with('status', 'Xóa slider thành công');
        }

        return redirect()->back()->with('status', 'Cập nhật slider thành công');
    }
}
