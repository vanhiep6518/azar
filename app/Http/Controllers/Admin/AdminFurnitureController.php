<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DataHelpers;
use App\Helpers\StringHelpers;
use App\Http\Controllers\Controller;
use App\Models\Furniture;
use App\Models\FurnitureCat;
use App\Models\Project;
use App\Models\ProjectCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AdminFurnitureController extends Controller
{
    public function listFurniture($status = 1,Request $request){
        $numberStatus['public'] = Furniture::where('status',1)->count();
        $numberStatus['private'] = Furniture::where('status',2)->count();
        $numberStatus['trash'] = Furniture::where('status',3)->count();

        $projects = Furniture::with('furniture_cat')->where('status',$status);

        if(!empty($request['search'])){
            $str = $request['search'];
            $projects->where('title','like','%'.$str.'%')
                ->leftJoin('furniture_cats','furniture_cats.id','=','furnitures.cat_id')
                ->orWhere('furniture_cats.name','like','%'.$str.'%');
        }

        $projects = $projects->paginate(15);

        return view('admin.furnitures.list',compact('numberStatus','projects'));
    }

    public function deleteProject($id){
        $project = Furniture::find($id);
        if($project){
            $project->delete();
        }
        return redirect()->back()->with('status', 'Xóa nội thất thành công');
    }

    public function saveFurniture($id=null,Request $request){
        if ($request->getMethod() == 'GET') {
            $listCat = FurnitureCat::all();
            if($id){
                $project = Furniture::find($id);
                return view('admin.furnitures.edit',compact('listCat','project'));
            }
            return view('admin.furnitures.add',compact('listCat'));
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
//            'content' => 'required|string',
            'project_cat' => 'required|string',
            'status' => 'required|string',
            'filenames' => 'required',
            'filenames.*' => 'image'
        ],$messages,$customAttr);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator->errors());
        }

        $files = [];
        if($request->hasfile('filenames'))
        {
            foreach($request->file('filenames') as $file)
            {
                $file->storeAs('public/uploads', $file->getClientOriginalName());
                $file_url = URL::asset('storage/uploads/'.$file->getClientOriginalName());
                $files[] = $file_url;
            }
        }


        if($id){

            Furniture::where('id',$id)->update([
                'admin_id' => Auth::guard('admin')->user()->id,
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'cat_id' => $request->input('project_cat'),
                'status' => $request->input('status'),
                'image' => $files
            ]);

            return redirect()->back()->with('status', 'Cập nhật dự án thành công');
        }

        Furniture::create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'cat_id' => $request->input('project_cat'),
            'status' => $request->input('status'),
            'image' => $files
        ]);

        return redirect()->back()->with('status', 'Thêm nội thất thành công');
    }

    public function actionFurniture(Request $request){
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
            Furniture::whereIn('id',$list_check)->update(['status' => $action]);
        }else{
            Furniture::whereIn('id',$list_check)->delete();
            return redirect()->back()->with('status', 'Xóa nội thất thành công');
        }

        return redirect()->back()->with('status', 'Cập nhật nội thất thành công');
    }

    public function listCat(){
        $listCat = FurnitureCat::all();
//        dd($listCat);
        $dataHelper = new DataHelpers();
        $listCat = $dataHelper->data_tree($listCat,0);

        return view('admin.furnitures.list-cat',compact('listCat'));
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
            'name' => 'required|string|unique:furniture_cats',
            'slug' => 'unique:furniture_cats',
        ],$messages,$customAttr);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator->errors());
        }

        $parent_cat = ProjectCat::find($request->input('parent_id'));
        $slug = $request->input('slug');
        $slug = empty($slug) ? StringHelpers::slugify($request->input('name')) : $slug;

        FurnitureCat::create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'name' => $request->input('name'),
            'slug' => $slug,
            'parent_id' => $parent_cat->id ?? 0,
            'level' => ($parent_cat->level ?? -1) + 1,
        ]);

        return redirect()->back()->with('status', 'Thêm danh mục thành công');
    }

    public function ajaxEditCat(Request $request){
        $projectCat = FurnitureCat::find($request->id);
        $listCat = FurnitureCat::all();
        return view('admin.elements.edit-furniture-cat',compact('listCat','projectCat'));
    }

    public function updateCat($id,Request $request){
        $name = $request->input('name');
        $slug = $request->input('slug');
        $parent_id = $request->input('parent_id') ?? 0;

        $catCheck = FurnitureCat::where('id','!=',$id)
            ->where(function ($query) use ($name,$slug){
                $query->where('name',$name)
                    ->orWhere('slug',$slug);
            })->first();
//        dd($catCheck);
        if(!$catCheck){
            $projectCat = FurnitureCat::find($id);
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
        $projectCat = FurnitureCat::find($id);
        if($projectCat){
            $projectCat->delete();
        }
        return redirect()->back()->with('status', 'Xóa danh mục thành công');
    }
}
