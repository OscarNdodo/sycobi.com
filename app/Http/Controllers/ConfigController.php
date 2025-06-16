<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ConfigController extends Controller
{
    public function index() {
        return view("admin.config");
    }

    public function profile(Request $request) {
        $data = $request->validate([
            "name"  => "required|min:3|string",
            "email" => "required|string|min:15",
            "phone" => "nullable|min:9|string"
        ]);

        $user = Auth::user();
        if ($user["email"] != $data["email"]) {
            $user->update($data);
            Auth::logout();
            return Redirect::route("login", ["success" => "Email actualizado com sucesso!"]);
        }
        $user->update($data);
        return Redirect::back()->withErrors(["success" => "Dados actualizados com sucesso!"]);
    }

    public function password(Request $request) {
        $data = $request->validate([
            "current"   => "required|min:6|string",
            "password"  => "required|min:6|string",
            "confirm"   => "required|min:6|string",
        ]); 

        $user = Auth::user();

        if (!Hash::check($data["current"], $user["password"])) return Redirect::back()->withErrors(["error" => "Senha incorrecta. Tente novamente!"]);

        if ($data["password"] != $data["confirm"]) return Redirect::back()->withErrors(["error" => "As senhas na corespondem. Tente novamente"]);

        $user["password"] = Hash::make($data["password"]);
        $user->save();
        Auth::logout();
        return Redirect::route("login")->withErrors(["success" => "Senha actualizada com sucesso"]);
    }
}
