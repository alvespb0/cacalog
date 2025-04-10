<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanoDeliveryController;

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

/*--------------------------------------------------- */
/* Endpoints plano delivery */
Route::controller(PlanoDeliveryController::class)->group(function() {
    Route::get('/planoDelivery', 'show')->name('show.planoDelivery');

    Route::get('/planoDelivery/cadastrar', 'cadastrar')->name('cadastro.planoDelivery');
    Route::post('/planoDelivery/cadastrar', 'create')->name('create.planoDelivery');

    Route::get('/planoDelivery/alterar', 'alteracao')->name('alteracao.planoDelivery');
    Route::post('/planoDelivery/alterar', 'update')->name('update.planoDelivery');

    Route::get('/planoDelivery/excluir/{id}', 'exlcuir')->name('excluir.planoDelivery');
});