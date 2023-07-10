@extends('layout')

@section('content')
<h1>Detalhes do Vendedor</h1>

<p><strong>ID:</strong> {{ $vendedore->id }}</p>
<p><strong>Nome:</strong> {{ $vendedore->nome }}</p>
<p><strong>Contratos:</strong></p>
<ul>
    <li>{{ $vendedore->contratos }}</li>
</ul>
<p><strong>Comissão:</strong> {{ $vendedore->valor_comissao }}</p>

<a href="{{ route('vendedores.index') }}" class="btn btn-secondary">Voltar</a>
@endsection