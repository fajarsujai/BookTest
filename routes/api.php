<?php

use App\Http\Controllers\BookController;
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

// 
Route::get('book/index', [BookController::class, 'index']);
Route::post('book/store', [BookController::class, 'store']);
Route::patch('book/update/{id}', [BookController::class, 'update']);
Route::delete('book/delete/{id}', [BookController::class, 'delete']);
Route::get('book/show/{id}', [BookController::class, 'show']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

