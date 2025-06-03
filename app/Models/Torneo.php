<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\TipoTorneo;

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
        'tipo_torneo_id',
        'fecha_torneo'
    ];
    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
    ];
    protected $guarded = ['id']; // Asegura que el campo 'id' no sea asignable masivamente

    public function getTipo()
    {
        return $this->hasOne(TipoTorneo::class, 'id', 'tipo_torneo_id');
    }

}
