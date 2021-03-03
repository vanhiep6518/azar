<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function introduce(){
        $page = Page::find(1);
        return view('pages.introduce',compact('page'));
    }
}
