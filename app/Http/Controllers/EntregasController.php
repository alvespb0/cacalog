<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Entrega;
use App\Models\Endereco;
use App\Models\Status;
use App\Models\Motoboy;
use App\Models\Cliente;

class EntregasController extends Controller
{
    /**
     * Recebe um cliente e retorna os endereços correspondentes à aquele cliente numa session flash
     */
    public function vinculaClienteEntrega(){
        $clientes = Cliente::all();
        return view('entrega/vincula_cliente', ['clientes' => $clientes]);
    }
    /**
     * retorna a página de cadastro de Entrega
     */
    public function cadastroEntrega(Request $request){
        $cliente = Cliente::where('id', $request->cliente)->first();

        $enderecos =  $cliente->endereco;

        $motoboys = Motoboy::all();
        $status = Status::all();
        
        return view('entrega/entrega_new', ['motoboys' => $motoboys, 'status' => $status, 'cliente' => $cliente, 'enderecos' => $enderecos]);
    }

    /**
     * recebe uma request POST faz a validação de dados e faz o cadastro no banco
     * @param Request
     * @return redirect
     */
    public function createEntrega(Request $request){
        $validatedData = $request->validate([
            'conteudo_entrega' => 'required|string',
            'codigo_pedido' => 'required|integer',
            'endereco_id' => 'required|integer',
            'motoboy_id' => 'required|integer',
            'status_id' => 'required|integer'
        ]);

        Entrega::create([
            'conteudo_entrega' => $validatedData['conteudo_entrega'],
            'codigo_pedido' => $validatedData['codigo_pedido'],
            'endereco_id' => $validatedData['endereco_id'],
            'motoboy_id' => $validatedData['motoboy_id'],
            'status_id' => $validatedData['status_id']
        ]);

        session()->flash('mensagem', 'Entrega registrada com sucesso');

        return redirect()->route('readEntrega');
    }

    /**
     * retorna todos as entregas cadastrados no bd e redireciona a página de listagem
     * @return Array
     */
    public function readEntrega(){
        $entregas = Entrega::all();
        return view('entrega/entrega_show', ['entregas' => $entregas]);
    }

    /**
     * recebe um ID valida se o ID é válido via find or fail
     * se for válido retorna o formulario de edição da entrega
     * @param int $id
     * @return Array
     */
    public function aleracaoEntrega($id){
        $entrega = Entrega::findOrFail($id);

        $endereco = Endereco::findOrFail($entrega->endereco_id);

        $cliente = $endereco->cliente;

        $enderecosCliente = $cliente->endereco;

        $motoboys = Motoboy::all();
        $status = Status::all();

        return view('entrega/entrega_edit',['entrega' => $entrega, 'motoboys' => $motoboys, 'status' => $status, 'cliente' => $cliente, 'enderecos' => $enderecosCliente]);
    }

    /**
     * recebe uma request faz a validação de dados e faz o update dado o id
     * @param Request
     * @param int $id
     * @return Redirect
     */
    public function updateEntrega(Request $request, $id){
        $validatedData = $request->validate([
            'conteudo_entrega' => 'required|string',
            'codigo_pedido' => 'required|integer',
            'endereco_id' => 'required|integer',
            'motoboy_id' => 'required|integer',
            'status_id' => 'required|integer'
        ]);

        $entrega = Entrega::findOrFail($id);

        $entrega->update([
            'conteudo_entrega' => $validatedData['conteudo_entrega'],
            'codigo_pedido' => $validatedData['codigo_pedido'],
            'endereco_id' => $validatedData['endereco_id'],
            'motoboy_id' => $validatedData['motoboy_id'],
            'status_id' => $validatedData['status_id']
        ]);

        session()->flash('mensagem', 'Entrega alterado com sucesso');

        return redirect()->route('readEntrega');
    }

    /**
     * recebe o id e deleta a entrega vinculado nesse ID
     * @param int $id
     * @return view
     */
    public function deleteEntrega($id){
        $entrega = Entrega::findOrFail($id);
        $entrega->delete();
        session()->flash('mensagem','Entrega deletado com sucesso!');
        return redirect()->route('readEntrega');
    }

}
