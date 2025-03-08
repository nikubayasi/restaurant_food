<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FilterController extends Controller
{
    //
    public function ListRestaurant(){
        $products = Product::all();
        return view("frontend.list_restaurant",compact('products'));
    }
    //End Method
}
