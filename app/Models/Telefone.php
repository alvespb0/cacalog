<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Motoboy;

class Telefone extends Model
{
    use HasFactory;
    protected $fillable = [
        "telefone",
        "descricao",
        "cliente_id",
        "motoboy_id",
    ];

    public function motoboy(){
        return $this->belongsTo(Motoboy::class);
    }
}
