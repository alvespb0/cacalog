<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation\HasMany;


class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade_id'
    ];

    function cidade() {
        return $this->belongsTo(Cidade::class);
    }
}
