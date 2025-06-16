<?php

namespace App\Http\Controllers;

use App\Models\Bilhete;
use App\Models\Rota;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BilheteController extends Controller
{
    public function criar(Request $request)
    {
        $rota = Rota::find($request["id"]);
        if ($rota == null) return Redirect::back()->withErrors(["error" => "Rota para viagem, invalida."]);

        if ($request->method() == "GET") {
            $bilhetes = $rota->bilhetes()->where("status", "Pendente")->count();
            $rota["partida"] = Carbon::createFromTimeString($rota->partida)->format("H:i");
            $rota["chegada"] = Carbon::createFromTimeString($rota->chegada)->format("H:i");
            return view("reserva", [
                "rota"      => $rota,
                "bilhetes"  => $bilhetes,
            ]);
        }

        $dados = $request->all();
        $acentos_ocupados = $rota->bilhetes()->where("status", "Pendente")->count();

        if ($acentos_ocupados >= $rota->acentos) return Redirect::back()->withErrors(["error" => "Infelizmente estamos lotadas, tente amanhã."]);
        $dados["acento"] = $acentos_ocupados + 1;
        $dados["codigo"] = "SCB" . $rota->id;
        $dados["codigo"] = $dados["codigo"] . strval($dados["acento"] > 9 ? $dados["acento"] : "0" . $dados["acento"]) . now()->format("Y");

        if ($rota->bilhetes()->where("codigo", $dados["codigo"])->first() != null) return Redirect::back()->withErrors(["error" => "Houve um erro inesperado, tente mais tarde."]);
        $bilhete = $rota->bilhetes()->create($dados);
        return Redirect::route("bilhete.confirmado", $bilhete->id)->withErrors(["success" => "Compra de bilhete efetuada com sucesso!"]);
    }

    public function bilhete(string $id)
    {
        $bilhete = Bilhete::find($id);
        if (!$bilhete) return Redirect::back()->withErrors(["error" => "Houve um erro inesperado, tente mais tarde."]);
        $rota = $bilhete->rota;
        $rota->save();
        $rota["partida"] = Carbon::createFromTimeString($rota->partida)->format("H:i");
        $rota["chegada"] = Carbon::createFromTimeString($rota->chegada)->format("H:i");
        return view('bilhete', [
            "bilhete"   => $bilhete,
            "rota"      => $rota
        ]);
    }


    // Para area adminitrativa
    public function index()
    {

        $bilhetes = Bilhete::orderByDesc("created_at")->paginate(9);
        $rotas = Rota::where("status", true)->get();

        foreach ($bilhetes as $bilhete) {
            $bilhete->rota["partida"] = Carbon::createFromTimeString($bilhete->rota->partida)->format("H:i");
            $bilhete->rota["chegada"] = Carbon::createFromTimeString($bilhete->rota->chegada)->format("H:i");
        }

        $cancelados = Bilhete::where("status", "cancelado")->count();
        $confirmados = Bilhete::where("status", "confirmado")->count();
        $pendentes = Bilhete::where("status", "pendente")->count();

        return view("admin.bilhetes", [
            "bilhetes" => $bilhetes,
            "cancelados" => $cancelados,
            "confirmados" => $confirmados,
            "pendentes"  => $pendentes,
            "rotas"     => $rotas
        ]);
    }

    public function novo(Request $request) {
        $rota = Rota::find($request["id"]);
        if ($rota == null) return Redirect::back()->withErrors(["error" => "Rota para viagem, invalida."]);

        if ($request->method() == "GET") {
            $bilhetes = $rota->bilhetes()->where("status", "Pendente")->count();
            $rota["partida"] = Carbon::createFromTimeString($rota->partida)->format("H:i");
            $rota["chegada"] = Carbon::createFromTimeString($rota->chegada)->format("H:i");
            return view("reserva", [
                "rota"      => $rota,
                "bilhetes"  => $bilhetes,
            ]);
        }

        $dados = $request->all();
        $acentos_ocupados = $rota->bilhetes()->where("status", "Pendente")->count();

        if ($acentos_ocupados >= $rota->acentos) return Redirect::back()->withErrors(["error" => "Infelizmente estamos lotadas, tente amanhã."]);
        $dados["acento"] = $acentos_ocupados + 1;
        $dados["codigo"] = "SCB" . $rota->id;
        $dados["codigo"] = $dados["codigo"] . strval($dados["acento"] > 9 ? $dados["acento"] : "0" . $dados["acento"]) . now()->format("Y");

        if ($rota->bilhetes()->where("codigo", $dados["codigo"])->first() != null) return Redirect::back()->withErrors(["error" => "Houve um erro inesperado, tente mais tarde."]);
        $bilhete = $rota->bilhetes()->create($dados);
        return Redirect::back()->withErrors(["success" => "Compra de bilhete efetuada com sucesso!"]);
    }


    public function filtrar(Request $request) {
        $data = $request->all();

        if (isset($data["rota"])) {
            $rota = Rota::find($data["rota"]);
            if (!$rota) return Redirect::back()->withErrors(["error" => "Rota nao encontrada."]);
            $bilhetes = $rota->bilhetes()->where("codigo", "like", "%{$data['codigo']}%")->where("nome", "like", "%{$data['nome']}%")->orderBy("created_at", "DESC")->paginate();
            
            $rotas = Rota::where("status", true)->get();

            foreach ($bilhetes as $bilhete) {
                $bilhete->rota["partida"] = Carbon::createFromTimeString($bilhete->rota->partida)->format("H:i");
                $bilhete->rota["chegada"] = Carbon::createFromTimeString($bilhete->rota->chegada)->format("H:i");
            }
    
            $cancelados = Bilhete::where("status", "cancelado")->count();
            $confirmados = Bilhete::where("status", "confirmado")->count();
            $pendentes = Bilhete::where("status", "pendente")->count();
    
            return view("admin.bilhetes", [
                "bilhetes" => $bilhetes,
                "cancelados" => $cancelados,
                "confirmados" => $confirmados,
                "pendentes"  => $pendentes,
                "rotas"     => $rotas
            ]);
        }

        $bilhetes = Bilhete::where("codigo", "like", "%{$data['codigo']}%")->where("nome", "like", "%{$data['nome']}%")->orderBy("created_at", "DESC")->paginate();

        // dd($bilhetes->toArray());
        $rotas = Rota::where("status", true)->get();

        foreach ($bilhetes as $bilhete) {
            $bilhete->rota["partida"] = Carbon::createFromTimeString($bilhete->rota->partida)->format("H:i");
            $bilhete->rota["chegada"] = Carbon::createFromTimeString($bilhete->rota->chegada)->format("H:i");
        }

        $cancelados = Bilhete::where("status", "cancelado")->count();
        $confirmados = Bilhete::where("status", "confirmado")->count();
        $pendentes = Bilhete::where("status", "pendente")->count();

        return view("admin.bilhetes", [
            "bilhetes" => $bilhetes,
            "cancelados" => $cancelados,
            "confirmados" => $confirmados,
            "pendentes"  => $pendentes,
            "rotas"     => $rotas
        ]);
    }


    public function confirmar(string $id) {
        $bilhete = Bilhete::find($id);
        if (!$bilhete) return Redirect::back()->withErrors(["error" => "Bilhete não encontrado!"]);
        $bilhete["status"] = "Confirmado";
        $bilhete->save();
        return Redirect::back()->withErrors(["success" => "Bilhete confirmadocom sucesso!"]);
    }


    public function cancelar(string $id) {
        $bilhete = Bilhete::find($id);
        if (!$bilhete) return Redirect::back()->withErrors(["error" => "Bilhete não encontrado!"]);
        $bilhete["status"] = "Cancelado";
        $bilhete->save();
        return Redirect::back()->withErrors(["success" => "Bilhete confirmadocom sucesso!"]);
    }

}
