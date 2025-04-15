<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanoDeliveryController;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\ClientePlanoDeliveryController;

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
    
    Route::get('/cliente/excluir/{id}', 'deleteCliente')->name('delete.cliente'); # faz a alteração do cliente no banco

});

/*--------------------------------------------------- */
/* Endpoints plano delivery */
Route::controller(PlanoDeliveryController::class)->group(function() {
    Route::get('/planoDelivery', 'show')->name('show.planoDelivery');

    Route::get('/planoDelivery/cadastrar', 'cadastrar')->name('cadastro.planoDelivery');
    Route::post('/planoDelivery/cadastrar', 'create')->name('create.planoDelivery');

    Route::get('/planoDelivery/alterar/{id}', 'alteracao')->name('alteracao.planoDelivery');
    Route::post('/planoDelivery/alterar/{id}', 'update')->name('update.planoDelivery');

    Route::get('/planoDelivery/excluir/{id}', 'excluir')->name('excluir.planoDelivery');
});

/*------------------------------------------------------- */
/* Endpoints cliente plano delivery */
Route::controller(ClientePlanoDeliveryController::class)->group(function() {
    Route::get('/cliente-planoDelivery', 'show')->name('show.cliente-plano-delivery');

    Route::get('/cliente-planoDelivery/cadastrar', 'cadastrar')->name('cadastro.cliente-planoDelivery');
    Route::post('/cliente-planoDelivery/cadastrar', 'create')->name('create.cliente-planoDelivery');

    Route::get('/cliente-planoDelivery/alterar/{id}', 'alteracao')->name('alteracao.cliente-planoDelivery');
    Route::post('/cliente-planoDelivery/alterar/{id}', 'update')->name('update.cliente-planoDelivery');

    Route::get('/cliente-planoDelivery/excluir/{id}', 'excluir')->name('excluir.cliente-planoDelivery');
});