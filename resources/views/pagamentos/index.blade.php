@extends('layout')

@section('content')
    <h1>Pagamentos</h1>

    <a href="{{ route('pagamentos.create') }}" class="btn btn-primary mb-3">Novo Pagamento</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número da Parcela</th>
                <th>ID do Contrato</th>
                <th>Valor da Parcela</th>
                <th>Verificar Pagamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pagamentos as $pagamento)
                <tr>
                    <td>{{ $pagamento->id }}</td>
                    <td>{{ $pagamento->numero_parcela }}</td>
                    <td>{{ $pagamento->contrato }}</td>
                    <td>{{ $pagamento->valor_parcela }}</td>
                    <td>{{ $pagamento->verificar_pagamento ? 'Pago' : 'Em aberto' }}</td>
                    <td>
                        <a href="{{ route('pagamentos.show', $pagamento->id) }}" class="btn btn-sm btn-primary">Ver</a>
                        <a href="{{ route('pagamentos.edit', $pagamento->id) }}" class="btn btn-sm btn-secondary">Editar</a>
                        <form action="{{ route('pagamentos.destroy', $pagamento->id) }}" method="POST" class="d-inline">
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
