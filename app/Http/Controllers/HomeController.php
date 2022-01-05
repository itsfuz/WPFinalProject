<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function toLogin(){
        return view('login-page');
    }

    public function viewFurniture(){
        $furnitures = Furniture::all();
        return view('home', compact('furnitures', $furnitures));
    }
}
