<?php

use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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


Route::get('/', [HomeController::class, 'viewFurniture']);
Route::get('/home', [HomeController::class, 'viewFurniture']);
Route::get('/login', [HomeController::class, 'toLogin']);
Route::get('/register', [RegisterController::class, 'index']);

Route::post('/registerUser', [RegisterController::class, 'store']);
Route::post('/login/user', [LoginController::class, 'loginUser']);
Route::get('/logout',[LoginController::class,'logout']);

Route::get('/profile', [UserController::class, 'profilePage']); //work in progress

Route::get('/viewFurniture', [FurnitureController::class, 'viewFurniture']);

Route::get('/addFurniture', [FurnitureController::class, 'addFurniturePage']);
Route::post('/addFurniture', [FurnitureController::class, 'addFurniture']); //sisa add image

Route::post('/updateFurniture', [FurnitureController::class, 'updateFurniture'])->name('update');


