<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ClientePlanoDelivery;
use App\Models\PlanoDelivery;
use App\Models\Cliente;

class ClientePlanoDeliveryController extends Controller
{
    public function show() {
        $clientePlanos = ClientePlanoDelivery::all();

        return view('cliente_planoDelivery/cliente_planoDelivery_show', ['clientePlanos' => $clientePlanos]);
    }

    public function cadastrar() {
        $planoDelivery = PlanoDelivery::all();
        $clientes = Cliente::all();

        return view('cliente_planoDelivery/cliente_planoDelivery_new', 
            ['planoDelivery' => $planoDelivery, "clientes" => $clientes]);
    }

    public function create(Request $request){
        $plano = new ClientePlanoDelivery;

        $plano->cliente_id = $request->cliente;
        $plano->plano_delivery_id = $request->planoDelivery;
        $plano->data_inicio = $request->dataInicio;
        $plano->data_fim = $request->dataFim;

        $plano->save();

        return redirect(route('show.cliente-planoDelivery'));
    }

    public function alteracao($id){
        $plano = ClientePlanoDelivery::findOrFail($id);
        $planoDelivery = PlanoDelivery::all();
        $clientes = Cliente::all();

        return view('cliente_planoDelivery/cliente_planoDelivery_edit', ['plano' => $plano, 'planoDelivery' => $planoDelivery, 'clientes' => $clientes]);
    }

    public function update(Request $request, $id){
        $plano = ClientePlanoDelivery::findOrFail($id);

        $plano->cliente_id = $request->cliente;
        $plano->plano_delivery_id = $request->planoDelivery;
        $plano->data_inicio = $request->dataInicio;
        $plano->data_fim = $request->dataFim;

        $plano->save();

        return redirect(route('show.cliente-planoDelivery'));
    }

    public function excluir($id){
        $plano = ClientePlanoDelivery::findOrFail($id);

        $plano->delete();

        return redirect(route('show.cliente-planoDelivery'));
    }
}