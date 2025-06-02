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
        Schema::create('rondastorneos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('torneo_id')
                ->constrained('torneos')
                ->onDelete('cascade');
            $table->smallInteger('numero_ronda')->unsigned();
            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_fin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rondastorneos');
    }
};
