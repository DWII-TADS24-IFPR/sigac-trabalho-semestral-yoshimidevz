@extends('layouts.app')

@section('title', 'Cadastro de Aluno')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center bg-light py-5" style="min-height: 80vh;">
    <div class="card shadow-lg border-0" style="max-width: 450px; width: 100%;">
        <div class="card-header bg-danger text-white text-center py-3">
            <h3 class="mb-0 fw-bold">Cadastro de Aluno</h3>
        </div>
        <div class="card-body px-4 py-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                        placeholder="Nome completo" required autofocus>
                    <label for="name" class="fw-semibold text-danger">Nome Completo</label>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                        placeholder="E-mail institucional" required>
                    <label for="email" class="fw-semibold text-danger">E-mail Institucional</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="cpf" id="cpf"
                        class="form-control @error('cpf') is-invalid @enderror" value="{{ old('cpf') }}"
                        placeholder="CPF" required>
                    <label for="cpf" class="fw-semibold text-danger">CPF</label>
                    @error('cpf')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Senha" required>
                    <label for="password" class="fw-semibold text-danger">Senha</label>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-4">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-control" placeholder="Confirme a senha" required>
                    <label for="password_confirmation" class="fw-semibold text-danger">Confirmar Senha</label>
                </div>

                <button type="submit" class="btn btn-danger w-100 fw-semibold shadow-sm">Cadastrar</button>
            </form>
        </div>
    </div>

    <div class="text-center mt-4">
        <small class="text-muted">
            Já tem conta? <a href="{{ route('login') }}" class="text-danger fw-semibold">Entrar</a>
        </small>
    </div>
</div>
@endsection
