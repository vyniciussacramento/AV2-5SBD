@extends('layout')

@section('content')
    <h1>Editar Vendedor</h1>

    <form action="{{ route('vendedores.update', $vendedore->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $vendedore->nome }}">
        </div>
        <div class="form-group">
            <label for="contratos">Contratos:</label>
            <select name="contratos" id="contratos" class="form-control">
                @foreach($contrato as $contrato)
                    <option value="{{ $contrato->id }}" {{ $vendedore->contratos == $contrato->id ? 'selected' : '' }}>
                        {{ $contrato->descricao }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="comissao">Comissão:</label>
            <input type="text" name="comissao" id="comissao" class="form-control" value="{{ $vendedore->valor_comissao }}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('vendedores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
