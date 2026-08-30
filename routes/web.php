<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\HomeController;


Route::middleware([CheckIsLogged::class])->group(function () {
    Route::get('/', [HomeController::class,'index'])->middleware('CheckIsLogged')->name('home');
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/categorias/store', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/edit/{id}', [CategoriaController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/update/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/delete/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos/store', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('/produtos/edit/{id}', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('/produtos/update/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::delete('/produtos/delete/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});



Route::middleware([CheckIsNotLogged::class])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-submit', [AuthController::class, 'loginSubmit'])->name('login.submit');
    Route::get('register', [AuthController::class, 'create'])->name('register');
});
