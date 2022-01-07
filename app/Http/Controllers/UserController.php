<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PharIo\Manifest\Email;

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

    public function updateProfilePage(){

            return view('updateProfile');

    }

    public function updateProfile(Request $request){
        $profile = User::find($request->id);

        $profile-> full_name = $request-> full_name;
        $profile-> email = $request-> email;
        $profile-> password = $request-> password;
        $profile-> address = $request-> address;

        $profile->save();

        return redirect()->back();

}
}
