<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Telefone;

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
}
