@extends('layout')

@section('content')
    <h1>Novo Vendedor</h1>

    <form action="{{ route('vendedores.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>
        <div class="form-group">
            <label for="contratos">Contratos:</label>
            <select name="contratos" id="contratos" class="form-control">
                @foreach ($contratos as $contrato)
                    <option value="{{ $contrato->id }}">{{ $contrato->descricao }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="comissao">Comissão:</label>
            <input type="text" name="comissao" id="comissao" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('vendedores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
