<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DataHelpers;
use App\Helpers\StringHelpers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCat;
use App\Models\ProductFile;
use App\Models\Project;
use App\Models\ProjectCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function listProduct($status = 1,Request $request){
        $numberStatus['public'] = Product::where('status',1)->count();
        $numberStatus['private'] = Product::where('status',2)->count();
        $numberStatus['trash'] = Product::where('status',3)->count();

        $projects = Product::with('product_cat')->where('status',$status);

        if(!empty($request['search'])){
            $str = $request['search'];
            $projects->where('products.name','like','%'.$str.'%')
                ->leftJoin('product_cats','product_cats.id','=','products.cat_id')
                ->orWhere('product_cats.name','like','%'.$str.'%');
        }

        $projects = $projects->paginate(15);
//        dd($projects);
        return view('admin.products.list',compact('numberStatus','projects'));
    }

    public function deleteProduct($id){
        $project = Product::find($id);
        if($project){
            $project->delete();
        }
        return redirect()->back()->with('status', 'Xóa dự án thành công');
    }

    public function saveProduct($id=null,Request $request){
        if ($request->getMethod() == 'GET') {
            $listCat = ProductCat::all();
            if($id){
                $project = Product::find($id);
                return view('admin.products.edit',compact('listCat','project'));
            }
            return view('admin.products.add',compact('listCat'));
        }

        $messages = [
            'required' => ':attribute không được để trống',
        ];
        $customAttr = [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá',
            'code' => 'Mã sản phẩm',
            'short_desc' => 'Mô tả ngắn',
            'detail' => 'Chi tiết sản phẩm',
            'file' => 'Ảnh sản phẩm',
            'project_cat' => 'Danh mục',
            'status' => 'Trạng thái',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required|string',
            'code' => 'required|string',
            'short_desc' => 'required|string',
            'detail' => 'required|string',
            'file' => 'required',
            'project_cat' => 'required|string',
            'status' => 'required|string',
        ],$messages,$customAttr);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator->errors());
        }

        $files = [];
        if($request->hasfile('file'))
        {
            foreach($request->file('file') as $file)
            {
                // $file_name = 'uploads/'.$file->getClientOriginalName();
                // Storage::put($file_name, file_get_contents($file));
                // $file_url = Storage::url($file_name);

                $file->storeAs('public/uploads', $file->getClientOriginalName());
                $file_url = URL::asset('storage/uploads/'.$file->getClientOriginalName());
                $files[] = $file_url;
            }
        }

        
        if($id){
            Product::where('id',$id)->update([
                'admin_id' => Auth::guard('admin')->user()->id,
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'code' => $request->input('code'),
                'short_desc' => $request->input('short_desc'),
                'detail' => $request->input('detail'),
                'cat_id' => $request->input('project_cat'),
                'status' => $request->input('status'),
                'image' => $files
            ]);

            return redirect()->back()->with('status', 'Cập nhật sản phẩm thành công');
        }
        
        $product = Product::create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'code' => $request->input('code'),
            'short_desc' => $request->input('short_desc'),
            'detail' => $request->input('detail'),
            'cat_id' => $request->input('project_cat'),
            'status' => $request->input('status'),
            'image' => $files
        ]);


        return redirect()->back()->with('status', 'Thêm sản phẩm thành công');
    }

    public function actionProduct(Request $request){
        $messages = [
            'required' => 'Bạn phải chọn :attribute',
        ];
        $customAttr = [
            'action' => 'Tác vụ',
            'list_check' => 'sản phẩm',
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
            Product::whereIn('id',$list_check)->update(['status' => $action]);
        }else{
            Product::whereIn('id',$list_check)->delete();
            return redirect()->back()->with('status', 'Xóa sản phẩm thành công');
        }

        return redirect()->back()->with('status', 'Cập nhật sản phẩm thành công');
    }

    public function listCat(){
        $listCat = ProductCat::all();

        $dataHelper = new DataHelpers();
        $listCat = $dataHelper->data_tree($listCat,0);
//        dd($listCat);
        return view('admin.products.list-cat',compact('listCat'));
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
            'name' => 'required|string|unique:product_cats',
            'slug' => 'unique:product_cats',
        ],$messages,$customAttr);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator->errors());
        }

        $parent_cat = ProductCat::find($request->input('parent_id'));
        $slug = $request->input('slug');
        $slug = empty($slug) ? StringHelpers::slugify($request->input('name')) : $slug;

        ProductCat::create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'name' => $request->input('name'),
            'slug' => $slug,
            'parent_id' => $parent_cat->id ?? 0,
            'level' => ($parent_cat->level ?? -1) + 1,
        ]);

        return redirect()->back()->with('status', 'Thêm danh mục thành công');
    }

    public function ajaxEditCat(Request $request){
        $projectCat = ProductCat::find($request->id);
        $listCat = ProductCat::all();
        return view('admin.elements.edit-product-cat',compact('listCat','projectCat'));
    }

    public function updateCat($id,Request $request){
        $name = $request->input('name');
        $slug = $request->input('slug');
        $parent_id = $request->input('parent_id') ?? 0;

        $catCheck = ProductCat::where('id','!=',$id)
            ->where(function ($query) use ($name,$slug){
                $query->where('name',$name)
                    ->orWhere('slug',$slug);
            })->first();
//        dd($catCheck);
        if(!$catCheck){
            $projectCat = ProductCat::find($id);
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
        $projectCat = ProductCat::find($id);
        if($projectCat){
            $projectCat->delete();
        }
        return redirect()->back()->with('status', 'Xóa danh mục thành công');
    }
}
