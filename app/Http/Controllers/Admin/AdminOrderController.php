<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminOrderController extends Controller
{
    public function listOrder($status = 3,Request $request){
        $numberStatus['confirm'] = Order::where('status',1)->count();
        $numberStatus['waiting'] = Order::where('status',2)->count();
        $numberStatus['success'] = Order::where('status',3)->count();
        $numberStatus['trash'] = Order::where('status',4)->count();

        $projects = Order::with('customer')->where('status',$status);

        if(!empty($request['search'])){
            $str = $request['search'];
            $projects
                ->leftJoin('customers','customers.id','=','orders.customer_id')
                ->where('customers.name','like','%'.$str.'%');
        }

        $projects = $projects->paginate(15);
        return view('admin.orders.list',compact('numberStatus','projects'));
    }

    public function deleteOrder($id){
        $project = Order::find($id);
        if($project){
            $project->delete();
        }
        return redirect()->back()->with('status', 'Xóa đơn hàng thành công');
    }

    public function actionOrder(Request $request){
        $messages = [
            'required' => 'Bạn phải chọn :attribute',
        ];
        $customAttr = [
            'action' => 'Tác vụ',
            'list_check' => 'Đơn hàng',
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
        if($action != 5){
            Order::whereIn('id',$list_check)->update(['status' => $action]);
        }else{
            Order::whereIn('id',$list_check)->delete();
            return redirect()->back()->with('status', 'Xóa Đơn hàng thành công');
        }

        return redirect()->back()->with('status', 'Cập nhật Đơn hàng thành công');
    }

    public function detail($id){
        if($id){
            $detail = Order::with('customer','order_items')->find($id);
//            dd($detail);
            return view('admin.orders.detail',compact('detail'));
        }
    }

    public function ajaxCustomerInfo(Request $request){
        $customer = Customer::find($request->id);
        if($customer){
            return view('admin.elements.customer-info',compact('customer'));
        }
    }
}
