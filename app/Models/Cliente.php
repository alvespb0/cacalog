<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Telefone;
use App\Models\User;
use App\Models\Endereco;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'cnpj',
        'url_callback',
        'user_id',
        'token_autenticacao'
    ];

    public function telefone(){
        return $this->hasMany(Telefone::class);
    }

    public function endereco(){
        return $this->hasMany(Endereco::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}