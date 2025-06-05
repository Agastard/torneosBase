<?php

namespace App\Http\Controllers;

use App\Http\Requests\TorneoRequest;
use App\Models\ParticipanteTorneo;
use App\Models\Torneo;

class TorneoController extends Controller
{
    public function index()
    {
        // Listado de Torneos
        $torneos = Torneo::with('getTipo')->get(); // Cargar los torneos con su tipo asociado
        $participantes = ParticipanteTorneo::all();
        var_dump($participantes[0]->participante_id);

        return view('torneos.torneoslist', compact('torneos'));
    }
    public function create()
    {
        return view('torneos.createtorneo');
    }

    public function store(TorneoRequest $request)
    {
        $validated = $request->validated();
        if ($validated) {
            Torneo::create($validated);
            return redirect()->route('torneos.torneoslist')->with('success', 'Event created successfully!');
        }
    }
}
