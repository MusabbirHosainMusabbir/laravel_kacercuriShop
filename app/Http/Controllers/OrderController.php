<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        $orders=Order::all();

        return view('admin.orders.index',compact('orders'));
    }

    public function confirm($id){

       //find the id

        $order=Order::find($id);


        //update the order status

        $order->update(['status'=>1]);


        //session message

        session()->flash('message','This product has been confirmed');


        //redirect back

        return redirect('admin/orders');

    }


    public function pending($id){
        //find the id

        $order=Order::find($id);


        //update the order status

        $order->update(['status'=>0]);


        //session message

        session()->flash('message','This product has been pending');


        //redirect back

        return redirect('admin/orders');
    }

    public function show($id){
          $order=Order::find($id);
        return view('admin.orders.details',compact('order'));
    }
}
