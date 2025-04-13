<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanoDelivery;

class PlanoDeliveryController extends Controller{
    function show(){
        $planoDelivery = PlanoDelivery::all();

        return view('planoDelivery/planoDelivery_show', ['plano_delivery' => $planoDelivery]);
    }

    function cadastrar(){
        return view('planoDelivery.cadastrar');
    }

    function create(Request $request){
        $validateData = $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'valor_mensal' => 'required|double',
        ]);

        $planoDelivery = new PlanoDelivery();

        $planoDelivery = PlanoDelivery::create([
            'nome' => $validateData['nome'],
            'descricao' => $validateData['descricao'],
            'valor_mensal' => $validateData['valor_mensal']
        ]);

        session()->flash('mensagem', 'Plano Delivery cadastrado com sucesso!');

        return redirect()->route('show.planoDelivery');
    }

    function alteracao($id){
        $planoDelivery = PlanoDelivery::findOrFail($id);

        return view('planoDelivery/planoDelivery_edit', ['planoDelivery' => $planoDelivery]);
    }

    function update(Request $request, $id){
        $validateData = $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'valor_mensal' => 'required|numeric' 
        ]);
        
        $planoDelivery = PlanoDelivery::findOrFail($id);

        $planoDelivery->update([
            'nome' => $validateData['nome'],
            'descricao' => $validateData['descricao'],
            'valor_mensal' => $validateData['valor_mensal']
        ]);

        session()->flash('mensagem', 'O plano de delivery {$planoDelivery} foi alterado com sucesso');
        session()->flash('class', 'success');
        return redirect()->route('show.planoDelivery');
    }

    function excluir($id){
        $planoDelivery = PlanoDelivery::findOrFail($id);

        $planoDelivery->delete();

        session()->flash('mensagem', 'O plano delivery {$planoDelivery->nome} foi excluido com sucesso');
        session()->flash('classe', 'success');

        return redirect()->route('show.planoDelivery');
    }
}