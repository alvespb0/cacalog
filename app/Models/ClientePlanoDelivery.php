<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cliente;
use App\Models\PlanoDelivery;

class ClientePlanoDelivery extends Model
{
    use HasFactory;

    protected $table = 'cliente_plano_delivery';

     public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function planoDelivery() {
        return $this->belongsTo(PlanoDelivery::class);
    }
}
