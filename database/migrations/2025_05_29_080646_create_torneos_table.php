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
        Schema::create('torneos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_torneo_id')
                ->constrained('tipostorneos')
                ->onDelete('cascade');
            $table->timestamp('fecha_torneo')->nullable();
            $table->string('nombre', 100);
            $table->string('descripcion', 255)->nullable();
            $table->string('ubicacion', 255)->nullable();
            $table->integer('n_mesas')->default(0);
            $table->integer('n_participantes_x_mesa')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('torneos');
    }
};
