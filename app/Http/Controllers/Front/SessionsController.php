<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    public function __construct()

    {

    $this->middleware('guest')->except('logout');


    }


    public function index(){


        return view('front.sessions.index');
    }

    public function store(Request $request){

//        dd($request->all());

        //validate the user

        $rules=[

          'email'=>'required|email',
          'password'=>'required'
        ];

        $request->validate($rules);

        //check user if exist

        $data=request(['email','password']);

        if (! auth()->attempt($data)){

            return back()->withErrors([

               'message'=>'Wrong Credentials please try again later'
            ]);


        }
        return redirect('/user/profile');
    }

    public function logout(){

        auth()->logout();

        session()->flash('message','You Have Successfully logged Out');


        return redirect('/user/login');
    }
}
