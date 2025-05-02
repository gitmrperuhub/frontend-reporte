<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Web\ModuleController;
use App\Http\Controllers\Web\WebPages;

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
Route::post('/login', [UserController::class, 'login3']);
Route::post('/module/menu_by_user', [ModuleController::class, 'GetModule']);
Route::post('/module/config_menu_by_user', [ModuleController::class, 'configurarMuduleByUser']);
Route::post('/module/all/menu_by_user', [UserController::class, 'getMenuByUser']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/user/getUser', [UserController::class, 'getUser']);
    Route::post('/user/logout', [UserController::class, 'logout']);
    Route::post('/user/getModuels', [UserController::class, 'getModuels']);
});
Route::post('/user/get-password', [UserController::class, 'getPassword']);
Route::post('/user/valid-password', [UserController::class, 'validPassword']);
