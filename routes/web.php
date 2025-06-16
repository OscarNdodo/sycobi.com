<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BilheteController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RotaController;
use App\Models\Bilhete;
use App\Models\Rota;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $rotas = Rota::where("status", true)->paginate(3);
    return view('welcome', compact("rotas"));
})->name("welcome");

Route::prefix('viagens')->group(function() {
    Route::get("/", [GuestController::class, 'viagens'])->name("viagens");
    Route::get('/{id}/reservar', [BilheteController::class, "criar"])->name("bilhete.criar");
    Route::post("/{id}/reservar", [BilheteController::class, "criar"])->name("bilhete.criar.post");
    Route::get('/{id}/bilhete/confirmado', [BilheteController::class, "bilhete"])->name("bilhete.confirmado");
});


Route::view('viagens/passageiro/12', 'passageiro');


Route::get('login', [AuthController::class, "index"])->name("login");
Route::post("login", [AuthController::class, "store"])->name("login");

Route::prefix('dashboard')->middleware("auth")->group(function() {
    Route::get('/', [AuthController::class, "home"])->name("admin.home");

    Route::prefix("rotas")->group(function() {
        Route::get('/', [RotaController::class, "index"])->name("admin.rotas");
        Route::post("/nova", [RotaController::class, "criar"])->name("admn.rotas.nova");
        Route::get("/{id}/editar", [RotaController::class, "editar"])->name("admin.rotas.editar");
        Route::post("/{id}/editar", [RotaController::class, "editar"])->name("admin.rotas.editar");
        Route::get("/{id}/status", [RotaController::class, "status"])->name("admin.rotas.status");
        Route::get("/filter/by", [RotaController::class, "filter"])->name("admin.rotas.filter");
    });

    Route::prefix("bilhetes")->group(function() {
        Route::get('/', [BilheteController::class, "index"])->name("admin.bilhetes");
        Route::post("/criar", [BilheteController::class, "novo"])->name("admin.bilhete.novo");
        Route::get("/filtrar/por", [BilheteController::class, "filtrar"])->name("admin.bilhete.filtrar");
        Route::get("/{id}/confirmar", [BilheteController::class, "confirmar"])->name("admin.bilhetes.confirmar");
        Route::get("/{id}/cancelar", [BilheteController::class, "cancelar"])->name("admin.bilhetes.cancelar");
    });

    Route::prefix("/configuracoes")->group(function() {
        Route::get("/", [ConfigController::class, "index"])->name("admin.config");       
        Route::post("/actualizar/perfil", [ConfigController::class, "profile"])->name("admin.profile");
        Route::post("/actualizar/senha", [ConfigController::class, "password"])->name("admin.password");
    });




    Route::get("/logout", [AuthController::class, "logout"])->name("logout");
});
