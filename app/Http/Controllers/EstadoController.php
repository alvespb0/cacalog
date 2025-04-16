<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;

class EstadoController extends Controller
{
    /**
     * retorna a página de cadastro de estado
     */
    public function cadastroEstado(){
        return view('estado/estado_new');
    }

    /**
     * recebe uma request POST faz a validação de dados e faz o cadastro no banco
     * @param Request
     * @return redirect
     */
    public function createEstado(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string'
        ]);

        Estado::create([
            'name' => $validatedData['name']
        ]);

        session()->flash('mensagem', 'Estado registrado com sucesso');

        return redirect()->route('readEstado');
    }

    /**
     * retorna todos os estados cadastrados no bd e redireciona a págian de listagem
     * @return Array
     */
    public function readEstado(){
        $estados = Estado::all();
        return view('estado/estado_show', ['estados' => $estados]);
    }

    /**
     * recebe um ID valida se o ID é válido via find or fail
     * se for válido retorna o formulario de edição do estado
     * @param int $id
     * @return Array
     */
    public function aleracaoEstado($id){
        $estado = Estado::findOrFail($id);
        return view('estado/estado_edit',['estado' => $estado]);
    }

    /**
     * recebe uma request faz a validação de dados e faz o update dado o id
     * @param Request
     * @param int $id
     * @return Redirect
     */
    public function updateEstado(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|string'
        ]);

        $estado = Estado::findOrFail($id);

        $estado->update([
            'name' => $validatedData['name']
        ]);

        session()->flash('mensagem', 'Estado alterado com sucesso');

        return redirect()->route('readEstado');
    }

    /**
     * recebe o id e deleta o Estado vinculado nesse ID
     * @param int $id
     * @return view
     */
    public function deleteEstado($id){
        $estado = Estado::findOrFail($id);
        $estado->delete();
        session()->flash('mensagem','Estado deletado com sucesso!');
        return redirect()->route('readEstado');
    }
}
