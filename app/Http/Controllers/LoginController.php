<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginUser(Request $request){
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        $isvalid = auth()->attempt($data);
        if($isvalid){
            return redirect('/');
        }else{
            return redirect('/login')->with('notification', 'Account not Found');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

}


