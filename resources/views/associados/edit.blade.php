@extends('layout')

@section('content')
    <h1>Editar Associado</h1>

    <form action="{{ route('associados.update', $associado->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $associado->nome }}">
        </div>
        <div class="form-group">
            <label for="salario">Salário:</label>
            <input type="number" name="salario" id="salario" class="form-control" value="{{ $associado->salario }}">
        </div>

        <div class="form-group">
            <label for="empresa">Empresa:</label>
            <select name="empresa" id="empresa" class="form-control">
                @foreach ($empresa as $empresa) 
                    <option value="{{$empresa->id}}">{{$empresa->nome}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="spc">SPC</label>
            <select name="spc" id="spc" class="form-control">
                <option value="1" {{ $associado->spc ? 'selected' : '' }}>Devedor</option>
                <option value="0" {{ !$associado->spc ? 'selected' : '' }}>Em dia</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('associados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
