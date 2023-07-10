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
        Schema::create('bens', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->decimal('valor', 8, 2);
            $table->unsignedBigInteger('contrato')->unique();
            $table->string('descricao');
            $table->timestamps();
        });

        Schema::table('bens', function (Blueprint $table) {
            $table->foreign('contrato')->references('id')->on('contratos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bems');
    }
};
