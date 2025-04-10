<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanoDelivery;

class PlanoDeliveryController extends Controller{
    function show(){
        $planoDelivery = PlanoDelivery::all();

        return view('planoDelivery.show', ['plano_delivery' => $planoDelivery]);
    }

    function cadastrar(){
        return view('planoDelivery.cadastrar');
    }

    function create(Request $request){
        // cadastrar plano delivery
    }

    function alteracao(){
        return view('planoDelivery.alterar');
    }

    function update(Request $request){
        //alterar plano delivery
    }

    function excluir($id){
        //deletar plano delivery
    }
}