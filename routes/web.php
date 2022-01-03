<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FurnitureController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/register', function(){

    return view('register');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/viewFurniture', [FurnitureController::class, 'viewFurniture'])->name('view');

Route::post('/addFurniture', [FurnitureController::class, 'addFurniture'])->name('addFurniture');

Route::get('login', [LoginController::class, 'login']);
