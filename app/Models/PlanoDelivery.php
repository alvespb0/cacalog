<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoDelivery extends Model
{
    use HasFactory;

    protected $table = 'plano_delivery';

    protected $fillable = [
        'nome',
        'descricao',
        'valor_mensal'
    ];
}
