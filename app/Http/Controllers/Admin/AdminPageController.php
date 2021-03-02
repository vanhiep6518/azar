<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Price;
use App\Models\PriceCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminPageController extends Controller
{
    public function listPage($status = 1,Request $request){
        $numberStatus['public'] = Page::where('status',1)->count();
        $numberStatus['private'] = Page::where('status',2)->count();
        $numberStatus['trash'] = Page::where('status',3)->count();

        $projects = Page::where('status',$status);

        if(!empty($request['search'])){
            $str = $request['search'];
            $projects->where('title','like','%'.$str.'%');

        }

        $projects = $projects->paginate(15);
        return view('admin.pages.list',compact('numberStatus','projects'));
    }

    public function deletePage($id){
        $project = Page::find($id);
        if($project){
            $project->delete();
        }
        return redirect()->back()->with('status', 'Xóa trang thành công');
    }

    public function savePage($id=null,Request $request){
        if ($request->getMethod() == 'GET') {
            if($id){
                $project = Page::find($id);
                return view('admin.pages.edit',compact('project'));
            }
            return view('admin.pages.add');
        }

        $messages = [
            'required' => ':attribute không được để trống',
        ];
        $customAttr = [
            'title' => 'Tiêu đề Dự án',
            'content' => 'Nội dung Dự án',
            'project_cat' => 'Danh mục',
            'status' => 'Trạng thái',
        ];
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            // 'price' => 'required|string',
            // 'floors' => 'required|string',
            // 'acreage' => 'required|string',
            'content' => 'required|string',
//            'project_cat' => 'required|string',
            'status' => 'required|string',
        ],$messages,$customAttr);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator->errors());
        }



        // $file_url = Storage::url($file->getClientOriginalName());
        // dd($file_url);
        if($id){
            Page::where('id',$id)->update([
                'admin_id' => Auth::guard('admin')->user()->id,
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'status' => $request->input('status'),
            ]);
            return redirect()->back()->with('status', 'Cập nhật Trang thành công');
        }

        Page::create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'status' => $request->input('status'),
        ]);

        return redirect()->back()->with('status', 'Thêm Trang thành công');
    }

    public function actionPage(Request $request){
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
            Page::whereIn('id',$list_check)->update(['status' => $action]);
        }else{
            Page::whereIn('id',$list_check)->delete();
            return redirect()->back()->with('status', 'Xóa trang thành công');
        }

        return redirect()->back()->with('status', 'Cập nhật trang thành công');
    }
}
