<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserControllerEloquent;
use App\Http\Controllers\UserControllerQueryBuilder;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('eloquent', UserControllerEloquent::class)->names('eloquent');
Route::get('/hello', function(){
    return 'hello';
});