<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConstructionProgress;
use App\Models\DesignPrice;
use App\Models\Price;
use App\Models\PriceCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminDesignPriceController extends Controller
{
    public function listDesignPrice($status = 1,Request $request){
        $numberStatus['public'] = DesignPrice::where('status',1)->count();
        $numberStatus['private'] = DesignPrice::where('status',2)->count();
        $numberStatus['trash'] = DesignPrice::where('status',3)->count();

        $projects = DesignPrice::where('status',$status);

        if(!empty($request['search'])){
            $str = $request['search'];
            $projects->where('title','like','%'.$str.'%');

        }

        $projects = $projects->paginate(15);
        return view('admin.design-prices.list',compact('numberStatus','projects'));
    }

    public function deleteDesignPrice($id){
        $project = DesignPrice::find($id);
        if($project){
            $project->delete();
        }
        return redirect()->back()->with('status', 'Xóa bảng giá thành công');
    }

    public function saveDesignPrice($id=null,Request $request){
        if ($request->getMethod() == 'GET') {
            if($id){
                $project = DesignPrice::find($id);
                return view('admin.design-prices.edit',compact('project'));
            }
            return view('admin.design-prices.add');
        }

        $messages = [
            'required' => ':attribute không được để trống',
        ];
        $customAttr = [
            'title' => 'Tên khách hàng',
            'content' => 'Nội dung tiến độ',
            'status' => 'Trạng thái',
        ];
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|string',
        ],$messages,$customAttr);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator->errors());
        }

        DesignPrice::updateOrCreate(
            ['id' => $id ?? 0],
            [
                'admin_id' => Auth::guard('admin')->user()->id,
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'status' => $request->input('status'),
            ]
        );


        return redirect()->back()->with('status', 'Lưu bảng giá thành công');
    }

    public function actionDesignPrice(Request $request){
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
            DesignPrice::whereIn('id',$list_check)->update(['status' => $action]);
        }else{
            DesignPrice::whereIn('id',$list_check)->delete();
            return redirect()->back()->with('status', 'Xóa bảng giá thành công');
        }

        return redirect()->back()->with('status', 'Cập nhật bảng giá thành công');
    }
}
