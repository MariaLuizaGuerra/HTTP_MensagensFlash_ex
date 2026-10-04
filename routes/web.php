<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', fn () => redirect()->route('tasks.index'));
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('tasks', TaskController::class)->except('show');

    // Demonstração de sessão HTTP: contador de visitas persistido na sessão
    Route::get('/sessao', function (Request $request) {
        $visitas = $request->session()->increment('visitas');

        return view('sessao', [
            'visitas' => $visitas,
            'dados' => $request->session()->all(),
        ]);
    })->name('sessao');
});
