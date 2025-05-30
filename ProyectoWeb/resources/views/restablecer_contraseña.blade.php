<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, rgb(0, 0, 0), rgb(128, 0, 160));
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            opacity: 0.95;
        }
        .card {
            position: relative;
            padding-top: 80px; /* Espacio interno para el logo */
        }
        .card-logo {
            position: absolute;
            top: -100px; /* Más arriba del borde superior */
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%; /* Círculo perfecto */
            border: 2px solid rgba(106, 13, 173, 0.5); /* Borde morado */
             box-shadow: 0 4px 20px rgba(212, 0, 255, 0.5); 
            background-color: white;
            

        }
        .custom-container {
            margin-top: 100px; /* Espacio entre el logo y el borde superior de la pantalla */
        }
    </style>
</head>
<body>

    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow p-4">

                    <!-- Logo flotante -->
                    <img src="{{ asset('/img/logo.PNG')}}" alt="Logo de World3D" class="card-logo">

                    <h3 class="text-center mb-3">Restablecer Contraseña</h3>
                    <p class="text-center text-muted">Ingresa tu correo para enviarte un enlace de restablecimiento.</p>

                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label d-block text-center">Correo Electrónico</label>
                            <input type="email" class="form-control" name="email" required autofocus>
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn w-50 d-block mx-auto"
                            style="background: #6a0dad; color: white; border: none; border-radius: 8px; transition: background-color 0.3s ease;"
                            onmouseover="this.style.backgroundColor=' #6a0dad'" 
                            onmouseout="this.style.backgroundColor=' #6a0dad'">
                            Enviar Enlace
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" style="color:black">Volver al Inicio de Sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>