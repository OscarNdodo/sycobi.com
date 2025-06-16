<?php

namespace App\Http\Controllers;

use App\Models\Rota;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    
    public function viagens() {
        $rotas = Rota::where("status", true)->paginate(6);
        $filtros = Rota::where("status", true)->get();
        foreach ($rotas as $rota) {
            $rota["partida"] = Carbon::createFromTimeString($rota->partida)->format("H:i");
            $rota["chegada"] = Carbon::createFromTimeString($rota->chegada)->format("H:i");
        }
        return view("viagens", [
            "rotas"         => $rotas,
            "filtros"     => $filtros
        ]);
    }
}
