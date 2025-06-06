<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participante extends Model
{
    use HasFactory;
    protected $table = 'participantes'; // Nombre de la tabla en la base de datos
    protected $fillable = [
        'nombre',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    protected $guarded = ['id']; // Asegura que el campo 'id' no sea asignable masivamente
    public function rondas()
    {
        return $this->belongsToMany(Ronda::class, 'participantesrondas', 'participante_id', 'ronda_id')
                    ->withPivot('puntos')
                    ->withTimestamps();
    }
    public function torneos()
    {
        return $this->belongsToMany(Torneo::class, 'participantestorneos', 'participante_id', 'torneo_id')
                    ->withTimestamps();
    }
}
