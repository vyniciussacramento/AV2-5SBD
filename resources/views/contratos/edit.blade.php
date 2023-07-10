@extends('layout')

@section('content')
    <h1>Editar Contrato</h1>

    <form action="{{ route('contratos.update', $contrato->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control" value="{{ $contrato->valor }}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $contrato->descricao }}">
        </div>
        <div class="form-group">
            <label for="associado">Associado:</label>
            <select name="associado" id="associado" class="form-control">
                @foreach ($associado as $associado)
                    <option value="{{ $associado->id }}" {{ $associado->id == $contrato->associado_id ? 'selected' : '' }}>{{ $associado->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantidade_parcelas">Quantidade de Parcelas:</label>
            <input type="number" name="quantidade_parcelas" id="quantidade_parcelas" class="form-control" value="{{ $contrato->quantidade_parcelas }}">
        </div>
        <div class="form-group">
            <label for="taxa_juros_mensal">Taxa de Juros Mensal:</label>
            <input type="text" name="taxa_juros_mensal" id="taxa_juros_mensal" class="form-control" value="{{ $contrato->taxa_juros_mensal }}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('contratos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
