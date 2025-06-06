<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ronda extends Model
{
    use HasFactory;
    protected $table = 'rondas';

    protected $fillable = [
        'nombre',
        'torneo_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $guarded = ['id']; // Asegura que el campo 'id' no sea asignable masivamente

    public function torneo()
    {
        return $this->belongsTo(Torneo::class, 'torneo_id', 'id');
    }

    public function participantes()
    {
        return $this->hasMany(ParticipanteRonda::class, 'ronda_id', 'id');
    }
}
