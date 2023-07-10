@extends('layout')

@section('content')
    <h1>Detalhes do Associado</h1>

    <p><strong>ID:</strong> {{ $associado->id }}</p>
    <p><strong>Nome:</strong> {{ $associado->nome }}</p>
    <p><strong>Salário:</strong> {{ $associado->salario }}</p>
    <p><strong>Empresa: {{$empresa->nome}}</strong></p>
    <a href="{{ route('associados.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
