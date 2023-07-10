<?php

namespace App\Http\Controllers;

use App\Models\Associado;
use App\Models\Empresa;
use Illuminate\Http\Request;

class AssociadoController extends Controller
{
    public function index()
    {
        $associados = Associado::all();
        return view('associados.index', compact('associados'));
    }

    public function create()
    {
        $empresa = Empresa::all();
        return view('associados.create', ['empresa' => $empresa]);
    }

    public function store(Request $request)
    {
        $associado = Associado::create([
            'nome' => $request->input('nome'),
            'salario' => $request->input('salario'),
            'empresa' => $request->input('empresa'),
            'spc' => false,
        ]);

        return redirect()->route('associados.index')->with('success', 'Associado criado com sucesso!');
    }

    public function show(Associado $associado)
    {
        $empresa = Empresa::findOrFail($associado->id);
        return view('associados.show', compact('associado'), ['empresa' => $empresa]);
    }

    public function edit(Associado $associado)
    {
        $empresa = Empresa::all();
        return view('associados.edit', compact('associado'), ['empresa' => $empresa]);
    }

    public function update(Request $request, Associado $associado)
    {
        $associado->update([
            'nome' => $request->input('nome'),
            'salario' => $request->input('salario'),
            'empresa' => $request->input('empresa'),
            'spc' => $request->input('spc'),
        ]);

        return redirect()->route('associados.index')->with('success', 'Associado atualizado com sucesso!');
    }

    public function destroy(Associado $associado)
    {
        $associado->delete();

        return redirect()->route('associados.index')->with('success', 'Associado removido com sucesso!');
    }
}
