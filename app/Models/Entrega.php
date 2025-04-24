<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;

    protected $fillable = [
        'conteudo_entrega',
        'codigo_pedido',
        'cliente_id',
        'motoboy_id',
        'status_id'
    ];
}
