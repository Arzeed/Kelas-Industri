<?php

use App\Http\Controllers\API\AuthControllerJWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TodoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', UserController::class)->only('index', 'show', 'update', 'destroy', 'store');
Route::resource('todos', TodoController::class)->only('index', 'show', 'update', 'destroy', 'store');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/login', [AuthControllerJWT::class, 'login']);
    Route::post('/register', [AuthControllerJWT::class, 'register']);
    Route::post('/logout', [AuthControllerJWT::class, 'logout']);
    Route::post('/refresh', [AuthControllerJWT::class, 'refresh']);
    Route::post('/me', [AuthControllerJWT::class, 'me']);
});