<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEntregaRequest;

use App\Models\Entrega;

class EntregasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Entrega::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEntregaRequest $request)
    {
        $request->validated();

        $codigoPedido = rand(1000, 9999);

        $entrega = new Entrega;
        $entrega->codigo_pedido = $codigoPedido;
        $entrega->cliente = $request->cliente;
        $entrega->cep = $request->cep;
        $entrega->conteudo_entrega = $request->conteudo_entrega;
        $entrega->endereco = $request->endereco;

        $entrega->save();

        return $entrega;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Entrega::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEntregaRequest $request, string $id)
    {
        $request->validated();
        $entrega = Entrega::findOrFail($id);
        $entrega->cliente = $request->cliente;
        $entrega->cep = $request->cep;
        $entrega->conteudo_entrega = $request->conteudo_entrega;
        $entrega->endereco = $request->endereco;

        $entrega->save();
        return $entrega;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $entrega = Entrega::findOrFail($id);
        $entrega->delete();

        return response()
            ->json(["mensagem"=>"Entrega excluída"], 200);

    }
}
