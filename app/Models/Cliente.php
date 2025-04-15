<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PlanoDelivery;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'cnpj',
        'email',
        'senha',
        'url_callback',
        'token_autenticação'
    ];

    function planoDelivery(){
        return $this->belongsToMany(PlanoDelivery::class)->withTimestamps();
    }
}
