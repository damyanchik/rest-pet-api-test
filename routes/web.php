<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetApiController;
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

Route::get('/', [PetApiController::class, 'index'])->name('petIndex');

Route::get('/pet', [PetApiController::class, 'show'])->name('petShow');

Route::get('/pet/create', [PetApiController::class, 'create'])->name('petCreate');

Route::post('/pet', [PetApiController::class, 'store'])->name('petStore');

Route::get('/pet/{id}/edit', [PetApiController::class, 'edit'])->name('petEdit');

Route::put('/pet/{id}', [PetApiController::class, 'update'])->name('petUpdate');

Route::delete('/pet/{id}', [PetApiController::class, 'destroy'])->name('petDestroy');

