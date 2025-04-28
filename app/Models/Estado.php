<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation\HasMany;

use App\Models\Cidade;

class Estado extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
    ];

    function cidades(){
        return $this->hasMany(Cidade::class);
    }
}
