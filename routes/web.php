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
Route::view("/","frontend.home")->name("home");
Route::view("register","frontend.register")->name("register");
Route::view("login", "frontend.login")->name("login");

//registration and login
Route::post("register_form", "RegisterController@store")->name("register_form");
Route::post("login_form", "RegisterController@login_form")->name("login_form");

//middleware for giving permissions to the pages
Route::group(["middleware"=>["web", "login"]], function(){
    //Middleware for admin pages
    Route::group([
        "prefix"=>"Admin",
        "middleware"=>"is_admin",
        "as"=>"Admin."
    ],function(){
        Route::get("dashboard",[App\Http\Controllers\Admin\ViewController::class, "dashboard"])->name("dashboard");
    });
    
    //middleware for user pages
    Route::group([
        "prefix"=>"User",
        "as"=>"User"
    ], function(){
        Route::get("dashboard", [App\Http\Controllers\User\ViewController::class, "dashboard"])->name("dashboard");
    });
});