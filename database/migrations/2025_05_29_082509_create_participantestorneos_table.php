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
        Schema::create('participantestorneos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participante_id')
                ->constrained('participantes')
                ->onDelete('cascade');
            $table->foreignId('torneo_id')
                ->constrained('torneos')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participantestorneos');
    }
};
