<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

//view page routes
Route::view("/","layouts.layout");
Route::view("/","frontend.home");
Route::view("register","frontend.register")->name("register");
Route::view("login", "frontend.login")->name("login");

//resource controller for registration 
Route::post("register_form", "RegisterController@store")->name("register_form");