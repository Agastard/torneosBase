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
        Schema::create('participantesrondas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participante_id')
                ->constrained('participantes')
                ->onDelete('cascade');
            $table->foreignId('ronda_id')
                ->constrained('rondastorneos')
                ->onDelete('cascade');
            $table->integer('puntos')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participantesrondas');
    }
};
