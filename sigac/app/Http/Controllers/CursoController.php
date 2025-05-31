<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Nivel;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with(['categoria', 'nivel'])
            ->orderBy('nome')
            ->paginate(10);

        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $nivels = Nivel::orderBy('nome')->get();

        return view('cursos.create', compact('nivels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'sometimes|string|max:255',
            'sigla' => 'sometimes|string|max:10',
            'carga_horaria' => 'sometimes|integer|min:1',
            'eixo_id' => 'sometimes|exists:eixos,id',
            'nivel_id' => 'sometimes|exists:nivels,id'
        ]);

        $curso = Curso::create($request->all());

        return redirect()->route('cursos.index')
            ->with('success', 'Curso cadastrado com sucesso!');
    }

    public function show($id)
    {
        $curso = Curso::with(['nivel'])
            ->findOrFail($id);

        return view('cursos.show', compact('curso'));
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);

        $nivels = Nivel::orderBy('nome')->get();

        return view('cursos.edit', compact('curso', 'nivels'));
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|string|max:255',
            'sigla' => 'sometimes|string|max:10',
            'carga_horaria' => 'sometimes|integer|min:1',
            'eixo_id' => 'sometimes|exists:eixos,id',
            'nivel_id' => 'sometimes|exists:nivels,id'
        ]);

        $curso->update($request->all());

        return redirect()->route('cursos.index')
            ->with('success', 'Curso atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('cursos.index')
            ->with('success', 'Curso excluído com sucesso!');
    }

    public function restore($id)
    {
        $curso = Curso::withTrashed()->findOrFail($id);
        $curso->restore();

        return redirect()->route('cursos.index')
            ->with('success', 'Curso restaurado com sucesso!');
    }
}
