<?php

use App\Http\Controllers\apiUser;
use App\Http\Controllers\prospectsApi;
use App\Http\Controllers\puestosApiController;
use App\Http\Controllers\usuariosApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("user",[apiUser::class,'store']);
Route::post("prospects",[prospectsApi::class,'store']);
Route::get("prospects/{id}",[prospectsApi::class,'show']);
route::put("prospects/{id}",[prospectsApi::class,'update']);
Route::get("puestos/{id}",[puestosApiController::class,'show']);
Route::delete("puestos/{id}",[puestosApiController::class,'destroy']);
Route::post("puestos",[puestosApiController::class,'store']);
Route::post("register",[apiUser::class,'register']);
Route::post("usuarios",[usuariosApiController::class,'store']);
