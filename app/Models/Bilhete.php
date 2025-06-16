<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bilhete extends Model
{
    protected $fillable = [
        "nome",
        "tipo_doc",
        "num_doc",
        "telefone",
        "email",
        "codigo",
        "status",
        "acento"
    ];

    public function rota() {
        return $this->belongsTo(Rota::class);
    }
}
