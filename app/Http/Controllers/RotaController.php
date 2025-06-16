<?php

namespace App\Http\Controllers;

use App\Models\Rota;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RotaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $filtrar = $user->rotas;
        $rotas = $user->rotas()->orderBy("updated_at", "DESC")->paginate(9);
        foreach ($rotas as $rota) {
            $rota["partida"] = Carbon::createFromTimeString($rota->partida)->format("H:i");
            $rota["chegada"] = Carbon::createFromTimeString($rota->chegada)->format("H:i");
        }
        return view("admin.rotas", compact("rotas", "filtrar"));
    }

    public function criar(Request $request)
    {
        $user = Auth::user();
        if ($user->role != "admin") return Redirect::back()->withErrors(["error" => "Você não tem permissão para isto!"]);
        $dados = $request->validate([
            "origem"    => "required|string|min:4",
            "destino"   => "required|string|min:4",
            "partida"   => "required",
            "chegada"   => "required",
            "acentos"   => "required",
            "preco"     => "required"
        ]);

        $user->rotas()->create($dados);
        return Redirect::back()->withErrors(["success" => "Rota adicionada com sucesso!"]);
    }

    public function editar(Request  $request, string $id)
    {
        $user = Auth::user();
        $rota = $user->rotas()->find($id);
        if (!$rota) return Redirect::back()->withErrors(["error" => "A rota nao foi encontrada!"]);

        if ($request->method() == "GET") {
            $rotas = $user->rotas;
            return view("admin.rota-editar", compact("rota", "rotas"));
        }

        $dados = $request->validate([
            "origem"    => "required|string|min:4",
            "destino"   => "required|string|min:4",
            "partida"   => "required",
            "chegada"   => "required",
            "acentos"   => "required",
            "preco"     => "required"
        ]);

        $rota->update($dados);
        return Redirect::route("admin.rotas")->withErrors(["success" => "Rota actualizada com sucesso!"]);
    }

    public function status(string $id)
    {
        $user = Auth::user();
        $rota = $user->rotas()->find($id);
        if (!$rota) return Redirect::back()->withErrors(["error" => "A rota nao foi encontrada!"]);

        $rota["status"] = !$rota["status"];
        $rota->save();
        return Redirect::back()->withErrors(["success" => "Rota actualizada com sucesso!"]);
    }

    public function filter(Request $request)
    {
        $dados = $request->all();
        $user = Auth::user();
        if ($dados["origem"] != null || $dados["destino"] != null) {
            $filtrar = $user->rotas;
            $rotas = $user->rotas()->where("origem", $dados["origem"])->orWhere("destino", $dados["destino"])->paginate();
            foreach ($rotas as $rota) {
                $rota["partida"] = Carbon::createFromTimeString($rota->partida)->format("H:i");
                $rota["chegada"] = Carbon::createFromTimeString($rota->chegada)->format("H:i");
            }
            return view("admin.rotas", compact("rotas", "filtrar"));
        }
        return Redirect::route("admin.rotas");
    }
}
