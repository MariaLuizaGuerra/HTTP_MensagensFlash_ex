<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use App\Services\Operations;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria')
            ->where('user_id', session('user')['id'])
            ->latest()
            ->get();

        $estoqueTotal = Operations::estoqueTotal($produtos);

        return view('produtos.produtos_index', compact('produtos', 'estoqueTotal'));
    }

    public function create()
    {
        $categorias = Categoria::where('user_id', session('user')['id'])
            ->where('ativo', 1)
            ->get();

        return view('produtos.produtos_create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        Produto::create([
            'user_id' => session('user')['id'],
            'categoria_id' => $request->categoria_id,
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'estoque' => $request->estoque
        ]);

        return redirect()->route('produtos.index')
            ->with('successo', 'Produto cadastrado!');
    }

    public function edit($id)
    {
        $id = Operations::decryptId($id);

        if ($id instanceof \Illuminate\Http\RedirectResponse) {
            return $id;
        }

        $produto = Produto::findOrFail($id);

        $categorias = Categoria::where('user_id', session('user')['id'])
            ->where('ativo', 1)
            ->get();

        return view('produtos.produtos_edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $id = Operations::decryptId($id);

        if ($id instanceof \Illuminate\Http\RedirectResponse) {
            return $id;
        }

        $request->validate([
            'nome' => 'required|min:3',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        $produto = Produto::findOrFail($id);

        $produto->update([
            'categoria_id' => $request->categoria_id,
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'estoque' => $request->estoque
        ]);

        return redirect()->route('produtos.index')
            ->with('successo', 'Produto atualizado!');
    }

    public function destroy($id)
    {
        $id = Operations::decryptId($id);

        if ($id instanceof \Illuminate\Http\RedirectResponse) {
            return $id;
        }

        $produto = Produto::findOrFail($id);

        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('successo', 'Produto excluído!');
    }
}