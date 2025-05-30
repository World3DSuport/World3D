<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Restablecer Contraseña</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
           background: linear-gradient(135deg, rgb(0, 0, 0), rgb(128, 0, 160));
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .reset-container {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px 40px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
        }

        .btn-submit {
            background: #9f44d3;
            color: white;
        }

        .btn-submit:hover {
            background: #9f44d3;
        }

        h2 {
            color: #9f44d3;
            margin-bottom: 25px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <h2>Restablecer Contraseña</h2>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ request()->route('token') }}">
            <input type="hidden" name="email" value="{{ request()->get('email') }}">

            <div class="mb-3">
                <label class="form-label">Nueva Contraseña</label>
                <input type="password" class="form-control" name="password" required autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label">Confirmar Contraseña</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>

           <button type="submit" class="btn btn-submit w-50 d-block mx-auto">Guardar Contraseña</button>

        </form>
    </div>
</body>
</html>