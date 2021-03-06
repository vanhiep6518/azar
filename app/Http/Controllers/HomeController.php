<?php

namespace App\Http\Controllers;

use App\Models\ProjectCat;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $projectCats = ProjectCat::with('projects')->get();
        $sliders = Slider::where('status',1)->get();
//        dd($projectCats);
        return view('home.index',compact('projectCats','sliders'));
    }
}
