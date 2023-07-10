@extends('layout')

@section('content')
    <h1>Novo Contrato</h1>

    <form action="{{ route('contratos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="form-control">
        </div>
        <div class="form-group">
            <label for="associado">Associado:</label>
            <select name="associado" id="associado" class="form-control">
                @foreach ($associado as $associado)
                    <option value="{{ $associado->id }}">{{ $associado->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantidade_parcelas">Quantidade de Parcelas:</label>
            <input type="number" name="quantidade_parcelas" id="quantidade_parcelas" class="form-control"  min="12" max="24">
        </div>
        <div class="form-group">
            <label for="taxa_juros_mensal">Taxa de Juros Mensal:</label>
            <input type="number" name="taxa_juros_mensal" id="taxa_juros_mensal" class="form-control">
        </div>

        <div class="form-group">
            <label for="nome_bem">Nome do Bem:</label>
            <input type="text" name="nome_bem" id="nome_bem" class="form-control">
        </div>
        <div class="form-group">
            <label for="descricao_bem">Descrição do Bem:</label>
            <input type="text" name="descricao_bem" id="descricao_bem" class="form-control">
        </div>

        
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('contratos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
