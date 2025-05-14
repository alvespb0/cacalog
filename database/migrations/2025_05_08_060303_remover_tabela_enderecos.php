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
        Schema::dropIfExists('enderecos');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('logradouro', 255);
            $table->integer('numero');
            $table->string('complemento', 100);
            $table->string('bairro', 255);
            $table->unsignedBigInteger('cidade_id');
            $table->timestamps();
        });
    }
};
