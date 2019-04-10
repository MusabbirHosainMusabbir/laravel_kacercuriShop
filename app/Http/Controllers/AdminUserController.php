<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{


    public function __construct()
    {

        $this->middleware('guest:admin');
    }




    public function index(){


        return view('admin.login');
    }

    public function store(Request $request){

//dd($request->all());
        // Validation

        $request->validate([
           'email'=>'required|email',
            'password'=>'required'

        ]);

        //login the users
$credentials=$request->only('email','password');

if ( ! Auth::guard('admin')->attempt($credentials))
        {
            return  back()->withErrors([
                'message'=>'Wrong credentials'

            ]);

        }





//session message

        session()->flash('message','You have been logged in');


        return redirect('admin/');
    }

    public function logout(){

        auth()->guard('admin')->logout();

    session()->flash('message','You Have been logout ');

    return redirect('admin/login');

    }
}
