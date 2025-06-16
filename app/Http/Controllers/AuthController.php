<?php

namespace App\Http\Controllers;

use App\Models\Bilhete;
use App\Models\Rota;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index() {
       return view("login");
    }

    public function store(Request $request) {
        $data = $request->validate([
            "email"     => "required|email",
            "password"  => "required|min:6"
        ]);


        $remember = $request["remember"] == "on" ? true : false;
        if (User::where("email", $data["email"])->first() == null) {
            return Redirect::back()->withErrors(["email" => "Email ou senha invalida!"]);
        }
        if (Auth::attempt($data, $remember)) {
            return Redirect::route("admin.home");
        }
    }

    public function home() {
        $bilhetes = Bilhete::all();
        $rotas = Rota::all();
        $bilhetes_hoje = [];
        $receita_hoje = 0.0;
        $receita = 0.0;
        $rotas_hoje = [];

        foreach($bilhetes as $bilhete) {
            if ($bilhete->created_at->format("dmY") == now()->format("dmY")) {
                $bilhetes_hoje[] = $bilhete;
                $receita_hoje += $bilhete->rota["preco"];
                $rotas_hoje[] = $bilhete->rota;
            }
            $receita += $bilhete->rota["preco"];
        }

        foreach ($rotas_hoje as $rota) {

            $rota["partida"] = Carbon::createFromTimeString($rota->partida)->format("H:i");
            $rota["chegada"] = Carbon::createFromTimeString($rota->chegada)->format("H:i");
        }

        $days_month = now()->daysInMonth();
        $data = array_fill(1, $days_month, null);
        
        foreach ($bilhetes as $bilhete) {
                for($cont = 1;  $cont < count($data); $cont++) {
                    if ($bilhete->created_at->format("d") == $cont) {
                        $data[$cont] += 1;
                    }

                }
        }

        $chartData ["labels"]  = array_keys($data);
        $chartData["data"]  = array_values($data);

        return view("admin.home", [
            "bilhetes"      => $bilhetes,
            "rotas"         => $rotas,
            "bilhetes_hoje" => $bilhetes_hoje,
            "receita_hoje"  => $receita_hoje,
            "rotas_hoje"    => $rotas_hoje,
            "receita"       => $receita,
            "chartData"     => $chartData,
        ]);
    }

    public function logout() {
        Auth::logout();
        return Redirect::route("welcome");
    }
}
