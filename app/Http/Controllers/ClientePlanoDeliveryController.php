<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ClientePlanoDelivery;
use App\Models\PlanoDelivery;

class ClientePlanoDeliveryController extends Controller
{
    public function show() {
        $clientePlanos = ClientePlanoDelivery::all();

        return view('cliente_planoDelivery/cliente_planoDelivery_show', ['clientePlanos' => $clientePlanos]);
    }

    public function cadastrar() {
        $planoDelivery = PlanoDelivery::all();

        return view('cliente_planoDelivery/cliente_planoDelivery_new', ['planoDelivery' => $planoDelivery]);
    }
}