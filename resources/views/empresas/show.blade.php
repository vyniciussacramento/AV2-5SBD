@extends('layout')

@section('content')
    <h1>Detalhes da Empresa</h1>

    <p><strong>ID:</strong> {{ $empresa->id }}</p>
    <p><strong>Nome:</strong> {{ $empresa->nome }}</p>
    <p><strong>Razão Social:</strong> {{ $empresa->razao }}</p>

    <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
