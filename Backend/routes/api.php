<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BoatController;
use App\Http\Controllers\RentController;

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

Route::post('signup', [UserController::class, 'signup']);

Route::post('login', [UserController::class, 'login']);

Route::get('users', [UserController::class, 'index']);

Route::get('boats', [BoatController::class, 'index']);

Route::get('boats/{id}', [BoatController::class, 'show']);

Route::get('logout', [UserController::class, 'logout']);

Route::get('rents', [RentController::class, 'index']);

Route::post('rents', [RentController::class, 'store']);

Route::post('boats', [BoatController::class, 'store']);

Route::get('/users/{user_id}/rents', [RentController::class, 'getUserRents']);

Route::put('/user/{user_id}', [UserController::class, 'updateProfile']);

Route::delete('/boats/{id}', [BoatController::class, 'destroy']);
Route::delete('/rents/{id}', [RentController::class, 'destroy']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::put('boats/{id}', [BoatController::class, 'update']);
Route::put('rents/{id}', [RentController::class, 'update']);
Route::put('users/{id}', [UserController::class, 'update']);
