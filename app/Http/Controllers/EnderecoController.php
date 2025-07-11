<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Endereco;
use App\Models\Cidade;
use App\Models\Cliente;

class EnderecoController extends Controller
{
    function show() {
        $enderecos = Endereco::all();

        return view('endereco/endereco_show', ['enderecos' => $enderecos]);
    }

    function cadastrar(){
        $cidades = Cidade::all();
        $clientes = Cliente::all();

        return view('endereco/endereco_new', ['cidades' => $cidades, 'clientes' => $clientes]);
    }

    function create(Request $request) {
        $validatedData = $request->validate([
            "logradouro" => "required|string",
            "numero" => "required|integer",
            "complemento" => "required|string",
            "bairro" => "required|string",
            "cidade_id" => "required|integer",
            "cliente_id" => "required|integer"
        ]);

        $endereco = Endereco::create([
            'logradouro' => $validatedData['logradouro'],
            'numero' => $validatedData['numero'],
            'complemento' => $validatedData['complemento'],
            'bairro' => $validatedData['bairro'],
            'cidade_id' => $validatedData['cidade_id'],
            'cliente_id' => $validatedData['cliente_id']
        ]);

        session()->flash('mensagem', 'Endereço cadastrado com sucesso.');

        return redirect(route('show.endereco'));
    }

    function alteracao($id) {
        $endereco = Endereco::findOrFail($id);
        $cidades = Cidade::all();
        $clientes = Cliente::all();

        return view('endereco/endereco_edit', ['endereco' => $endereco, 'cidades' => $cidades, 'clientes' => $clientes]);
    }

    function update(Request $request, $id){
        $validatedData = $request->validate([
            "logradouro" => "required|string",
            "numero" => "required|integer",
            "complemento" => "required|string",
            "bairro" => "required|string",
            "cidade_id" => "required|integer",
            "cliente_id" => "required|integer"
        ]);

        $endereco = Endereco::findOrFail($id);

        $endereco->update([
            'logradouro' => $validatedData['logradouro'],
            'numero' => $validatedData['numero'],
            'complemento' => $validatedData['complemento'],
            'bairro' => $validatedData['bairro'],
            'cidade_id' => $validatedData['cidade_id'],
            'cliente_id' => $validatedData['cliente_id']
        ]);

        session()->flash('mensagem', 'Endereço alterado com sucesso');

        return redirect(route('show.endereco'));
    }

    function excluir($id) {
        $endereco = Endereco::findOrFail($id);

        $endereco->delete();

        session()->flash('mensagem', 'Endereço excluido com sucesso');

        return redirect(route('show.endereco'));
    }
}