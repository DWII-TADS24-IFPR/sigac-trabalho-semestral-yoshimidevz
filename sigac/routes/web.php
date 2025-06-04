<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComprovanteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DeclaracaoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\TurmaController;

Route::get('/', function () {
    return view('welcome');
});

//Rotas para autenticação de middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', CheckRole::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('alunos', AlunoController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('turmas', TurmaController::class);
    Route::resource('eixos', EixoController::class);
    Route::resource('niveis', NivelController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('avaliacoes', AvaliacaoController::class);
    Route::post('avaliacoes/{id}/aprovar', [AvaliacaoController::class, 'aprovar'])->name('avaliacoes.aprovar');
    Route::post('avaliacoes/{id}/rejeitar', [AvaliacaoController::class, 'rejeitar'])->name('avaliacoes.rejeitar');
    Route::resource('graficos', GraficoController::class);


});

Route::middleware(['auth', CheckRole::class . ':aluno'])->prefix('aluno')->name('aluno.')->group(function (){
    Route::get('/dashboard', [AlunoController::class, 'dashboard'])->name('dashboard');
    Route::resource('perfil', PerfilController::class);
    Route::resource('solicitacoes', SolicitacaoController::class);
    Route::resource('declaracoes', DeclaracaoController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//rota para o redirecionamento para a tela de login ao dar logout
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

require __DIR__ . '/auth.php';
// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/', [HomeController::class, 'index'])->name('home');


// // // Rotas para Alunos
// Route::resource('/alunos', AlunoController::class);
// Route::get('alunos/restore/{id}', [AlunoController::class, 'restore'])->name('alunos.restore');

// // // Rotas para Categorias
// Route::resource('categorias', CategoriaController::class);
// Route::get('categorias/restore/{id}', [CategoriaController::class, 'restore'])->name('categorias.restore');

// // // Rotas para Comprovantes
// Route::resource('comprovantes', ComprovanteController::class);
// Route::get('comprovantes/restore/{id}', [ComprovanteController::class, 'restore'])->name('comprovantes.restore');

// // // Rotas para Cursos
// Route::resource('cursos', CursoController::class);
// Route::get('cursos/restore/{id}', [CursoController::class, 'restore'])->name('cursos.restore');

// // // Rotas para Declarações
// Route::resource('declaracoes', DeclaracaoController::class);
// Route::get('declaracoes/restore/{id}', [DeclaracaoController::class, 'restore'])->name('declaracoes.restore');

// // // Rotas para Documentos
// Route::resource('documentos', DocumentoController::class);
// Route::get('documentos/restore/{id}', [DocumentoController::class, 'restore'])->name('documentos.restore');

// // // Rotas para Níveis
// Route::resource('niveis', NivelController::class);
// Route::get('niveis/restore/{id}', [NivelController::class, 'restore'])->name('niveis.restore');

// // // Rotas para Turmas
// Route::resource('turmas', TurmaController::class);
// Route::get('turmas/restore/{id}', [TurmaController::class, 'restore'])->name('turmas.restore');
