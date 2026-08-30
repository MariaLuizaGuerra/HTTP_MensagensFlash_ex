<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Services\Operations;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::where('user_id', session('user')['id'])
            ->latest()
            ->get();

        return view('categorias.categorias_index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.categorias_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'codigo' => 'required|unique:categorias,codigo',
            'descricao' => 'required'
        ]);

        Categoria::create([
            'user_id' => session('user')['id'],
            'nome' => $request->nome,
            'codigo' => $request->codigo,
            'descricao' => $request->descricao,
            'ativo' => $request->has('ativo')
        ]);

        return redirect()->route('categorias.index')
            ->with('successo', 'Categoria cadastrada!');
    }

    public function edit($id)
    {
        $id = Operations::decryptId($id);

        if ($id instanceof \Illuminate\Http\RedirectResponse) {
            return $id;
        }

        $categoria = Categoria::findOrFail($id);

        return view('categorias.categorias_edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $id = Operations::decryptId($id);

        if ($id instanceof \Illuminate\Http\RedirectResponse) {
            return $id;
        }

        $request->validate([
            'nome' => 'required|min:3',
            'codigo' => 'required|unique:categorias,codigo,' . $id,
            'descricao' => 'required'
        ]);

        $categoria = Categoria::findOrFail($id);

        $categoria->update([
            'nome' => $request->nome,
            'codigo' => $request->codigo,
            'descricao' => $request->descricao,
            'ativo' => $request->boolean('ativo'),
        ]);

        return redirect()->route('categorias.index')
            ->with('successo', 'Categoria atualizada!');
    }

    public function destroy($id)
    {
        $id = Operations::decryptId($id);

        if ($id instanceof \Illuminate\Http\RedirectResponse) {
            return $id;
        }

        Categoria::destroy($id);

        return redirect()->route('categorias.index')
            ->with('successo', 'Categoria excluída!');
    }
}