@extends('layout')

@section('content')
    <h1>Vendedores</h1>

    <a href="{{ route('vendedores.create') }}" class="btn btn-primary mb-3">Novo Vendedor</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendedores as $vendedor)
                <tr>
                    <td>{{ $vendedor->id }}</td>
                    <td>{{ $vendedor->nome }}</td>
                    <td>
                        <a href="{{ route('vendedores.show', $vendedor->id) }}" class="btn btn-sm btn-primary">Ver</a>
                        <a href="{{ route('vendedores.edit', $vendedor->id) }}" class="btn btn-sm btn-secondary">Editar</a>
                        <a href="{{ route('vendedores.comissao', $vendedor->id) }}" class="btn btn-sm btn-secondary">Comissao</a>
                        <form action="{{ route('vendedores.destroy', $vendedor->id) }}" method="POST" class="d-inline">
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
