<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{
        public function login()
    {
        return view('login');
    }
    public function loginSubmit(Request $request)
{
    $request->validate([
        'text_username' => 'required|email',
        'text_password' => 'required|min:6',
    ], [
        'text_username.required' => 'O e-mail é obrigatório.',
        'text_username.email' => 'Digite um e-mail válido.',
        'text_password.required' => 'A senha é obrigatória.',
        'text_password.min' => 'A senha deve ter no mínimo 6 caracteres.',
    ]);

    $email = $request->text_username;
    $password = $request->text_password;

    $user = User::where('email', $email)
                ->whereNull('deleted_at')
                ->first();

    if (!$user || !password_verify($password, $user->password)) {
        return back()
            ->withInput()
            ->with('login_error', 'E-mail ou senha incorretos!');
    }

    $user->last_login = now();
    $user->save();

    session([
        'user' => [
            'id' => $user->id,
            'username' => $user->username,
        ]
    ]);

    return redirect()->route('home');
}
    public function create(){
        return 'Criando usuario';
    }

    
    public function logout()
    {
        session()->forget('user');

        return redirect()->route('login');
    }


}
