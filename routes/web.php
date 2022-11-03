<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [UserController::class, 'index']);  
// Route::get('show', [UserController::class, 'show']);  
// Route::post('searchdata/{id}', [UserController::class, 'searchdata']);  

Route::get('/',[UserController::class,'index']);
Route::post('user/search',[UserController::class,'showuser'])->name('user.search');
