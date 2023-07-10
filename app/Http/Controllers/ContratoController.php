<?php

namespace App\Http\Controllers;

use App\Models\Associado;
use App\Models\Pagamento;
use App\Models\Contrato;
use Illuminate\Http\Request;
use App\Models\Bem;

class ContratoController extends Controller
{
    public function index()
    {
        $contratos = Contrato::all();
        return view('contratos.index', compact('contratos'));
    }

    public function create()
    {
        $associado = Associado::all();
        return view('contratos.create', ['associado' => $associado]); //Retorna uma view com formulário para criação do contrato
    }

    public function store(Request $request)
    {
        $associadoId = $request->input('associado');
        $salario = Associado::select('salario')->where('id', $associadoId)->first();
        $total = Contrato::where('associado', $associadoId)->sum('valor_parcela');

        $valorTotalContrato = $request->input('valor');
        $quantidadeParcelas = $request->input('quantidade_parcelas');
        $taxadeJuros = $request->input('taxa_juros_mensal');
        $valorParcela = $this->calcularParcela($valorTotalContrato, $quantidadeParcelas, $taxadeJuros);


        $novoEndividamento = $total + ($valorParcela);
        $limiteSalario = $salario->salario * 0.3;

        if ($novoEndividamento > $limiteSalario) {
            return redirect()->route('contratos.index')->with('Error', 'Margem de endividamento atingida!');
        }


        $contrato = Contrato::create([
            'valor' => $valorTotalContrato,
            'descricao' => $request->input('descricao'),
            'associado' => $request->input('associado'),
            'quantidade_parcelas' => $quantidadeParcelas,
            'taxa_juros_mensal' => $taxadeJuros,
            'valor_parcela' => $valorParcela,
        ]);

        for ($numeroParcela = 1; $numeroParcela <= $quantidadeParcelas; $numeroParcela++) {
            $pagamento = new Pagamento([
                'numero_parcela' => $numeroParcela,
                'contrato' => $contrato->id,
                'valor_parcela' => $valorParcela,
                'verificar_pagamento' => false,
            ]);

            $pagamento->save();
        }

        $bem = Bem::create([
            'nome' => $request->input('nome_bem'),
            'valor' => $valorTotalContrato,
            'contrato' => $contrato->id,
            'descricao' => $request->input('descricao_bem'),
        ]);

        return redirect()->route('contratos.index')->with('success', 'Contrato criado com sucesso!');
    }

    public function show(Contrato $contrato)
    {
        return view('contratos.show', compact('contrato'));
    }

    public function edit(Contrato $contrato)
    {
        $associado = Associado::all();
        return view('contratos.edit', compact('contrato'), ['associado' => $associado]); //Retorna uma view com formulário para atualização dos dados utilizando a função update
    }

    public function update(Request $request, Contrato $contrato)
    {
        $valorTotalContrato = $request->input('valor');
        $quantidadeParcelas = $request->input('quantidade_parcelas');
        $taxadeJuros = $request->input('taxa_juros_mensal');
        $valorParcela = $this->calcularParcela($valorTotalContrato, $quantidadeParcelas, $taxadeJuros);

        $contrato->update([
            'valor' => $request->input('valor'),
            'descricao' => $request->input('descricao'),
            'associado' => $request->input('associado'),
            'quantidade_parcelas' => $request->input('quantidade_parcelas'),
            'taxa_juros_mensal' => $request->input('taxa_juros_mensal'),
            'valor_parcela' => $valorParcela,
        ]);

        return redirect()->route('contratos.index')->with('success', 'Contrato atualizado com sucesso!');
    }

    public function destroy(Contrato $contrato)
    {
        $contrato->delete();

        return redirect()->route('contratos.index')->with('success', 'Contrato removido com sucesso!');
    }

    public function contratosPorAssociado($associadoId)
    {
        $contratos = Contrato::where('associado', $associadoId)->get();
        return view('contratos.associado', compact('contratos')); //Retorna uma view da listagem de contratos de determinado usuário 
    }

    public function calcularParcela($valorTotal, $quantidadeParcelas, $taxaJurosMensal)
    {
        $taxaJurosDecimal = $taxaJurosMensal / 100;
        $valorParcela = $valorTotal * ($taxaJurosDecimal / (1 - (1 + $taxaJurosDecimal) ** (-$quantidadeParcelas)));

        return round($valorParcela, 2);
    }
}
