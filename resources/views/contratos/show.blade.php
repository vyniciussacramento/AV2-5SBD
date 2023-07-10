@extends('layout')

@section('content')
    <h1>Detalhes do Contrato</h1>

    <p><strong>ID:</strong> {{ $contrato->id }}</p>
    <p><strong>Valor:</strong> {{ $contrato->valor }}</p>
    <p><strong>Descrição:</strong> {{ $contrato->descricao }}</p>
    <p><strong>Associado:</strong> {{ $contrato->associado }}</p>
    <p><strong>Quantidade de Parcelas:</strong> {{ $contrato->quantidade_parcelas }}</p>
    <p><strong>Taxa de Juros Mensal:</strong> {{ $contrato->taxa_juros_mensal }}</p>
    <p><strong>Valor da Parcela:</strong> {{ $contrato->valor_parcela }}</p>

    <a href="{{ route('contratos.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
