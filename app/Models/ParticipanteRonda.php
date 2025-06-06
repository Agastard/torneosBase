<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipanteRonda extends Model
{
    use HasFactory;
    protected $table = 'participantesrondas';

    protected $fillable = [
        'participante_id',
        'ronda_id',
        'puntos',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    protected $guarded = ['id']; // Asegura que el campo 'id' no sea asignable masivamente
    public function participante()
    {
        return $this->belongsTo(Participante::class, 'participante_id', 'id');
    }
    public function ronda()
    {
        return $this->belongsTo(Ronda::class, 'ronda_id', 'id');
    }
}
