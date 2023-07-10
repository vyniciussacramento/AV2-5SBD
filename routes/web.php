<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociadoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\VendedorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rotas para Associado
Route::resource('associados', AssociadoController::class);

// Rotas para Contrato
Route::resource('contratos', ContratoController::class);

// Rotas para Vendedor
Route::resource('vendedores', VendedorController::class);

// Rotas para Empresa
Route::resource('empresas', EmpresaController::class);

// Rotas para Pagamento
Route::resource('pagamentos', PagamentoController::class);

// Rota para exibir os pagamentos de todos os associados de uma determinada empresa
Route::get('/pagamentos/empresa/{empresaId}', [PagamentoController::class, 'pagamentosPorEmpresa'])->name('pagamentos.empresa');

// Rota para calcular a comissão de um vendedor
Route::get('/vendedores/{vendedorId}/calcular-comissao', [VendedorController::class, 'calcularComissao'])->name('vendedores.comissao');

// Rota para editar o vendedor de um contrato
Route::put('/contratos/{contratoId}/editar-vendedor/{novoVendedorId}', [VendedorController::class, 'editarVendedor'])->name('contratos.editar-vendedor');

//Rota para calcular a comissao da empresa
Route::get('/empresas/{empresaId}/calcular-comissao', [EmpresaController::class, 'calcularComissao'])->name('empresas.comissao');

