<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CardPhotoController;

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

Route::get('/', function(){
    return view('welcome');
});


Route::get('/card/{card?}/edit', [CardController::class, 'edit'])->name('card.edit');
Route::post('/card/{card?}/photo', [CardPhotoController::class, 'store'])->name('photo.upload');
Route::get('/card', [CardController::class, 'index']);
Route::post('/card/{card?}', [CardController::class, 'store']);




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[CardController::class,'index'])->name('dashboard');
