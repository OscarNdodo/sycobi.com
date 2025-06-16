<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rota extends Model
{
    protected $fillable = [
        "origem",
        "destino",
        "partida",
        "chegada",
        "preco",
        "acentos",
        "status"
    ];

    public function usuario() {
        return $this->belongsTo(User::class);
    }


    public function bilhetes() {
        return $this->hasMany(Bilhete::class);
    }
}
