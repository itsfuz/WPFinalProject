<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //

    public function index(){

        return view('register');
    }

    public function store(Request $request){

        $request->validate([
            //validation masi masalah
            'fullname' => 'required | max:255 | regex:/[a-zA-Z\s]+/',
            'email' => 'required', //butuh validate untuk unique
            'password' => 'min:5 | max:20',
            'confPassword' => 'same:password | required_with: password',
            'address' => 'required'
        ]);

        dd('berhasil!');

    }
}
