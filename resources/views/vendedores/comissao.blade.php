@extends('layout')

@section('content')
    <h1>Comissão do Vendedor</h1>

    <h2>Informações do Vendedor:</h2>
    <p>Nome: {{ $vendedor->nome }}</p>
    <p>Comissão: R$ {{ $comissaoTotal }}</p>

    <a href="{{ route('vendedores.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
