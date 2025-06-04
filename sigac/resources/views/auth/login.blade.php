@extends('layouts.app')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center bg-light py-5" style="min-height: 80vh;">
    <div class="card shadow-lg border-0" style="max-width: 400px; width: 100%;">
        <div class="card-header bg-danger text-white text-center py-3">
            <h4 class="mb-0 fw-bold">Login</h4>
        </div>
        <div class="card-body px-4 py-4">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold text-danger">E-mail</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="form-control border-danger @error('email') is-invalid @enderror"
                        placeholder="seu@email.com">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold text-danger">Senha</label>
                    <input type="password" name="password" id="password" required
                        class="form-control border-danger @error('password') is-invalid @enderror"
                        placeholder="********">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label text-secondary" for="remember">
                        Lembrar-me
                    </label>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-danger fw-semibold" style="text-decoration: underline;">
                            Esqueceu a senha?
                        </a>
                    @endif
                    <button type="submit" class="btn btn-danger px-4 py-2 fw-semibold shadow-sm">
                        Entrar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="text-center mt-4">
        <small class="text-muted">
            Não tem conta? <a href="{{ route('register') }}" class="text-danger fw-semibold">Cadastre-se</a>
        </small>
    </div>
</div>
@endsection
