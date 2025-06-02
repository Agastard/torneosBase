<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Torneo;

class TorneoController extends Controller
{
    public function index()
    {
        // Aquí puedes agregar la lógica para obtener los torneos
        // Por ejemplo, podrías obtenerlos de la base de datos
        $torneos = Torneo::all(); // Reemplaza esto con la lógica real

        return view('torneos.torneoslist', compact('torneos'));
    }
}
