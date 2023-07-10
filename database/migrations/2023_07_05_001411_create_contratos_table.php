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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor', 8, 2);
            $table->string('descricao');
            $table->unsignedBigInteger('associado');
            $table->enum('quantidade_parcelas', ['12', '24'])->default('12');
            $table->decimal('taxa_juros_mensal', 5, 2)->default(0);
            $table->decimal('valor_parcela', 10, 2);
            $table->timestamps();
        });

        Schema::table('contratos', function (Blueprint $table) {
            $table->foreign('associado')->references('id')->on('associados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
