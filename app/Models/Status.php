<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Entrega;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    protected $fillable = [
        "nome",
        "cor",
    ];

    public function entregas() {
        return $this->hasMany(Entrega::class);
    }
}