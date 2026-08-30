<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use App\Services\Operations;

class HomeController extends Controller
{
    public function index()
    {
        $user = session('user');

        $listaProdutos = Produto::where('user_id', $user['id'])->get();
        $listaCategorias = Categoria::where('user_id', $user['id'])->get();

        $produtos = $listaProdutos->count();
        $categorias = $listaCategorias->count();

        return view('home', compact('produtos', 'categorias'));
    }
}