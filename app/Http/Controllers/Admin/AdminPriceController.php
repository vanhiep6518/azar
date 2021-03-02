<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DataHelpers;
use App\Helpers\StringHelpers;
use App\Http\Controllers\Controller;
use App\Models\Construction;
use App\Models\ConstructionCat;
use App\Models\Price;
use App\Models\PriceCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Alert;

class AdminPriceController extends Controller
{
    public function listPrice($status = 1,Request $request){
        $numberStatus['public'] = Price::where('status',1)->count();
        $numberStatus['private'] = Price::where('status',2)->count();
        $numberStatus['trash'] = Price::where('status',3)->count();

        $projects = Price::with('price_cat')->where('status',$status);

        if(!empty($request['search'])){
            $str = $request['search'];
            $projects->where('title','like','%'.$str.'%')
                ->leftJoin('price_cats','price_cats.id','=','prices.cat_id')
                ->orWhere('price_cats.name','like','%'.$str.'%');
        }

        $projects = $projects->paginate(15);
        return view('admin.prices.list',compact('numberStatus','projects'));
    }

    public function deletePrice($id){
        $project = Price::find($id);
        if($project){
            $project->delete();
        }
        return redirect()->back()->with('status', 'Xóa bảng giá thành công');
    }

    public function savePrice($id=null,Request $request){
        if ($request->getMethod() == 'GET') {
            $listCat = PriceCat::all();
            if($id){
                $project = Price::find($id);
                return view('admin.prices.edit',compact('listCat','project'));
            }
            return view('admin.prices.add',compact('listCat'));
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
            'project_cat' => 'required|string',
            'status' => 'required|string',
        ],$messages,$customAttr);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator->errors());
        }



        // $file_url = Storage::url($file->getClientOriginalName());
        // dd($file_url);
        if($id){
            Price::where('id',$id)->update([
                'admin_id' => Auth::guard('admin')->user()->id,
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'cat_id' => $request->input('project_cat'),
                'status' => $request->input('status'),
            ]);
            return redirect()->back()->with('status', 'Cập nhật Bảng giá thành công');
        }

        Price::create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'cat_id' => $request->input('project_cat'),
            'status' => $request->input('status'),
        ]);

        return redirect()->back()->with('status', 'Thêm Bảng giá thành công');
    }

    public function actionPrice(Request $request){
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
            Price::whereIn('id',$list_check)->update(['status' => $action]);
        }else{
            Price::whereIn('id',$list_check)->delete();
            return redirect()->back()->with('status', 'Xóa bảng giá thành công');
        }

        return redirect()->back()->with('status', 'Cập nhật bảng giá thành công');
    }

    public function listCat(){
        $listCat = PriceCat::all();
//        dd($listCat);
        $dataHelper = new DataHelpers();
        $listCat = $dataHelper->data_tree($listCat,0);

        return view('admin.prices.list-cat',compact('listCat'));
    }

    public function addCat(Request $request){
        $messages = [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại'
        ];
        $customAttr = [
            'name' => 'Tên danh mục',
            'slug' => 'Đường dẫn danh mục',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:project_cats',
            'slug' => 'unique:project_cats',
        ],$messages,$customAttr);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator->errors());
        }

        $parent_cat = PriceCat::find($request->input('parent_id'));
        $slug = $request->input('slug');
        $slug = empty($slug) ? StringHelpers::slugify($request->input('name')) : $slug;

        PriceCat::create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'name' => $request->input('name'),
            'slug' => $slug,
            'parent_id' => $parent_cat->id ?? 0,
            'level' => ($parent_cat->level ?? -1) + 1,
        ]);

        return redirect()->back()->with('status', 'Thêm danh mục thành công');
    }

    public function ajaxEditCat(Request $request){
        $projectCat = PriceCat::find($request->id);
        $listCat = PriceCat::all();
        return view('admin.elements.edit-price-cat',compact('listCat','projectCat'));
    }

    public function updateCat($id,Request $request){
        $name = $request->input('name');
        $slug = $request->input('slug');
        $parent_id = $request->input('parent_id') ?? 0;

        $catCheck = PriceCat::where('id','!=',$id)
            ->where(function ($query) use ($name,$slug){
                $query->where('name',$name)
                    ->orWhere('slug',$slug);
            })->first();
//        dd($catCheck);
        if(!$catCheck){
            $projectCat = PriceCat::find($id);
            $projectCat->name = $name;
            $projectCat->slug = $slug;
            $projectCat->parent_id = $parent_id;
            $projectCat->save();
            Alert::success('Thông báo','Cập nhật danh mục thành công');
        }else{
            Alert::error('Thông báo', 'Cập nhật danh mục thất bại (Tên danh mục hoặc đường dẫn đã tồn tại)');
        }

        return redirect()->back();
    }

    public function deleteCat($id){
        $projectCat = PriceCat::find($id);
        if($projectCat){
            $projectCat->delete();
        }
        return redirect()->back()->with('status', 'Xóa danh mục thành công');
    }
}
