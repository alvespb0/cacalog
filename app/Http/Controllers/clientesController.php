<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Telefone;
use App\Models\User;

class ClientesController extends Controller
{
    public function cadastroCliente(){
        return view('cliente/cliente_new');
    }
    /**
     * Recebe uma um POST request faz a validação dos dados, inicialmente url e token podem ser null e salva no banco
     * @param Request
     * @return redirect
     */
    public function createCliente(Request $request){
        $validatedData = $request->validate([
            "nome" => "required|string",
            "cnpj" => "required|string",
            'email' => "required|email|string",
            'senha' => "required|string",
            "url_callback" => "nullable|string",
            "telefone" => "required|array",
            "telefone.*" => "required|string" 
        ]);

        $user = User::create([
            'name' => $validatedData['nome'],
            'email' => $validatedData['email'],
            'password' => $validatedData['senha'],
            'tipo' => 'cliente'
        ]);

        $token = bin2hex(random_bytes(32));

        $cliente = Cliente::create([
            'name' => $validatedData['nome'],
            'cnpj' => $validatedData['cnpj'],
            'url_callback' => $validatedData['url_callback'],
            'user_id' => $user->id,
            'token_autenticacao' => $token
        ]);
        

        if (is_array($validatedData['telefone'])){
            $telefones = $validatedData['telefone'];
            foreach($telefones as $telefone){
                Telefone::create([
                    'telefone' => $telefone,
                    'descricao' => 'Telefone do cliente: '. $cliente->name,
                    'cliente_id' => $cliente->id,
                    'motoboy_id' => null
                ]);
            }
        }else{
            $telefones = $validatedData['telefone'];
            Telefone::create([
                'telefone' => $telefones,
                'descricao' => 'Telefone do cliente: '. $cliente->name,
                'cliente_id' => $cliente->id,
                'motoboy_id' => null
            ]);
        }

        session()->flash('mensagem', 'Cliente registrado com sucesso');

        return redirect()->route('readCliente');
    }

    /**
     * Retorna todos os clientes cadastrados no bd
     * @return Array
     */
    public function readCliente(){
        $clientes = Cliente::all();
        return view('cliente/cliente_show', ['clientes'=> $clientes]);
    }

    /**
     * recebe um ID valida se o ID é válido via find or fail
     * se for válido retorna o formulario de edição do cliente 
     * @param int $id
     * @return array
     */
    public function alteracaoCliente($id){
        $cliente = Cliente::findOrFail($id);
        return view('cliente/cliente_edit', ['cliente'=> $cliente]);
    }

    /**
     * Recebe uma request faz a validação dos dados e faz o update dado o id
     * @param Request
     * @param int $id
     * @return Redirect
     */
    public function updateCliente(Request $request, $id){
        $validatedData = $request->validate([
            "nome" => "required|string",
            "cnpj" => "required|string",
            'email' => "required|email|string",
            'senha' => "required|string",
            "url_callback" => "nullable|string",
            "telefone" => "required|array",
            "telefone.*" => "required|string|min:1"    
        ]);

        $cliente = Cliente::findOrFail($id);

        $user = $cliente->user;

        $user->update([
            'name' => $validatedData['nome'],
            'email' => $validatedData['email'],
            'password' => $validatedData['senha'],
        ]);

        $cliente->update([
            'name' => $validatedData['nome'],
            'cnpj' => $validatedData['cnpj'],
            'url_callback' => $validatedData['url_callback'],
        ]);

        $cliente->telefone()->delete(); # deleta os telefones antigos para incluir novamente.

        foreach ($validatedData['telefone'] as $tel) {
            $cliente->telefone()->create([
                'telefone' => $tel,
                'descricao' => 'Telefone do cliente: '. $cliente->name,
            ]);
        }

        session()->flash('mensagem', 'Cliente atualizado com sucesso');

        return redirect()->route('readCliente');
    }

    /**
     * recebe o id e deleta o cliente vinculado nesse ID
     * @param int $id
     * @return view
     */
    public function deleteCliente($id){
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        return redirect()->route('readCliente');
    }
}
