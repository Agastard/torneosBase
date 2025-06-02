<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Torneo extends Model
{
    //
    use HasFactory;
    protected $table = 'torneos'; // Nombre de la tabla en la base de datos
    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'ubicacion',
        'descripcion',
    ];
    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
    ];
    protected $guarded = ['id']; // Asegura que el campo 'id' no sea asignable masivamente

}
