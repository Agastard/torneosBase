<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoTorneo extends Model
{
    //
    protected $table = 'tipostorneos'; // Nombre de la tabla en la base de datos
    protected $fillable = [
        'nombre',
        'descripcion',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    protected $guarded = ['id']; // Asegura que el campo 'id' no sea asignable masivamente
}
