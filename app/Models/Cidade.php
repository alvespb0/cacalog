<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Estado;
use App\Models\Endereco;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cep',
        'estado_id'
    ];

    function estado(){
        return $this->belongsTo(Estado::class);
    }

    function endereco() {
        return $this->hasMany(Endereco::class);
    }
}
