<?php

use App\Http\Controllers\index;
use App\Http\Controllers\login;
use App\Http\Controllers\prospects;
use App\Http\Controllers\puestosController;
use App\Http\Controllers\register;
use App\Http\Controllers\userController;
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

Route::get('/', [index::class,'index'],["name"=>"welcome"])->name("welcome");
Route::post("/login",[index::class,'login'],["name"=>"login.post"])->name("login.post");
Route::get("/logout",[index::class,'logout'],["name"=>"logout"])->name("logout");
Route::get('/login', [login::class,'index'],["name"=>"login"])->name("login");

Route::resource("/register",register::class,['name'=>"register"])->except(["create"]);
Route::resource("/prospects",prospects::class,['name'=>"prospects"]);
Route::resource("/puestos",puestosController::class,['name'=>"puestos"]);
Route::resource("/usuario",userController::class,['name'=>"usuario"]);
