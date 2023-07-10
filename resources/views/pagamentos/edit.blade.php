@extends('layout')

@section('content')
    <h1>Editar Pagamento</h1>

    <form action="{{ route('pagamentos.update', $pagamento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="numero_parcela">Número da Parcela:</label>
            <input type="number" name="numero_parcela" id="numero_parcela" class="form-control" value="{{ $pagamento->numero_parcela }}">
        </div>
        <div class="form-group">
            <label for="contrato">ID do Contrato:</label>
            <select name="contrato" id="contrato" class="form-control">
                @foreach ($contratos as $contrato)
                    <option value="{{ $contrato->id }}" {{ $contrato->id == $pagamento->contrato_id ? 'selected' : '' }}>{{ $contrato->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="valor_parcela">Valor da Parcela:</label>
            <input type="text" name="valor_parcela" id="valor_parcela" class="form-control" value="{{ $pagamento->valor_parcela }}">
        </div>
        <div class="form-group">
            <label for="verificar_pagamento">Verificar Pagamento:</label>
            <select name="verificar_pagamento" id="verificar_pagamento" class="form-control">
                <option value="1" {{ $pagamento->verificar_pagamento ? 'selected' : '' }}>Pago</option>
                <option value="0" {{ !$pagamento->verificar_pagamento ? 'selected' : '' }}>Em aberto</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('pagamentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
