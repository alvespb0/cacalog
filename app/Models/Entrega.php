<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Status;
use App\Models\Motoboy;
use App\Models\Endereco;

class Entrega extends Model
{
    use HasFactory;

    protected $fillable = [
        'conteudo_entrega',
        'codigo_pedido',
        'endereco_id',
        'motoboy_id',
        'status_id'
    ];

    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function motoboy(){
        return $this->belongsTo(Motoboy::class);
    }
    public function endereco(){
        return $this->belongsTo(Endereco::class);
    }
    
    public function clienteObject(){
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
