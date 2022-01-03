<?php

use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

<<<<<<< HEAD
=======



<<<<<<< Updated upstream
>>>>>>> 35ab9facae3b8f2540c8c04905dcd8f67ff9d6d9
Route::get('/login', [LoginController::class, 'index']);
=======
Route::get('/login', [LoginController::class, 'index'])->name('login');
>>>>>>> Stashed changes

Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/viewFurniture', [FurnitureController::class, 'viewFurniture'])->name('view');

Route::post('/addFurniture', [FurnitureController::class, 'addFurniture'])->name('add');

<<<<<<< HEAD
=======

>>>>>>> 35ab9facae3b8f2540c8c04905dcd8f67ff9d6d9
