<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    //
    use AuthenticatesUsers;

    // @var string

    protected $redirectTo = RouteServiceProvider::HOME;



    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}


