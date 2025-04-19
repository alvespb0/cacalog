<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cidade;
use App\Models\Estado;

class CidadeController extends Controller
{
    public function show(){
        $cidades = Cidade::all();

        return view('cidade/cidade_show', ['cidades' => $cidades]);
    }

    public function cadastrar(){
        $estados = Estado::all();

        return view('cidade/cidade_new', ['estados' => $estados]);
    }

    public function create(Request $request){
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'cep' => 'required|string',
            'estado_id' => 'required|integer'
        ]);

        Cidade::create([
            'nome' => $validatedData['nome'],
            'cep' => $validatedData['cep'],
            'estado_id' => $validatedData['estado_id']
        ]);

        session()->flash('mensagem', 'Cidade registrada com sucesso!');

        return redirect(route('show.cidade'));
    }

    public function alteracao($id){
        $cidade = Cidade::findOrFail($id);
        $estados = Estados::all();

        return redirect('cidade/cidade_edit', ['cidade' => $cidade, 'estados' => $estados]);
    }

    public function update(Request $request, $id){
        $cidade = Cidade::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|string',
            'cep' => 'required|string',
            'estado_id' => 'required|integer'
        ]);

        $cidade->update([
            'nome' => $validatedData['nome'],
            'cep' => $validatedData['cep'],
            'estado_id' => $validatedData['estado_id']
        ]);

        session()->flash('mensagem', 'Cidade alterada com sucesso!');

        return redirect(route('show.cidade'));
    }

    public function excluir($id){
        $cidade = Cidade::findOrFail($id);

        $cidade->delete();
        
        session()->flash('mensagem', 'Cidade deletada com sucesso!');

        return redirect(route('show.cidade'));
    }
}
