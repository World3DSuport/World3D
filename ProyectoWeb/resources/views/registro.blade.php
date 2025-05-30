<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate - World 3D</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Tu CSS existente aquí */
        body {
            background: linear-gradient(135deg, rgb(0, 0, 0), rgb(128, 0, 160));
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
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
            padding: 20px; /* Reducido de 30px a 20px */
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1.5s ease-in-out;
            max-width: 400px; /* Limitar el ancho del formulario */
            width: 100%; /* Asegurarse de que sea responsivo */
            overflow: auto; /* Permitir el desplazamiento si es necesario */
            max-height: 90vh; /* Limitar la altura máxima del contenedor */
        }

        .logo {
            width: 80px; /* Reducido de 100px a 80px */
            height: 80px; /* Reducido de 100px a 80px */
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            margin: 30 auto 20px auto;
            display: block;
            animation: bounce 2s infinite;
            box-shadow: 0 4px 20px rgb(240, 125, 255); /* Sombra similar a la de las características */
            transition: transform 0.3s; 
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
            font-size: 1.5rem; /* Reducido de 1.8rem a 1.5rem */
            font-weight: bold;
            color: #6a0dad;
            text-align: center;
            margin-bottom: 20px; /* Reducido de 30px a 20px */
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

        /* Estilos para las alertas */
        .alert-custom {
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            position: relative;
        }

        .alert-custom .close {
            position: absolute;
            top: 10px;
            right: 15px;
            color: inherit;
            font-size: 1.2rem;
            cursor: pointer;
        }

        /* Personalización de la barra de desplazamiento */
        .form-container::-webkit-scrollbar {
            width: 10px; /* Ancho de la barra de desplazamiento */
        }

        .form-container::-webkit-scrollbar-track {
            background: #e0e0e0; /* Color del fondo de la barra de desplazamiento */
        }

        .form-container::-webkit-scrollbar-thumb {
            background: #6a0dad; /* Color de la barra de desplazamiento (morado) */
            border-radius: 10px; /* Bordes redondeados */
        }

        .form-container::-webkit-scrollbar-thumb:hover {
            background: #9f44d3; /* Color de la barra de desplazamiento al pasar el mouse (morado más claro) */
        }

        /* Para Firefox */
        .form-container {
            scrollbar-width: thin; /* Hacer la barra de desplazamiento más delgada */
            scrollbar-color: #6a0dad #e0e0e0; /* Color de la barra (morado) y el fondo */
        }
    </style>
</head>

<body>
    <section class="vh-100 d-flex flex-column justify-content-center align-items-center">
        <!-- Logo -->
        <img src="{{ asset('/img/logo.PNG') }}" class="logo" alt="Logo de World 3D">

        <!-- Contenedor del formulario -->
        <div class="form-container">
            <!-- Mensajes de éxito y error -->
            @if(session('success'))
                <div class="alert alert-success alert-custom">
                    {{ session('success') }}
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
                    <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
            @endif

            <form method="POST" action="{{ route('registro') }}">
                @csrf
                <h2 class="form-title">Crea tu cuenta en World 3D</h2>

                <!-- Nombre completo -->
                <div class="form-outline mb-3">
                    <input type="text" id="name" name="name" class="form-control form-control-lg"
                        placeholder="Escribe tu nombre completo" required>
                    <label class="form-label" for="name">Nombre completo</label>
                </div>

                <!-- Correo electrónico -->
                <div class="form-outline mb-3">
                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                        placeholder="Introduce tu correo electrónico" required>
                    <label class="form-label" for="email">Correo Electrónico</label>
                </div>

                <!-- Contraseña -->
                <div class="form-outline mb-3">
                    <input type="password" id="password" name="password" class="form-control form-control-lg"
                        placeholder="Introduce tu contraseña" required>
                    <label class="form-label" for="password">Contraseña</label>
                </div>

                <!-- Confirmar Contraseña -->
                <div class="form-outline mb-3">
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="form-control form-control-lg" placeholder="Confirma tu contraseña" required>
                    <label class="form-label" for="password_confirmation">Confirmar Contraseña</label>
                </div>
                 <div class="form-check mb-3 text-center">
                            <input class="form-check-input" type="checkbox" name="terminos" id="terminos" style="background-color:rgb(79, 7, 97) ; border-color:rgb(79, 7, 97)!important; ">
                            <label class="form-check-label" for="terminos">
                                Acepto los <a href="{{ route('terminos') }}" style="color:rgb(79, 7, 97);">Términos y Condiciones</a>

                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn text-white w-40" style="background-color:rgb(79, 7, 97); width: 40%;">Registrarse</button>
                        </div>
                        <br>
                 <div class="text-center">
                       
                        
                        @if ($errors->has('terminos'))
                            <div class="text-danger text-center mb-2">
                                {{ $errors->first('terminos') }}
                            </div>
                        @endif  
                
            </form>

            <p class="text-center mt-3">
                        ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="fw-bold" style="color:rgb(82, 7, 97);">Iniciar Sesión</a>
                    </p>
        </div>
    </section>

    <!-- Script para confirmar limpieza -->
    <script>
        document.querySelector('button[type="reset"]').addEventListener('click', function (event) {
            const confirmReset = confirm('¿Estás seguro de que quieres limpiar todos los campos?');
            if (!confirmReset) {
                event.preventDefault();
            }
        });
    </script>
</body>

</html>