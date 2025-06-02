<?php

namespace App\Http\Controllers;

use App\Http\Requests\TorneoRequest;
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

    public function store(TorneoRequest $request)
    {
        $validated = $request->validated();
        if ($validated) {
            $newtorneo = Torneo::create($request->all());
            return redirect()->route('torneos.torneoslist')->with('success', 'Event created successfully!');
        }
        // Redirigir a la lista de torneos con un mensaje de éxito
        return redirect()->route('torneos.torneoslist')->with('error', 'Torneo NO creado.');
    }
}
