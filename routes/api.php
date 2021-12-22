<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoItemController;

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


Route::get('/items', [TodoItemController::class, 'index']);
Route::prefix('/item')->group( function() {
    Route::post('/store', [TodoItemController::class, 'store']);
    Route::put('/{id}', [TodoItemController::class, 'update']);
    Route::delete('/{id}', [TodoItemController::class, 'destroy']);
});