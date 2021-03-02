<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCat;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::paginate(16);
        return view('projects.index',compact('projects'));
    }

    public function projectCat($slug){
        $projects = Project::leftJoin('project_cats','project_cats.id','=','projects.cat_id')
                    ->where('project_cats.slug','=',$slug)
                    ->select('projects.*')
                    ->with('project_cat')->paginate(16);
        $cat = ProjectCat::where('slug',$slug)->first();
//        dd($projects);
        return view('projects.index',compact('projects','cat'));
    }

    public function projectDetail($cat_slug,$slug,$id){
        $project = Project::find($id);
        $cat_id = $project->cat_id ?? 0;
        $relatedProject = Project::where([
            ['cat_id','=',$cat_id],
            ['id','!=',$id],
        ])->with('project_cat')->get();
        if($project && $relatedProject){
            return view('projects.detail',compact('project','relatedProject'));
        }
    }
}
