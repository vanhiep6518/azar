<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConstructionProgress;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminConstructionProgressController extends Controller
{
    public function listProgress($status = 1,Request $request){
        $numberStatus['public'] = ConstructionProgress::where('status',1)->count();
        $numberStatus['private'] = ConstructionProgress::where('status',2)->count();
        $numberStatus['trash'] = ConstructionProgress::where('status',3)->count();

        $projects = ConstructionProgress::where('status',$status);

        if(!empty($request['search'])){
            $str = $request['search'];
            $projects->where('code','like','%'.$str.'%');

        }

        $projects = $projects->paginate(15);
        return view('admin.con-progress.list',compact('numberStatus','projects'));
    }

    public function deleteProgress($id){
        $project = ConstructionProgress::find($id);
        if($project){
            $project->delete();
        }
        return redirect()->back()->with('status', 'Xóa tiến độ thành công');
    }

    public function saveProgress($id=null,Request $request){
        if ($request->getMethod() == 'GET') {
            if($id){
                $project = ConstructionProgress::find($id);
                return view('admin.con-progress.edit',compact('project'));
            }
            return view('admin.con-progress.add');
        }

        $messages = [
            'required' => ':attribute không được để trống',
        ];
        $customAttr = [
            'code' => 'Mã tiến đ',
            'customer_name' => 'Tên khách hàng',
            'content' => 'Nội dung tiến độ',
            'project_cat' => 'Danh mục',
            'status' => 'Trạng thái',
        ];
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'customer_name' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|string',
        ],$messages,$customAttr);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator->errors());
        }

        if($id){
            ConstructionProgress::where('id',$id)->update([
                'admin_id' => Auth::guard('admin')->user()->id,
                'code' => $request->input('code'),
                'customer_name' => $request->input('customer_name'),
                'content' => $request->input('content'),
                'status' => $request->input('status'),
            ]);
            return redirect()->back()->with('status', 'Cập nhật tiến độ thành công');
        }

        ConstructionProgress::create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'code' => $request->input('code'),
            'customer_name' => $request->input('customer_name'),
            'content' => $request->input('content'),
            'status' => $request->input('status'),
        ]);

        return redirect()->back()->with('status', 'Thêm tiến độ thành công');
    }

    public function actionProgress(Request $request){
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
            ConstructionProgress::whereIn('id',$list_check)->update(['status' => $action]);
        }else{
            ConstructionProgress::whereIn('id',$list_check)->delete();
            return redirect()->back()->with('status', 'Xóa tiến độ thành công');
        }

        return redirect()->back()->with('status', 'Cập nhật tiến độ thành công');
    }
}
