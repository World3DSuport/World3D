<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Actividades</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: 'Nunito', sans-serif;
        }

        h1 {
            color: #9f44d3;
        }

        .btn-primary {
            background-color: #6a0dad;
            border-color: #6a0dad;
        }

        .btn-primary:hover {
            background-color: #9f44d3;
            border-color: #9f44d3;
        }

        .form-control {
            background-color: #1f1f1f;
            color: #ffffff;
            border: 1px solid #6a0dad;
        }

        .form-control::placeholder {
            color: #cccccc;
        }

        .form-label {
            color: #cccccc;
        }

        .card {
            background-color: #1f1f1f;
            border: 1px solid #6a0dad;
            border-radius: 10px;
        }

        .card-header {
            background-color: #6a0dad;
            color: white;
            font-weight: bold;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .alert-info {
            background-color: #232323;
            color: #d1c4e9;
            border-color: #6a0dad;
        }

        pre {
            background-color: #2b2b2b;
            padding: 15px;
            border-radius: 8px;
            color: #e0e0e0;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Historial de Logs</h1>
    
        <form method="GET" action="{{ route('logs') }}" class="mb-4">
            <div class="row g-2 align-items-end">
                <div class="col-md-3">
                    <label for="day" class="form-label">Día</label>
                    <input type="text" id="day" name="day" class="form-control" placeholder="__" value="{{ request('day') }}">
                </div>
                <div class="col-md-3">
                    <label for="month" class="form-label">Mes</label>
                    <input type="text" id="month" name="month" class="form-control" placeholder="__" value="{{ request('month') }}">
                </div>
                <div class="col-md-3">
                    <label for="hour" class="form-label">Hora</label>
                    <input type="text" id="hour" name="hour" class="form-control" placeholder="__" value="{{ request('hour') }}">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">Buscar</button>
                </div>
            </div>
        </form>
    
        @if(request('day') || request('month') || request('hour'))
            <div class="alert alert-info mt-3">
                <strong>Resultados de la Búsqueda de Logs:</strong><br>
                Día: {{ request('day') ?? 'Todos' }}<br>
                Mes: {{ request('month') ?? 'Todos' }}<br>
                Hora: {{ request('hour') ?? 'Todas' }}
            </div>
        @endif
    
        @foreach($logs as $filename => $logContent)
            <div class="card mb-3">
                <div class="card-header">
                    {{ $filename }}
                </div>
                <div class="card-body">
                    <pre>{{ $logContent }}</pre>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
