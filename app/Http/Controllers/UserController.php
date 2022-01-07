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

    public function getProfile($id){

        // $profileResult = User::where('id', '=', $id)->get();
        // $profile = User:: where('id', '=', $profileResult[0]->id)->get();

        // return view ('profile', [
        //     "fullname" => $profile[0]->full_name,
        //     "email" => $profile[0]->email,
        //     "gender" => $profile[0]->gender,
        //     "address" => $profile[0]->address,
        //     "role" => $profile[0]->role

        // ]);

        return view('profile');
    }
}
