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
        return view('prices.price-report');
    }

    public function reportConstructionPrice(){
        return view('prices.construction-report');
    }

    public function contractDesign(){
        return view('prices.contract-design');
    }

    public function partnerContract(){
        return view('prices.partner-contract');
    }

    public function customerContract(){
        return view('prices.customer-contract');
    }

    public function furnitureContract(){
        return view('prices.furniture-contract');
    }

}
