<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('viagens', 'viagens');
Route::view('viagens/12/reservar', 'reserva');
Route::view('viagens/12/reservar/confirmada', 'bilhete');
Route::view('viagens/passageiro/12', 'passageiro');


Route::prefix('dashboard')->group(function() {
    Route::view('/', 'admin.home');
    Route::view('/rotas', 'admin.rotas');
    Route::view('/horarios', 'admin.horarios');
    Route::view('/reservas', 'admin.reservas');
    Route::view('/passageiros', 'admin.passageiros');
    Route::view('/configuracoes', 'admin.configuracoes');
    Route::view('/vendas', 'admin.vendas');
});
