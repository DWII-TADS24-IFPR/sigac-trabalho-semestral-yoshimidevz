@extends('layouts.app')

@section('title', 'Bem-vindo ao SIGAC')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center bg-light py-5" style="min-height: 80vh;">
    <div class="text-center">
        <h1 class="display-3 fw-bold text-danger mb-4 animate__animated animate__fadeInDown">
            Bem-vindo ao <span class="text-dark">SIGAC</span>
        </h1>
        <p class="lead text-muted mb-5 animate__animated animate__fadeInUp animate__delay-1s">
            Sistema de Gerenciamento Acadêmico Completo para Alunos e Administradores.
        </p>
    </div>

    <div class="d-flex gap-4 animate__animated animate__zoomIn animate__delay-2s">
        <a href="{{ route('login') }}" class="btn btn-danger btn-lg shadow px-5 py-2 fw-semibold">
            Entrar
        </a>
        <a href="{{ route('register') }}" class="btn btn-outline-danger btn-lg shadow px-5 py-2 fw-semibold">
            Cadastre-se
        </a>
    </div>
</div>
@endsection
