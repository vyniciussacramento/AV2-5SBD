@extends('layout')

@section('content')
    <h1>Editar Empresa</h1>

    <form action="{{ route('empresas.update', $empresa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $empresa->nome }}">
        </div>
        <div class="form-group">
            <label for="razao">Razão Social:</label>
            <input type="text" name="razao" id="razao" class="form-control" value="{{ $empresa->razao }}">
        </div>
        <div class="form-group">
            <label for="comissao">Valor de comissao:</label>
            <input type="number" name="comissao" id="comissao" class="form-control" value="{{ $empresa->comissao }}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
