<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('nome')
            ->paginate(10);

        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'maximo_horas' => 'nullable|float'
        ]);

        $categorias = Categoria::create($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria cadastrada com sucesso!');
    }

    public function show($id)
    {
        $categorias = Categoria::findOrFail($id);

        return view('categorias.show', compact('categoria'));
    }

    public function edit($id)
    {
        $categorias = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categorias = Categoria::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string'
        ]);

        $categorias->update($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $categorias = Categoria::findOrFail($id);
        $categorias->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria excluída com sucesso!');
    }

    public function restore($id)
    {
        $categorias = Categoria::withTrashed()->findOrFail($id);
        $categorias->restore();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria restaurada com sucesso!');
    }
}
