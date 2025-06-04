@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Dashboard</h1>
</div>

<!-- Seção de Acesso Rápido - Entidades Primárias -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Cadastros Primários</h5>
                <small>Comece por aqui! Cadastre primeiro estas entidades</small>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('niveis.create') }}" class="btn btn-outline-primary w-100 py-3">
                            <i class="fas fa-layer-group fa-2x mb-2"></i>
                            <div>Novo Nível</div>
                            <small class="text-muted">Cadastre primeiro</small>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('categorias.create') }}" class="btn btn-outline-primary w-100 py-3">
                            <i class="fas fa-tags fa-2x mb-2"></i>
                            <div>Nova Categoria</div>
                            <small class="text-muted">Cadastre segundo</small>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('cursos.create') }}" class="btn btn-outline-primary w-100 py-3">
                            <i class="fas fa-book fa-2x mb-2"></i>
                            <div>Novo Curso</div>
                            <small class="text-muted">Requer Nível</small>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('turmas.create') }}" class="btn btn-outline-primary w-100 py-3">
                            <i class="fas fa-users fa-2x mb-2"></i>
                            <div>Nova Turma</div>
                            <small class="text-muted">Requer Curso</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Seção de Acesso Rápido - Entidades Secundárias -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Cadastros Secundários</h5>
                <small>Cadastre após criar as entidades primárias</small>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('alunos.create') }}" class="btn btn-outline-success w-100 py-3">
                            <i class="fas fa-user-graduate fa-2x mb-2"></i>
                            <div>Novo Aluno</div>
                            <small class="text-muted">Requer Curso e Turma</small>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('documentos.create') }}" class="btn btn-outline-success w-100 py-3">
                            <i class="fas fa-file-pdf fa-2x mb-2"></i>
                            <div>Novo Documento</div>
                            <small class="text-muted">Requer Aluno e Categoria</small>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('declaracoes.create') }}" class="btn btn-outline-success w-100 py-3">
                            <i class="fas fa-certificate fa-2x mb-2"></i>
                            <div>Nova Declaração</div>
                            <small class="text-muted">Requer Aluno</small>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('comprovantes.create') }}" class="btn btn-outline-success w-100 py-3">
                            <i class="fas fa-file-alt fa-2x mb-2"></i>
                            <div>Novo Comprovante</div>
                            <small class="text-muted">Requer Aluno e Documento</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estatísticas -->
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card bg-primary text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-0">Alunos</h6>
                        <h2 class="mt-2 mb-0">{{ $totalAlunos ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-user-graduate fa-3x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ route('alunos.index') }}" class="text-white text-decoration-none">Ver detalhes</a>
                <i class="fas fa-arrow-circle-right text-white"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card bg-success text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-0">Cursos</h6>
                        <h2 class="mt-2 mb-0">{{ $totalCursos ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-book fa-3x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ route('cursos.index') }}" class="text-white text-decoration-none">Ver detalhes</a>
                <i class="fas fa-arrow-circle-right text-white"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card bg-warning text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-0">Turmas</h6>
                        <h2 class="mt-2 mb-0">{{ $totalTurmas ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-users fa-3x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ route('turmas.index') }}" class="text-white text-decoration-none">Ver detalhes</a>
                <i class="fas fa-arrow-circle-right text-white"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card bg-danger text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-0">Documentos</h6>
                        <h2 class="mt-2 mb-0">{{ $totalDocumentos ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-file-pdf fa-3x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ route('documentos.index') }}" class="text-white text-decoration-none">Ver detalhes</a>
                <i class="fas fa-arrow-circle-right text-white"></i>
            </div>
        </div>
    </div>
</div>

<!-- Últimos registros -->
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Últimos Alunos Cadastrados</h5>
            </div>
            <div class="card-body">
                @if(isset($ultimosAlunos) && $ultimosAlunos->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Curso</th>
                                    <th>Data</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ultimosAlunos as $aluno)
                                <tr>
                                    <td>{{ $aluno->nome }}</td>
                                    <td>{{ $aluno->curso->nome ?? 'N/A' }}</td>
                                    <td>{{ $aluno->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-sm btn-info text-white">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted">Nenhum aluno cadastrado recentemente.</p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Últimos Documentos Emitidos</h5>
            </div>
            <div class="card-body">
                @if(isset($ultimosDocumentos) && $ultimosDocumentos->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Aluno</th>
                                    <th>Data</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ultimosDocumentos as $documento)
                                <tr>
                                    <td>{{ $documento->titulo }}</td>
                                    <td>{{ $documento->aluno->nome ?? 'N/A' }}</td>
                                    <td>{{ $documento->data_emissao->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('documentos.show', $documento->id) }}" class="btn btn-sm btn-info text-white">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted">Nenhum documento emitido recentemente.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
