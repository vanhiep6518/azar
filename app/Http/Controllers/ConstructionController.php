<?php

namespace App\Http\Controllers;

use App\Models\Construction;
use App\Models\ConstructionCat;
use App\Models\Project;
use App\Models\ProjectCat;
use Illuminate\Http\Request;

class ConstructionController extends Controller
{
    public function index(){
        $projects = Construction::with('construction_cat')
            ->where('status','=',1)->paginate(16);
        return view('constructions.index',compact('projects'));
    }

    public function projectCat($slug){
        $projects = Construction::leftJoin('construction_cats','construction_cats.id','=','constructions.cat_id')
            ->where('construction_cats.slug','=',$slug)
            ->where('constructions.status','=',1)
            ->select('constructions.*')
            ->with('construction_cat')->paginate(16);
        $cat = ConstructionCat::where('slug',$slug)->first();
//        dd($projects);
        return view('constructions.index',compact('projects','cat'));
    }

    public function projectDetail($cat_slug,$slug,$id){
        $project = Construction::find($id);
        $cat_id = $project->cat_id ?? 0;
        $relatedProject = Construction::where([
            ['cat_id','=',$cat_id],
            ['id','!=',$id],
        ])->with('construction_cat')->get();
        if($project && $relatedProject){
            return view('constructions.detail',compact('project','relatedProject'));
        }
    }

    public function constructionProgress(){
        $procProgress = Construction::where('cat_id',1)->first();
        return view('constructions.procProgress',compact('procProgress'));
    }
}
