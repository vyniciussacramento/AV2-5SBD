@extends('layout')

@section('content')
    <h1>Empresas</h1>

    <a href="{{ route('empresas.create') }}" class="btn btn-primary mb-3">Nova Empresa</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Razão Social</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->id }}</td>
                    <td>{{ $empresa->nome }}</td>
                    <td>{{ $empresa->razao }}</td>
                    <td>
                        <a href="{{ route('empresas.show', $empresa->id) }}" class="btn btn-sm btn-primary">Ver</a>
                        <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-sm btn-secondary">Editar</a>
                        <a href="{{ route('empresas.comissao', $empresa->id) }}" class="btn btn-sm btn-secondary">Comissao</a>
                        <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" class="d-inline">
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
