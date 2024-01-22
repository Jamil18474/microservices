<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ReservationsController;
use \App\Http\Controllers\typeUsersController;

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

Route::get('/types', [typeUsersController::class, 'getTypes']);
Route::post('/types', [typeUsersController::class, 'setType']);
Route::get('/types/{id}', [typeUsersController::class, 'getType']);
Route::put('types/{id}', [typeUsersController::class, 'update']);
Route::delete('/types/{id}', [typeUsersController::class, 'deleteType']);

Route::get('/reservation', [ReservationsController::class, 'index']);
Route::get('/reservation', [ReservationsController::class, 'getReservation']);
Route::post('/reservation', [ReservationsController::class, 'setReservation']);
Route::put('/reservation', [ReservationsController::class, 'updateReservation']);
Route::delete('/reservation', [ReservationsController::class, 'deleteReservation']);
