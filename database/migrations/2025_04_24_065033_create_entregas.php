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
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->string('conteudo_entrega', 255);
            $table->integer('codigo_pedido');
            $table->unsignedBigInteger('endereco_id')->nullable();
            $table->unsignedBigInteger('motoboy_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->timestamps();

            $table->foreign('endereco_id')->references('id')->on('enderecos')->onDelete('set null');
            $table->foreign('motoboy_id')->references('id')->on('status')->onDelete('set null');
            $table->foreign('status_id')->references('id')->on('clientes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entregas');
    }
};
