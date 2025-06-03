<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Torneos</title>
</head>

<body>
    <h1>Hola Torneos List</h1>
    @foreach ($torneos as $torneo)
    <div>
        <h2>{{ $torneo->nombre }}</h2>
        <p>{{ $torneo->descripcion }}</p>
        <p>Fecha: {{ $torneo->fecha_torneo }}</p>
        <p>Lugar: {{ $torneo->ubicacion }}</p>
        <p>Tipo Torneo: {{ $torneo->getTipo->nombre }}</p>
    </div>
    <hr>
    @endforeach
</body>

</html>
