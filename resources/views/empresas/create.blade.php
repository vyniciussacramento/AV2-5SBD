@extends('layout')

@section('content')
    <h1>Nova Empresa</h1>

    <form action="{{ route('empresas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>
        <div class="form-group">
            <label for="razao">Razão Social:</label>
            <input type="text" name="razao" id="razao" class="form-control">
        </div>
        <div class="form-group">
            <label for="comissao">Valor de comissao:</label>
            <input type="number" name="comissao" id="comissao" class="form-control">
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
