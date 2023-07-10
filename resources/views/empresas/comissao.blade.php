@extends('layout')

@section('content')
    <h1>Comissão da Empresa</h1>

    <h2>Informações da Empresa:</h2>
    <p>Nome: {{ $empresa->nome }}</p>
    <p>Comissão: R$ {{ $comissaoTotal }}</p>

    <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
