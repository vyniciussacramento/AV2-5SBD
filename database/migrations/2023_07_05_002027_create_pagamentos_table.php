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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contrato');
            $table->integer('numero_parcela');
            $table->decimal('valor_parcela', 8, 2);
            $table->boolean('verificar_pagamento')->default(false);
            $table->timestamps();
        });

        Schema::table('pagamentos', function (Blueprint $table) {
            $table->foreign('contrato')->references('id')->on('contratos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
