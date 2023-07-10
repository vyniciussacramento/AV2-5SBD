@extends('layout')

@section('content')
    <h1>Novo Pagamento</h1>

    <form action="{{ route('pagamentos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="numero_parcela">Número da Parcela:</label>
            <input type="number" name="numero_parcela" id="numero_parcela" class="form-control">
        </div>
        <div class="form-group">
            <label for="contrato">ID do Contrato:</label>
            <select name="contrato" id="contrato" class="form-control">
                @foreach ($contratos as $contrato)
                    <option value="{{ $contrato->id }}">{{ $contrato->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="valor_parcela">Valor da Parcela:</label>
            <input type="text" name="valor_parcela" id="valor_parcela" class="form-control">
        </div>
        <div class="form-group">
            <label for="verificar_pagamento">Verificar Pagamento:</label>
            <select name="verificar_pagamento" id="verificar_pagamento" class="form-control">
                <option value="1">Pago</option>
                <option value="0">Em aberto</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('pagamentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
