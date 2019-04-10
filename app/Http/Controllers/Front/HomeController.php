<?php

namespace App\Http\Controllers\Front;

use App\Product;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){


        $products=Product::inRandomOrder()->get();


        return view('front.index',compact('products'));
    }
}
