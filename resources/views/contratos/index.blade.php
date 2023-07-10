@extends('layout')

@section('content')
    <h1>Contratos</h1>

    <a href="{{ route('contratos.create') }}" class="btn btn-primary mb-3">Novo Contrato</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Valor</th>
                <th>Descrição</th>
                <th>Associado</th>
                <th>Quantidade de Parcelas</th>
                <th>Taxa de Juros Mensal</th>
                <th>Valor da Parcela</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contratos as $contrato)
                <tr>
                    <td>{{ $contrato->id }}</td>
                    <td>{{ $contrato->valor }}</td>
                    <td>{{ $contrato->descricao }}</td>
                    <td>{{ $contrato->associado }}</td>
                    <td>{{ $contrato->quantidade_parcelas }}</td>
                    <td>{{ $contrato->taxa_juros_mensal }}</td>
                    <td>{{ $contrato->valor_parcela }}</td>
                    <td>
                        <a href="{{ route('contratos.show', $contrato->id) }}" class="btn btn-sm btn-primary">Ver</a>
                        <a href="{{ route('contratos.edit', $contrato->id) }}" class="btn btn-sm btn-secondary">Editar</a>
                        <form action="{{ route('contratos.destroy', $contrato->id) }}" method="POST" class="d-inline">
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
