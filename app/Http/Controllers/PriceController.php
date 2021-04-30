<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Project;
use App\Models\ProjectCat;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index($slug,$id){
        $price = Price::with('price_cat')
            ->where('status',1)->find($id);
        return view('prices.index',compact('price'));
    }

    public function reportDesignPrice(){
        return view('prices.report-design');
    }

    public function reportConstructionPrice(){
        return view('prices.report-construction');
    }

    public function contractDesign(){
        return view('prices.contract-design');
    }

    public function partnerContract(){
        return view('prices.contract-partner');
    }

    public function customerContract(){
        return view('prices.contract-customer');
    }

    public function furnitureContract(){
        return view('prices.contract-furniture');
    }

    public function estimated(){
        return view("prices.estimated");
    }

}
