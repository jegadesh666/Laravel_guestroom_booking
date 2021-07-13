<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\customer;
use App\Models\owner;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class user extends Controller
{


    //view for signup page
    function signup(){
        return view('/auth/signup');
    }


    //view for login page
    function login(){
        return view('/auth/login');
    }
   


    //Validate user signup and stored in DB
    function saved(Request $Request){
        $Request->validate([
            'name'=>'required',
            'email'=>'required |email |unique:customers',
            'mobile'=>'required | min:10 |max:10',
            'password'=>'required'
        ]);

       $customer =new customer;
       $customer->name=$Request->name;
       $customer->email=$Request->email;
       $customer->mobile=$Request->mobile;
       $customer->password=Hash::make($Request->password);
        $result= $customer->save();
       
        if($result){
            return back()->with('success','Signup completed Please Login!');
        }else{
            return back()->with('failed','Signup failed');
        }

    }


    //verify user login and user id stored in session
    function verify(Request $Request){


        $Request->validate([
            
            'email'=>'required',
            'password'=>'required'
        ]);

        $user=customer::where('email','=',$Request->email)->first();

        if(!$user){
            return back()->with('failed','Invalid Email or Passwprd');
        }else {
            if(Hash::check($Request->password,$user->password)){

               Session()->put('loggeduser',$user->id);
                return redirect('/Home');
                


            }else{
                return back()->with('failed','Invalid Email or Password');

            }
        }
        



    }
    
}
