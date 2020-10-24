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
    return redirect('dashboard');
});



Route::get('/card/{card?}/edit', [CardController::class, 'edit'])->name('card.edit');
Route::get('/card/{card?}/photo/{photo}/delete', [CardPhotoController::class, 'deletePhoto'])->name('photo.delete');
Route::post('/card/{card?}/photo', [CardPhotoController::class, 'store'])->name('photo.upload');
Route::get('/card/{card}', [CardController::class, 'show'])->name('card.show');
Route::get('/card', [CardController::class, 'index']);
Route::post('/card/{card?}', [CardController::class, 'store']);




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[CardController::class,'index'])->name('dashboard');
