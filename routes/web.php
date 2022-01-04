<?php

use App\Http\Controllers\FurnitureController;
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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/viewFurniture', [FurnitureController::class, 'viewFurniture'])->name('view');

Route::get('/addFurniture', [FurnitureController::class, 'addFurniture'])->name('add');

Route::post('/addFurniture', [FurnitureController::class, 'addFurniture'])->name('add');

Route::post('/updateFurniture', [FurnitureController::class, 'updateFurniture'])->name('update');

Route::get('/logout',[UserController::class, 'logout']);
