<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function index()
    {
        $pagamentos = Pagamento::all();

        return view('pagamentos.index', compact('pagamentos'));
    }

    public function create()
    {
        $contratos= Contrato::all();
        return view('pagamentos.create', ['contratos' => $contratos]);
    }

    public function store(Request $request)
    {
        $pagamento = Pagamento::create([
            'numero_parcela' => $request->input('numero_parcela'),
            'contrato' => $request->input('contrato'),
            'valor_parcela' => $request->input('valor_parcela'),
            'verificar_pagamento' => $request->input('verificar_pagamento'),
        ]);

        return redirect()->route('pagamentos.index')->with('success', 'Pagamento criado com sucesso!');
    }

    public function show(Pagamento $pagamento)
    {
        return view('pagamentos.show', compact('pagamento'));
    }

    public function edit(Pagamento $pagamento)
    {
        $contratos= Contrato::all();
        return view('pagamentos.edit', compact('pagamento'),['contratos' => $contratos]);
    }

    public function update(Request $request, Pagamento $pagamento)
    {
        $pagamento->update([
            'numero_parcela' => $request->input('numero_parcela'),
            'contrato' => $request->input('contrato'),
            'valor_parcela' => $request->input('valor_parcela'),
            'verificar_pagamento' => $request->input('verificar_pagamento'),
        ]);

        return redirect()->route('pagamentos.index')->with('success', 'Pagamento atualizado com sucesso!');
    }

    public function destroy(Pagamento $pagamento)
    {
        $pagamento->delete();

        return redirect()->route('pagamentos.index')->with('success', 'Pagamento removido com sucesso!');
    }
}
