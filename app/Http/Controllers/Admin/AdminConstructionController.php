<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DataHelpers;
use App\Helpers\StringHelpers;
use App\Http\Controllers\Controller;
use App\Models\Construction;
use App\Models\ConstructionCat;
use App\Models\Project;
use App\Models\ProjectCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
Use Alert;

class AdminConstructionController extends Controller
{
    public function listConstruction($status = 1,Request $request){
        $numberStatus['public'] = Construction::where('status',1)->count();
        $numberStatus['private'] = Construction::where('status',2)->count();
        $numberStatus['trash'] = Construction::where('status',3)->count();

        $projects = Construction::with('construction_cat')->where('status',$status);

        if(!empty($request['search'])){
            $str = $request['search'];
            $projects->where('title','like','%'.$str.'%')
            ->leftJoin('construction_cats','construction_cats.id','=','constructions.cat_id')
            ->orWhere('construction_cats.name','like','%'.$str.'%');
        }

        $projects = $projects->paginate(15);
        return view('admin.constructions.list',compact('numberStatus','projects'));
    }

    public function deleteConstruction($id){
        $project = Construction::find($id);
        if($project){
            $project->delete();
        }
        return redirect()->back()->with('status', 'Xóa thi công thành công');
    }

    public function saveConstruction($id=null,Request $request){
        if ($request->getMethod() == 'GET') {
            $listCat = ConstructionCat::all();
            if($id){
                $project = Construction::find($id);
                return view('admin.constructions.edit',compact('listCat','project'));
            }
            return view('admin.constructions.add',compact('listCat'));
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

        $file = $request->file;
        $file_url = '';
        if($file){
            $file->storeAs('public/uploads', $file->getClientOriginalName());
            $file_url = URL::asset('storage/uploads/'.$file->getClientOriginalName());
        }else{
            if($id){
                $file_url = Construction::where('id',$id)->first()->image;
            }
        }

        // $file_url = Storage::url($file->getClientOriginalName());
        // dd($file_url);
        if($id){
            Construction::where('id',$id)->update([
                'admin_id' => Auth::guard('admin')->user()->id,
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'cat_id' => $request->input('project_cat'),
                'status' => $request->input('status'),
                'image' => $file_url
            ]);
            return redirect()->back()->with('status', 'Cập nhật bài viết thành công');
        }

        Construction::create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'cat_id' => $request->input('project_cat'),
            'status' => $request->input('status'),
            'image' => $file_url
        ]);

        return redirect()->back()->with('status', 'Thêm bài viết thành công');
    }

    public function actionConstruction(Request $request){
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
            Construction::whereIn('id',$list_check)->update(['status' => $action]);
        }else{
            Construction::whereIn('id',$list_check)->delete();
            return redirect()->back()->with('status', 'Xóa thi công thành công');
        }

        return redirect()->back()->with('status', 'Cập nhật thi công thành công');
    }

    public function listCat(){
        $listCat = ConstructionCat::all();
//        dd($listCat);
        $dataHelper = new DataHelpers();
        $listCat = $dataHelper->data_tree($listCat,0);

        return view('admin.constructions.list-cat',compact('listCat'));
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
            'name' => 'required|string|unique:construction_cats',
            'slug' => 'unique:construction_cats',
        ],$messages,$customAttr);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator->errors());
        }

        $parent_cat = ConstructionCat::find($request->input('parent_id'));
        $slug = $request->input('slug');
        $slug = empty($slug) ? StringHelpers::slugify($request->input('name')) : $slug;

        ConstructionCat::create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'name' => $request->input('name'),
            'slug' => $slug,
            'parent_id' => $parent_cat->id ?? 0,
            'level' => ($parent_cat->level ?? -1) + 1,
        ]);

        return redirect()->back()->with('status', 'Thêm danh mục thành công');
    }

    public function ajaxEditCat(Request $request){
        $projectCat = ConstructionCat::find($request->id);
        $listCat = ConstructionCat::all();
        return view('admin.elements.edit-construction-cat',compact('listCat','projectCat'));
    }

    public function updateCat($id,Request $request){
        $name = $request->input('name');
        $slug = $request->input('slug');
        $parent_id = $request->input('parent_id') ?? 0;

        $catCheck = ConstructionCat::where('id','!=',$id)
            ->where(function ($query) use ($name,$slug){
                $query->where('name',$name)
                    ->orWhere('slug',$slug);
            })->first();
//        dd($catCheck);
        if(!$catCheck){
            $projectCat = ConstructionCat::find($id);
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
        $projectCat = ConstructionCat::find($id);
        if($projectCat){
            $projectCat->delete();
        }
        return redirect()->back()->with('status', 'Xóa danh mục thành công');
    }
}
