<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvaController;
use App\Http\Controllers\DividaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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


Route::get('/', [AuthenticatedSessionController::class, 'create'])
->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/cadastrar-prova',[ProvaController::class,'store'])->name('prova.store');
    Route::post('/confirmar-prova',[ProvaController::class,'confirmar_prova'])->name('prova.confirmar_prova');
    Route::post('/recusar-prova',[ProvaController::class,'destroy'])->name('prova.recusar_prova');
    Route::get('/analisar-prova/{prova}',[ProvaController::class,'show'])->name('prova.analisar-prova');
    
    Route::post('/confirmar-pagamento',[DividaController::class,'comfirmar_pagamento'])->name('divida.comfirmar_pagamento');
    Route::get('/analisar-dividas',[DividaController::class,'show'])->name('divida.analisar-dividas');
}); 

require __DIR__.'/auth.php';
