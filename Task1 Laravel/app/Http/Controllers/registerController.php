<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerController extends Controller
{
    //
    public function create(){
        return view('register');
    }

    public function index(Request $request){



        $validate_Inputs = $request->validate([
            'name'=>['required','string','regex:([A-Za-z])'],
            'email'=>'required|email',
            'password'=>'required|min:6',
            'address'=>'required|max:10',
            'gender'=>'required',
            'linkedin'=>'required|url'
        ]);

        return view('profile',['data'=>$validate_Inputs]);






        // if(empty($request->name) & empty($request->email)){
        //     echo 'Name : Required and Email : Required';
        // }elseif(empty($request->name)){
        //     echo 'Name : Required';
        // }elseif(empty($request->email)){
        //     echo 'Email : Required';
        // }
    }
}
