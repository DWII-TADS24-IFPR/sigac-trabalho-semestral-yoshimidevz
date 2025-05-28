<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index()
    {
        $nivels = Nivel::orderBy('nome')
            ->paginate(10);

        return view('nivels.index', compact('nivels'));
    }

    public function create()
    {
        return view('nivels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string'
        ]);

        $nivels = Nivel::create($request->all());

        return redirect()->route('niveis.index')
            ->with('success', 'Nível cadastrado com sucesso!');
    }

    public function show($id)
    {
        $nivels = Nivel::findOrFail($id);

        return view('nivels.show', compact('nivel'));
    }

    public function edit($id)
    {
        $nivels = Nivel::findOrFail($id);
        return view('nivels.edit', compact('nivel'));
    }

    public function update(Request $request, $id)
    {
        $nivels = Nivel::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|string|max:255',
            'descricao' => 'nullable|string'
        ]);

        $nivels->update($request->all());

        return redirect()->route('nivels.index')
            ->with('success', 'Nível atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $nivels = Nivel::findOrFail($id);
        $nivels->delete();

        return redirect()->route('niveis.index')
            ->with('success', 'Nível excluído com sucesso!');
    }

    public function restore($id)
    {
        $nivels = Nivel::withTrashed()->findOrFail($id);
        $nivels->restore();

        return redirect()->route('nivels.index')
            ->with('success', 'Nível restaurado com sucesso!');
    }
}
