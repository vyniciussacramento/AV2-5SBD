@extends('layout')

@section('content')
    <h1>Associados</h1>

    <a href="{{ route('associados.create') }}" class="btn btn-primary mb-3">Novo Associado</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Salário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($associados as $associado)
                <tr>
                    <td>{{ $associado->id }}</td>
                    <td>{{ $associado->nome }}</td>
                    <td>{{ $associado->salario }}</td>
                    <td>
                        <a href="{{ route('associados.show', $associado->id) }}" class="btn btn-sm btn-primary">Ver</a>
                        <a href="{{ route('associados.edit', $associado->id) }}" class="btn btn-sm btn-secondary">Editar</a>
                        <form action="{{ route('associados.destroy', $associado->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
