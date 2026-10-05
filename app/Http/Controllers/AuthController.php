<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate(); 
            session()->flash('success', 'Logado com sucesso!');
            return redirect()->route('tasks.index');
        }

        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Credenciais inválidas.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('info', 'Você saiu da sua conta.');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:50', 'unique:users,username'],
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'min:6', 'confirmed'],
    ]);

    User::create($data);

    return redirect()->route('login')
        ->with('success', 'Conta criada! Faça login para entrar.');
    }
}


// Forma 1: explícita
//session()->flash('success', 'Tarefa criada!');
//return redirect()->route('tasks.index');

// Forma 2: atalho no redirect (a que usamos no projeto)
//return redirect()->route('tasks.index')
//    ->with('success', 'Tarefa criada!');
