<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    /**
     * retorna a página de cadastro de status
     */
    public function cadastroStatus(){
        return view('status/status_new');
    }

    /**
     * recebe uma request POST faz a validação de dados e faz o cadastro no banco
     * @param Request
     * @return redirect
     */
    public function createStatus(Request $request){
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'cor' => 'required|string'
        ]);

        Status::create([
            'nome' => $validatedData['nome'],
            'cor' => $validatedData['cor']
        ]);

        session()->flash('mensagem', 'Status registrado com sucesso');

        return redirect()->route('readStatus');
    }

    /**
     * retorna todos os status cadastrados no bd e redireciona a página de listagem
     * @return Array
     */
    public function readStatus(){
        $status = Status::all();
        return view('status/status_show', ['status' => $status]);
    }

    /**
     * recebe um ID valida se o ID é válido via find or fail
     * se for válido retorna o formulario de edição do status
     * @param int $id
     * @return Array
     */
    public function aleracaoStatus($id){
        $status = Status::findOrFail($id);
        return view('status/status_edit',['status' => $status]);
    }

    /**
     * recebe uma request faz a validação de dados e faz o update dado o id
     * @param Request
     * @param int $id
     * @return Redirect
     */
    public function updateStatus(Request $request, $id){
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'cor' => 'required|string'
        ]);

        $status = Status::findOrFail($id);

        $status->update([
            'nome' => $validatedData['nome'],
            'cor' => $validatedData['cor']
        ]);

        session()->flash('mensagem', 'Status alterado com sucesso');

        return redirect()->route('readStatus');
    }

    /**
     * recebe o id e deleta o Status vinculado nesse ID
     * @param int $id
     * @return view
     */
    public function deleteStatus($id){
        $status = Status::findOrFail($id);
        $status->delete();
        session()->flash('mensagem','status deletado com sucesso!');
        return redirect()->route('readStatus');
    }

}
