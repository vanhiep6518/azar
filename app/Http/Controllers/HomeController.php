<?php

namespace App\Http\Controllers;

use App\Helpers\CollectionHelpers;
use App\Models\Construction;
use App\Models\Furniture;
use App\Models\Project;
use App\Models\ProjectCat;
use App\Models\Slider;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    public function index(Request $request){
        $projectCats = ProjectCat::with('projects')->get();
        $sliders = Slider::where('status',1)->get();

        if ($request->has('q')) {
            $q = $request->input('q');
            $project = Project::with('project_cat')
                        ->where('title','like','%'.$q.'%')
                        ->orWhere('content','like','%'.$q.'%')->get();
            $furniture  = Furniture::with('furniture_cat')
                ->where('title','like','%'.$q.'%')
                ->orWhere('content','like','%'.$q.'%')->get();
            $construction = Construction::with('construction_cat')
                ->where('title','like','%'.$q.'%')
                ->orWhere('content','like','%'.$q.'%')->get();
            $results = collect($project)->merge($furniture)->merge($construction);
            $results = CollectionHelpers::paginate($results, 15);
//            dd($results);
            return view('home.search',[
                'results' => $results->appends(['q'=>$q])
            ]);
        }
        return view('home.index',compact('projectCats','sliders'));
    }
}
