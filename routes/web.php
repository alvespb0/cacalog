<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanoDeliveryController;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\MotoboyController;
use App\Http\Controllers\EstadoController;

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
    return view('template');
});

/** --------------------------------------------- */
/**              Rotas Classe cliente             */
Route::controller(clientesController::class)->group(function(){
    Route::get('/cliente','readCliente')->name('readCliente');

    Route::get('/cliente/cadastroCliente', 'cadastroCliente')->name('cadastro.cliente'); # retorna view de formulario de cadastro de cliente
    Route::post('/cliente/cadastroCliente', 'createCliente')->name('create.cliente'); # faz o cadastro do cliente no banco

    Route::get('/cliente/alteracaoCliente/{id}', 'alteracaoCliente')->name('alteracao.cliente'); # retorna view de formulario de alteração do cliente
    Route::post('/cliente/alteracaoCliente/{id}', 'updateCliente')->name('update.cliente'); # faz a alteração do cliente no banco
    
    Route::get('/cliente/excluir/{id}', 'deleteCliente')->name('delete.cliente'); # faz a exclusão do cliente no banco

});
/** --------------------------------------------- */
/**              Rotas Classe motoboy             */
Route::controller(MotoboyController::class)->group(function(){
    Route::get('/motoboy', 'readMotoboy')->name('readMotoboy'); # retorna todos os motoboys cadastrados

    Route::get('/motoboy/cadastroMotoboy','cadastroMotoboy')->name('cadastro.cliente'); # retorna a view de formulario de cadastro do motoboy 
    Route::post('/motoboy/cadastroMotoboy', 'createMotoboy')->name('create.motoboy'); # faz o cadastro do motoboy no banco

    Route::get('/motoboy/alteracaoMotoboy/{id}','alteracaoMotoboy')->name('alteracao.motoboy'); # retorna view de formulario de alteração do motoboy
    Route::post('/motoboy/alteracaoMotoboy/{id}','updateMotoboy')->name('update.motoboy'); # faz a alteração do motoboy no banco

    Route::get('/motoboy/excluir/{id}','deleteMotoboy')->name('delete.motoboy'); # faz a exclusão do motoboy no banco
});
/** --------------------------------------------- */
/**              Rotas Classe estado              */
Route::controller(EstadoController::class)->group(function(){
    Route::get('/estado', 'readEstado')->name('readEstado'); # retorna todos os estados cadastrados e a página de listagem

    Route::get('/estado/cadastroEstado', 'cadastroEstado')->name('cadastro.estado'); # retorna o formulario de cadastro de estado
    Route::post('/estado/cadastroEstado', 'createEstado')->name('create.estado'); # faz o cadastro do estado no banco

    Route::get('estado/alteracaoEstado/{id}', 'aleracaoEstado')->name('alteracao.estado'); # retorna view de formulario de alteração de estado
    Route::post('estado/alteracaoEstado/{id}', 'updateEstado')->name('update.estado'); # faz a alteração do estado no banco

    Route::get('estado/excluir/{id}', 'deleteEstado')->name('delete.estado'); # faz a exclusão do estado no banco

});
/*--------------------------------------------------- */
/*               Endpoints plano delivery             */
Route::controller(PlanoDeliveryController::class)->group(function() {
    Route::get('/planoDelivery', 'show')->name('show.planoDelivery');

    Route::get('/planoDelivery/cadastrar', 'cadastrar')->name('cadastro.planoDelivery');
    Route::post('/planoDelivery/cadastrar', 'create')->name('create.planoDelivery');

    Route::get('/planoDelivery/alterar/{id}', 'alteracao')->name('alteracao.planoDelivery');
    Route::post('/planoDelivery/alterar/{id}', 'update')->name('update.planoDelivery');

    Route::get('/planoDelivery/excluir/{id}', 'excluir')->name('excluir.planoDelivery');
});