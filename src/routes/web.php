<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ListingController::class, 'index']);
Route::get('/listings', [ListingController::class, 'index']);
Route::post('/', [ListingController::class, 'store'])
    ->middleware('auth');
Route::get('/listings/create', [ListingController::class, 'create'])
    ->middleware('auth');
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])
    ->middleware('auth');
Route::get('/listings/manage', [ListingController::class, 'manage'])
    ->middleware('auth');
Route::get('/listings/{listing}', [ListingController::class, 'show']);
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])
    ->middleware('auth');
Route::put('/listings/{listing}', [ListingController::class, 'update'])
    ->middleware('auth');


Route::get('/register', [UserController::class, 'create'])
    ->middleware('guest');
Route::post('/users', [UserController::class, 'store'])
    ->middleware('guest');
Route::get('/login', [UserController::class, 'login'])
    ->name('login')
    ->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate'])
    ->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('guest');
