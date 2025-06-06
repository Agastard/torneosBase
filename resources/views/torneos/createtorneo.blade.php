<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="{{ route('torneos.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nombre">Nombre del Torneo:</label>
            <input type="text" id="nombre" name="nombre">
            @error('nombre')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"></textarea>
            @error('descripcion')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="fecha_torneo">Fecha del Torneo:</label>
            <input type="datetime-local"
                id="fecha_torneo" name="fecha_torneo"
                value="2025-06-12T19:30"
                min="2025-03-06T00:00"
                max="2026-06-14T00:00"
                >
            @error('fecha_torneo')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="ubicacion">Ubicación del Torneo:</label>
            <input type="text" id="ubicacion" name="ubicacion">
            @error('ubicacion')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="tipo_torneo_id">Tipo de Torneo:</label>
            <select id="tipo_torneo_id" name="tipo_torneo_id">
                <option value="1">Suizo</option>
                <option value="2">Eliminatorio</option>
            </select>
            @error('tipo_torneo_id')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" value="Crear Torneo">
    </form>
</body>

</html>
