<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cliente;

class PlanoDelivery extends Model
{
    use HasFactory;

    protected $table = 'plano_delivery';

    protected $fillable = [
        'nome',
        'descricao',
        'valor_mensal'
    ];

    function clientes(){
        return $this->hasMany(Cliente::class)->withPivot('data_inicio', 'data_fim');
    }
}
