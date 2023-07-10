@extends('layout')

@section('content')
    <h1>Novo Associado</h1>

    <form action="{{ route('associados.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>
        <div class="form-group">
            <label for="salario">Salário:</label>
            <input type="number" name="salario" id="salario" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="empresa">Empresa:</label>
            <select name="empresa" id="empresa" class="form-control">
                @foreach ($empresa as $empresa) 
                    <option value="{{$empresa->id}}">{{$empresa->nome}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('associados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
