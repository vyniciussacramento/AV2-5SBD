<?php

namespace App\Http\Controllers;


use App\Models\Contrato;
use App\Models\Pagamento;
use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function index()
    {
        $vendedores = Vendedor::all();

        return view('vendedores.index', compact('vendedores'));
    }

    public function create()
    {
        $contrato = Contrato::all();
        return view('vendedores.create', ['contratos' => $contrato]);
    }

    public function store(Request $request)
    {
        $vendedor = Vendedor::create([
            'nome' => $request->input('nome'),
            'contratos' => $request->input('contratos'),
            'valor_comissao' => $request->input('comissao'),
        ]);

        return redirect()->route('vendedores.index')->with('success', 'Vendedor criado com sucesso!');
    }

    public function show(Vendedor $vendedore)
    {
        return view('vendedores.show', compact('vendedore'));
    }

    public function edit(Vendedor $vendedore)
    {
        $contrato = Contrato::all();
        return view('vendedores.edit', compact('vendedore'), ['contrato' => $contrato]);
    }

    public function update(Request $request, Vendedor $vendedore)
    {
        $vendedore->update([
            'nome' => $request->input('nome'),
            'contratos' => $request->input('contratos'),
            'valor_comissao' => $request->input('comissao'),
        ]);

        return redirect()->route('vendedores.index')->with('success', 'Vendedor atualizado com sucesso!');
    }

    public function destroy(Vendedor $vendedore)
    {
        $vendedore->delete();

        return redirect()->route('vendedores.index')->with('success', 'Vendedor removido com sucesso!');
    }

    public function calcularComissao($vendedorId) 
    {
        $vendedor = Vendedor::find($vendedorId);
        $contratos = Contrato::where('id', $vendedor->contratos)->get();
        $comissaoTotal = 0;

        foreach ($contratos as $contrato) {
            $pagamentos = Pagamento::where('contrato', $contrato->id)->where('verificar_pagamento', true)->get();

            for ($x = 1;  $x <= $pagamentos->count(); $x++) {
                $comissaoTotal += $vendedor->valor_comissao;
            }
        }

        return view('vendedores.comissao', compact('vendedor', 'comissaoTotal'));
    }
}
