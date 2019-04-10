<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
  $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    public function show($id){

   $orders=Order::where('user_id',$id)->get();

   return view('admin.users.details',compact('orders'));
    }
}
