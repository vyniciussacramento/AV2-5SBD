<?php

namespace App\Http\Controllers;

use App\Models\Bem;
use Illuminate\Http\Request;

class BemController extends Controller
{
    public function index()
    {
        $bens = Bem::all();

        return view('bens.index', compact('bens'));
    }

    public function create()
    {
        return view('bens.create');
    }

    public function store(Request $request)
    {
        $bem = Bem::create([
            'nome' => $request->input('nome'),
            'valor' => $request->input('valor'),
            'contrato' => $request->input('contrato'),
            'descricao' => $request->input('descricao'),
        ]);

        return redirect()->route('bens.index')->with('success', 'Bem criado com sucesso!');
    }

    public function show(Bem $bem)
    {
        return view('bens.show', compact('bem'));
    }

    public function edit(Bem $bem)
    {
        return view('bens.edit', compact('bem'));
    }

    public function update(Request $request, Bem $bem)
    {
        $bem->update([
            'nome' => $request->input('nome'),
            'valor' => $request->input('valor'),
            'contrato' => $request->input('contrato'),
            'descricao' => $request->input('descricao'),
        ]);

        return redirect()->route('bens.index')->with('success', 'Bem atualizado com sucesso!');
    }

    public function destroy(Bem $bem)
    {
        $bem->delete();

        return redirect()->route('bens.index')->with('success', 'Bem removido com sucesso!');
    }
}
