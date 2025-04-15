<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motoboy;

class MotoboyController extends Controller
{   
    /**
     * Retorna a página de cadastro de motoboy
     */
    public function cadastroMotoboy(){
        return view('motoboy/motoboy-new');
    }

    /**
     * Recebe uma request POST faz a validação de dados e faz o cadastro no banco
     * @param Request
     * @return redirect
     */
    public function createMotoboy(Request $request){
        $validatedData = $request->validate([
            'name'=> 'required|string',
            'cpf'=> 'required|string',
        ]);

        Motoboy::create([
            'name'=> $validatedData['name'],
            'cpf'=> $validatedData['cpf'],
        ]);

        session()->flash('mensagem', 'Motoboy registrado com sucesso');

        return redirect()->route('readMotoboy');
    }

    /**
     * Retorna todos os motoboys cadastrados no bd e redireciona a página de listagem
     * @return Array
     */
    public function readMotoboy(){
        $motoboys = Motoboy::all();
        return view('motoboy/motoboy_show', ['motoboys'=> $motoboys]);
    }

    /**
     * recebe um ID valida se o ID é válido via find or fail
     * se for válido retorna o formulario de edição do motoboy  
     * @param int $id
     * @return array
     */
    public function alteracaoMotoboy($id){
        $motoboy = Motoboy::findOrFail($id);
        return view('motoboy/motoboy_edit', ['motoboy'=> $motoboy]);
    }

    /**
     * Recebe uma request faz a validação dos dados e faz o update dado o id
     * @param Request
     * @param int $id
     * @return Redirect
     */
    public function updateMotoboy(Request $request, $id){
        $validatedData = $request->validate([
            "name" => "required|string",
            "cpf" => "required|string",
        ]);

        $motoboy = motoboy::findOrFail($id);
        
        $motoboy->update([
            'name' => $validatedData['name'],
            'cpf' => $validatedData['cpf'],
        ]);

        session()->flash('mensagem', 'motoboy atualizado com sucesso');

        return redirect()->route('readMotoboy');
    }

    /**
     * recebe o id e deleta o motoboy vinculado nesse ID
     * @param int $id
     * @return view
     */
    public function deleteMotoboy($id){
        $motoboy = Motoboy::findOrFail($id);
        $motoboy->delete();
        session()->flash('mensagem','Cliente deletado com sucesso!');
        return redirect()->route('readMotoboy');
    }

}
