<?php

namespace App\Http\Controllers\Front;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index(){


        return view('front.checkout.index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){

        $contents=Cart::instance('default')->content()->map(function ($item){


            return $item->model->product_name . ' ' . $item->qty;
        })->values()->toJason();

       try{

           Stripe::charges()->create([

               'amount' => Cart::total(),
               'currency' => 'USD',
               'source'=>$request->stripeToken,
               'description' => 'Some Text',
               'metadata'=>[
                   'contents' => $contents,
                   'quantity'=>Cart::instance('default')->count()
               ]

           ]);

           Cart::instance('default')->destroy();

           return redirect()->back()->with('message','success thank you');
       } catch (Exception $e){

           //code
       }



    }
}
