<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bilhetes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("rota_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("nome");
            $table->enum("tipo_doc", ["bi", "cc", "pp", "cr"])->nullable();
            $table->string("num_doc")->nullable();
            $table->string("telefone")->nullable();
            $table->string("email")->nullable();
            $table->string("codigo")->unique();
            $table->integer("acento");
            $table->enum("status", ["Pendente", "Confirmado", "Cancelado"])->default("Pendente");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bilhetes');
    }
};
