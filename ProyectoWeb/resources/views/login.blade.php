<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesión - World 3D</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, rgb(0, 0, 0), rgb(128, 0, 160));
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            animation: backgroundMove 6s infinite alternate;
        }

        @keyframes backgroundMove {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 100% 50%;
            }
        }

        .form-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1.5s ease-in-out;
        }

        .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            margin: 0 auto 20px auto;
            display: block;
            animation: bounce 2s infinite;

            /* Bordes redondeados */
            box-shadow: 0 4px 20px rgb(240, 125, 255); /* Sombra similar a la de las características */
            transition: transform 0.3s; /* Transición suave al pasar el mouse */
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .form-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #6a0dad;
            text-align: center;
            margin-bottom: 30px;
        }

        .btn-primary {
            background: #6a0dad;
            border-color: #6a0dad;
            --bs-btn-active-bg: #9f44d3;
            --bs-btn-active-border-color: #9f44d3;
        }

        .btn-primary:hover {
            background: #9f44d3;
            border-color: #9f44d3;
        }

        .form-outline input {
            border: 2px solid #6a0dad;
            transition: border-color 0.3s ease;
        }

        .form-outline input:focus {
            border-color: #9f44d3;
            box-shadow: 0 0 10px rgba(159, 68, 211, 0.5);
        }
    </style>
</head>

<body>
    <section class="vh-100 d-flex flex-column justify-content-center align-items-center">
        <img src="{{ asset('/img/logo.PNG') }}" class="logo" alt="Logo de World 3D">

        <div class="form-container">
            @if(session('success'))
                <div class="alert alert-success alert-custom">
                    {{ session('success') }}
                    <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
            @endif

            @if(session('info'))
                <div class="alert alert-info alert-custom">
                    {{ session('info') }}
                    <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
            @endif

            @if($errors->any())
    <div class="alert alert-danger alert-custom">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h2 class="form-title">Inicia sesión en World 3D</h2>

                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                        placeholder="Introduce tu correo electrónico" required>
                    <label class="form-label" for="email">Correo Electrónico</label>
                </div>

                <div class="form-outline mb-3">
                    <input type="password" id="password" name="password" class="form-control form-control-lg"
                        placeholder="Introduce tu contraseña" required>
                    <label class="form-label" for="password">Contraseña</label>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="remember" style="background-color:rgb(79, 7, 97) !important; border-color:rgb(79, 7, 97)!important; ">
                        <label class="form-check-label" for="remember">Recordar</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-body" style="color:rgb(79, 7, 97) !important;">¿Olvidaste tu contraseña?</a>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg" style="padding: 0.5rem 2.5rem;">Iniciar sesión</button>
                    <p class="small fw-bold mt-2">¿No tienes una cuenta? 
                        <a href="{{ route('registro') }}" class="link" style="color:rgb(79, 7, 97) !important;">Regístrate aquí</a></p>
                </div>
            </form>
        </div>
    </section>
</body>

</html>