@extends('layout')

@section('content')
    <h1>Detalhes do Pagamento</h1>

    <p><strong>ID:</strong> {{ $pagamento->id }}</p>
    <p><strong>Número da Parcela:</strong> {{ $pagamento->numero_parcela }}</p>
    <p><strong>ID do Contrato:</strong> {{ $pagamento->contrato}}</p>
    <p><strong>Valor da Parcela:</strong> {{ $pagamento->valor_parcela }}</p>
    <p><strong>Verificar Pagamento:</strong> {{ $pagamento->verificar_pagamento ? 'Pago' : 'Em aberto' }}</p>

    <a href="{{ route('pagamentos.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
