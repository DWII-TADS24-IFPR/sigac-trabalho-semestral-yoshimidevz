<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Exibe a view de registro.
     */
    public function create(): View
    {
        $cursos = Curso::all();
        $turmas = Turma::with('curso')->get();
        return view('auth.register', compact('cursos', 'turmas'));
    }

    /**
     * Processa o registro de usuário.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validação dos dados de entrada
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'cpf' => ['required', 'string', 'unique:alunos,cpf'],
            'curso_id' => ['required', 'exists:cursos,id'],
            'turma_id' => ['required', 'exists:turmas,id'],  // corrigido para turmas
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Criar usuário (sem curso_id e turma_id, a menos que existam na tabela users)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
        ]);

        // Criar aluno vinculado ao usuário
        Aluno::create([
            'nome' => $request->name,
            'email' => $request->email,
            'senha' => Hash::make($request->password), // opcional, conforme seu design
            'cpf' => $request->cpf,
            'user_id' => $user->id,
            'curso_id' => $request->curso_id,
            'turma_id' => $request->turma_id,
        ]);

        // Evento para o sistema saber que houve registro
        event(new Registered($user));

        // Login automático do usuário
        Auth::login($user);

        // Redireciona para dashboard do aluno
        return redirect()->route('aluno.dashboard');
    }
}
