<?php

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
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\UsuarioController;

Route::get('/schedule/new-event',[AgendaController::class, 'create']);
Route::get('/schedule/{id}',[AgendaController::class, 'edit']);
Route::put('/schedule/update/{id}',[AgendaController::class, 'update']);
Route::delete('/schedule/delete/{id}',[AgendaController::class, 'delete']);
Route::get('/user/new',[UsuarioController::class, 'create']);
Route::post('/users',[UsuarioController::class, 'store']);
Route::get('/',[AgendaController::class, 'index']);
Route::post('/schedule/save',[AgendaController::class, 'store']);
Route::post('/user',[UsuarioController::class, 'login']);
Route::get('/user/{id}',[AgendaController::class, 'index']);
Route::get('/schedule',[AgendaController::class, 'show']);



