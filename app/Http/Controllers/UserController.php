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

    public function updateProfilePage(){

            return view('updateProfile');

    }

    public function updateProfile(Request $request){


        $rules = [

            'full_name' => 'required|unique|max:15',
            'password' => 'required|min:5|max:20',
            'address' => 'required|min:5|max:95',
            'gender'=> 'required'

        ];

        if($request->email != auth()->user()->email){

            $rules['email'] = 'unique:users|required|email:dns';
        }


        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
             return back()->withErrors($validator);
        }



        $user = User::find(auth()->user()->id);

        if($user){
            $user->full_name = $request->full_name;
            $user->password = bcrypt($request->password);
            $user->address = $request->address;
            $user->email = $request->email;

            $user->save();
        }


        return redirect('/profile');

}
}
