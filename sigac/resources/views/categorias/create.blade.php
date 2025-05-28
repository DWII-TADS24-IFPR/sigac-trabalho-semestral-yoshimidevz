@extends('layouts.app')

@section('title', 'Criar Categoria')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Criar Nova Categoria</h1>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Formulário de Cadastro</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}" required>
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="maximo_horas" class="form-label">Máximo horas</label>
                    <textarea class="form-control @error('maximo_horas') is-invalid @enderror" id="maximo_horas" name="maximo_horas" rows="1">{{ old('maximo_horas') }}</textarea>
                    @error('maximo_horas')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="curso_id" class="form-label">Curso</label>
                    <select class="form-select @error('curso_id') is-invalid @enderror" id="curso_id" name="curso_id" required>
                        <option value="">Selecione um curso</option>
                        @foreach($cursos ?? [] as $curso)
                            <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>
                                {{ $curso->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('curso_id')
                        <div cl ass="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end" >
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Salvar
                </button>
                <a href="{{ route('categorias.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
