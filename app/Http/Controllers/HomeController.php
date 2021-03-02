<?php

namespace App\Http\Controllers;

use App\Models\ProjectCat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $projectCats = ProjectCat::with('projects')->get();
//        dd($projectCats);
        return view('home.index',compact('projectCats'));
    }
}
