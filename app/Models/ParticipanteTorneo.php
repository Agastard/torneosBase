<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipanteTorneo extends Model
{
    use HasFactory;
    protected $table = 'participantestorneos';

    protected $fillable = [
        'participante_id',
        'torneo_id',
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

    public function torneo()
    {
        return $this->belongsTo(Torneo::class, 'torneo_id', 'id');
    }
}
