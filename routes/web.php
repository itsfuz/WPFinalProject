<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

Route::get('/profile', [UserController::class, 'profilePage']);
Route::get('/updateProfile', [UserController::class, 'updateProfilePage']);
Route::post('/updateProfile', [UserController::class, 'updateProfile']);

Route::get('/viewFurniture', [FurnitureController::class, 'viewFurniture']);
Route::get('/addFurniture', [FurnitureController::class, 'addFurniturePage']);
Route::post('/addFurniture', [FurnitureController::class, 'addFurniture']);
Route::get('/updateFurniture/{id}', [FurnitureController::class, 'updateFurniturePage']);
Route::post('/updateF/{id}', [FurnitureController::class, 'updateFurniture']);
Route::delete('/deleteFurniture/{id}', [FurnitureController::class, 'deleteFurniture']);
Route::get('/furnitureDetails/{id}', [FurnitureController::class, 'furnitureDetails']);

Route::get('/viewCart/{id}', [CartController::class, 'viewCart']);
Route::post('/addToCart/{id}', [CartController::class, 'addToCart']);
Route::get('addQuantity/{id}', [CartController::class, 'addQuantity']);
Route::get('minusQuantity/{id}', [CartController::class, 'minusQuantity']);

Route::get('/checkOut/{id}', [TransactionController::class, 'GoToCheckOut']);
Route::post('/getTransaction',[TransactionController::class, 'createTransaction']);
Route::get('/TransactionHistoryAdmin', [TransactionController::class, 'adminTransactionHistory']);

