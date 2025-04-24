<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanoDeliveryController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ClientePlanoDeliveryController;
use App\Http\Controllers\MotoboyController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\EnderecoController;

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
/**                Rotas Classe auth              */
Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'tryLogin')->name('try.login');
    Route::get('/logout', 'logout')->name('logout');
});

/** --------------------------------------------- */
/**              Rotas Classe cliente             */
Route::middleware(['auth', 'tipo:cliente,operador'])->controller(ClientesController::class)->group(function(){
    Route::get('/cliente','readCliente')->name('readCliente');

    Route::get('/cliente/cadastroCliente', 'cadastroCliente')->name('cadastro.cliente'); # retorna view de formulario de cadastro de cliente
    Route::post('/cliente/cadastroCliente', 'createCliente')->name('create.cliente'); # faz o cadastro do cliente no banco

    Route::get('/cliente/alteracaoCliente/{id}', 'alteracaoCliente')->name('alteracao.cliente'); # retorna view de formulario de alteração do cliente
    Route::post('/cliente/alteracaoCliente/{id}', 'updateCliente')->name('update.cliente'); # faz a alteração do cliente no banco
    
    Route::get('/cliente/excluir/{id}', 'deleteCliente')->name('delete.cliente'); # faz a exclusão do cliente no banco

});
/** --------------------------------------------- */
/**              Rotas Classe motoboy             */
Route::middleware(['auth', 'tipo:operador'])->controller(MotoboyController::class)->group(function(){
    Route::get('/motoboy', 'readMotoboy')->name('readMotoboy'); # retorna todos os motoboys cadastrados

    Route::get('/motoboy/cadastroMotoboy','cadastroMotoboy')->name('cadastro.cliente'); # retorna a view de formulario de cadastro do motoboy 
    Route::post('/motoboy/cadastroMotoboy', 'createMotoboy')->name('create.motoboy'); # faz o cadastro do motoboy no banco

    Route::get('/motoboy/alteracaoMotoboy/{id}','alteracaoMotoboy')->name('alteracao.motoboy'); # retorna view de formulario de alteração do motoboy
    Route::post('/motoboy/alteracaoMotoboy/{id}','updateMotoboy')->name('update.motoboy'); # faz a alteração do motoboy no banco

    Route::get('/motoboy/excluir/{id}','deleteMotoboy')->name('delete.motoboy'); # faz a exclusão do motoboy no banco
});

/** --------------------------------------------- */
/**              Rotas Classe estado              */
Route::middleware(['auth', 'tipo:operador'])->controller(EstadoController::class)->group(function(){
    Route::get('/estado', 'readEstado')->name('readEstado'); # retorna todos os estados cadastrados e a página de listagem

    Route::get('/estado/cadastroEstado', 'cadastroEstado')->name('cadastro.estado'); # retorna o formulario de cadastro de estado
    Route::post('/estado/cadastroEstado', 'createEstado')->name('create.estado'); # faz o cadastro do estado no banco

    Route::get('estado/alteracaoEstado/{id}', 'aleracaoEstado')->name('alteracao.estado'); # retorna view de formulario de alteração de estado
    Route::post('estado/alteracaoEstado/{id}', 'updateEstado')->name('update.estado'); # faz a alteração do estado no banco

    Route::get('estado/excluir/{id}', 'deleteEstado')->name('delete.estado'); # faz a exclusão do estado no banco

});
/*--------------------------------------------------- */
/*               Endpoints plano delivery             */
Route::middleware(['auth', 'tipo:operador'])->controller(PlanoDeliveryController::class)->group(function() {
    Route::get('/planoDelivery', 'show')->name('show.planoDelivery');

    Route::get('/planoDelivery/cadastrar', 'cadastrar')->name('cadastro.planoDelivery');
    Route::post('/planoDelivery/cadastrar', 'create')->name('create.planoDelivery');

    Route::get('/planoDelivery/alterar/{id}', 'alteracao')->name('alteracao.planoDelivery');
    Route::post('/planoDelivery/alterar/{id}', 'update')->name('update.planoDelivery');

    Route::get('/planoDelivery/excluir/{id}', 'excluir')->name('excluir.planoDelivery');
});

/*------------------------------------------------------- */
/* Endpoints cliente plano delivery */
Route::middleware(['auth', 'tipo:operador'])->controller(ClientePlanoDeliveryController::class)->group(function() {
    Route::get('/cliente-planoDelivery', 'show')->name('show.cliente-planoDelivery');

    Route::get('/cliente-planoDelivery/cadastrar', 'cadastrar')->name('cadastro.cliente-planoDelivery');
    Route::post('/cliente-planoDelivery/cadastrar', 'create')->name('create.cliente-planoDelivery');

    Route::get('/cliente-planoDelivery/alterar/{id}', 'alteracao')->name('alteracao.cliente-planoDelivery');
    Route::post('/cliente-planoDelivery/alterar/{id}', 'update')->name('update.cliente-planoDelivery');

    Route::get('/cliente-planoDelivery/excluir/{id}', 'excluir')->name('excluir.cliente-planoDelivery');
});

/*------------------------------------------------------- */
/* Endpoints cidade */
Route::middleware(['auth', 'tipo:operador'])->controller(CidadeController::class)->group(function(){
    Route::get('/cidade', 'show')->name('show.cidade');

    Route::get('/cidade/cadastrar', 'cadastrar')->name('cadastro.cidade');
    Route::post('/cidade/cadastrar', 'create')->name('create.cidade');

    Route::get('/cidade/alterar/{id}', 'alteracao')->name('alteracao.cidade');
    Route::post('/cidade/alterar/{id}', 'update')->name('update.cidade');

    Route::get('/cidade/excluir/{id}', 'excluir')->name('excluir.cidade');
});

/*------------------------------------------------------- */
/* Endpoints Status */
Route::controller(StatusController::class)->group(function(){
    Route::get('/status', 'readStatus')->name('readStatus');

    Route::get('/status/cadastrar', 'cadastroStatus')->name('cadastro.status');
    Route::post('/status/cadastrar', 'createStatus')->name('create.status');

    Route::get('/status/alterar/{id}', 'aleracaoStatus')->name('alteracao.status');
    Route::post('/status/alterar/{id}', 'updateStatus')->name('update.status');

    Route::get('/status/excluir/{id}', 'deleteStatus')->name('delete.status');
});

/*------------------------------------------------------ */
/* Endpoints Endereco */
Route::controller(EnderecoController::class)->group(function() {
    Route::get('/endereco', 'show')->name('show.endereco');

    Route::get('/endereco/cadastrar', 'cadastrar')->name('cadastro.endereco');
    Route::post('/endereco/cadastrar', 'create')->name('create.endereco');

    Route::get('/endereco/alterar/{id}', 'alteracao')->name('alteracao.endereco');
    Route::post('/endereco/alterar/{id}', 'update')->name('update.endereco');

    Route::geT('/endereco/excluir/{id}', 'excluir')->name('excluir.endereco');
});