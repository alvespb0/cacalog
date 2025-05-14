<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Telefone;
use App\Models\Entrega;

class Motoboy extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "cpf",
    ];

    public function telefone(){
        return $this->hasMany(Telefone::class);
    }

    public function entregas() {
        return $this->hasMany(Entrega::class, 'motoboy_id');
    }
}
