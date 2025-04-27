<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation\HasMany;

use App\Models\Cidade;
use App\Models\Cliente;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade_id',
        'cliente_id'
    ];

    function cidade() {
        return $this->belongsTo(Cidade::class);
    }

    function cliente() {
        return $this->belongsTo(Cliente::class);
    }
}
