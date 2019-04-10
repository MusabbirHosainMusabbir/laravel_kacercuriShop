<?php

namespace App\Http\Controllers\Front;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index(){

        return view('front.cart.index');
    }

    public function store(Request $request){

        $dubl=Cart::search(function ($cartItem, $rowId) use ($request){

           return $cartItem->id===$request->id;
        });

        if ($dubl->isNotEmpty()){

            return redirect()->back()->with('message','Item is already in your cart');
        }

        Cart::add($request->id,$request->name, 1, $request->price)->associate('App\Product');


        return redirect()->back()->with('message','Item has been added to Cart');
    }

    public function destroy($id){


        Cart::remove($id);

        return redirect()->back()->with('message','This Item remove from the cart');
    }

    public function saveLater($id){

    $item=Cart::get($id);

    Cart::remove($id);
        $dubl=Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id){

            return $cartItem->id===$id;
        });

        if ($dubl->isNotEmpty()){

            return redirect()->back()->with('message','Item is already in your Save For Later');
        }

    Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');

    return redirect()->back()->with('message','This item add Save For Later');
    }

    public function update(Request $request, $id){


        Cart::update($id, $request->quantity);
        session()->flash('message', 'Item is update');

        return response()->json(['success' => true]);
    }
}
