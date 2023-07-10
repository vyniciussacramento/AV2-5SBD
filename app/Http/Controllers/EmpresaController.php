<?php

namespace App\Http\Controllers;

use App\Models\Associado;
use App\Models\Contrato;
use App\Models\Pagamento;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();

        return view('empresas.index', compact('empresas'));
    }

    public function create()
    {
        return view('empresas.create');
    }

    public function store(Request $request)
    {
        $empresa = Empresa::create([
            'nome' => $request->input('nome'),
            'razao' => $request->input('razao'),
            'comissao' => $request->input('comissao'),
        ]);

        return redirect()->route('empresas.index')->with('success', 'Empresa criada com sucesso!');
    }

    public function show(Empresa $empresa)
    {
        return view('empresas.show', compact('empresa'));
    }

    public function edit(Empresa $empresa)
    {
        return view('empresas.edit', compact('empresa'));
    }

    public function update(Request $request, Empresa $empresa)
    {
        $empresa->update([
            'nome' => $request->input('nome'),
            'razao' => $request->input('razao'),
            'comissao' =>$request->input('comissao'),
        ]);

        return redirect()->route('empresas.index')->with('success', 'Empresa atualizada com sucesso!');
    }

    public function destroy(Empresa $empresa)
    {
        $empresa->delete();

        return redirect()->route('empresas.index')->with('success', 'Empresa removida com sucesso!');
    }

    public function calcularComissao($empresaId)
    {
        $empresa = Empresa::find($empresaId);

        // Verifica se a empresa existe
        if (!$empresa) {
            return redirect()->route('empresas.index')->with('error', 'Empresa não encontrada.');
        }

        $associados = Associado::where('empresa', $empresaId)->get();
        $comissaoTotal = 0;

        foreach ($associados as $associado) {
            $contratos = Contrato::where('associado', $associado->id)->get();

            foreach ($contratos as $contrato) {
                $pagamentos = Pagamento::where('contrato', $contrato->id)->where('verificar_pagamento', true)->get();
                for ($x = 1; $x <= $pagamentos->count(); $x++ ) {
                    $comissaoTotal += $empresa->comissao;
                }
            }
        }

        return view('empresas.comissao', compact('empresa', 'comissaoTotal'));
    }

}
