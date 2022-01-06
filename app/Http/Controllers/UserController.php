<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        return view('home');
    }

    public function profilePage(){

        return view('profile');
    }


    public function logout(){
        auth()->logout();
        return redirect('->login');
    }
}
