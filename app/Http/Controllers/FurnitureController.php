<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use App\Models\FurnitureCat;
use App\Models\Project;
use App\Models\ProjectCat;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    public function index(){
        $projects = Furniture::with('furniture_cat')
            ->where('status','=',1)->paginate(16);
//        dd($projects);
        return view('furnitures.index',compact('projects'));
    }

    public function projectCat($slug){
        $projects = Furniture::leftJoin('furniture_cats','furniture_cats.id','=','furnitures.cat_id')
            ->where('furniture_cats.slug','=',$slug)
            ->where('furnitures.status','=',1)
            ->select('furnitures.*')
            ->with('furniture_cat')->paginate(16);
        $cat = FurnitureCat::where('slug',$slug)->first();
//        dd($projects);
        return view('furnitures.index',compact('projects','cat'));
    }

    public function projectDetail($cat_slug,$slug,$id){
        $project = Furniture::find($id);
        $cat_id = $project->cat_id ?? 0;
        $relatedProject = Furniture::where([
            ['cat_id','=',$cat_id],
            ['id','!=',$id],
        ])->with('furniture_cat')->get();
        if($project && $relatedProject){
            return view('furnitures.detail',compact('project','relatedProject'));
        }
    }
}
