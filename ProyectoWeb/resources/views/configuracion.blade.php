<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configuración de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 40px;
            background: linear-gradient(135deg, rgb(0, 0, 0), rgb(128, 0, 160));
            min-height: 100vh;
        }

        .overlay {
            background-color: rgba(255, 255, 255, 0.6);
            min-height: 100vh;
            padding-top: 50px;
        }

        .custom-card {
            max-width: 1000px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
             border: 2px solid rgba(106, 13, 173, 0.5); 
            box-shadow: 0 4px 20px rgb(212, 0, 255);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .custom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 25px rgb(212, 0, 255);
        }

        .card-header {
            background-color: rgba(42, 0, 48, 0.91);
            color: white;
        }

        .btn {
            background-color: rgba(42, 0, 48, 0.91);
            color: white;
        }

        .btn:hover {
            background-color: #9f44d3;
            color: white;
        }
    </style>
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center my-5">
        <div class="card shadow-lg w-100 custom-card">
            <div class="card-header d-flex align-items-center justify-content-center gap-3">
                <img src="{{ asset('/img/logo.PNG')}}" alt="Foto de perfil" width="70" height="60">
                <h2 class="mb-0">Configuración</h2>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="row">
                    <div class="col-md-6 border-end">
                        <h5 class="mb-3">Actualiza tu Información Personal</h5>
                        <form action="{{ route('configuracion.datos') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre completo</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $usuario->name }}">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}">
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <h5 class="mb-3">Cambiar Contraseña</h5>
                        <form action="{{ route('configuracion') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Contraseña actual</label>
                                <input type="password" class="form-control" id="current_password" name="current_password" required>
                            </div>

                            <div class="mb-3">
                                <label for="new_password" class="form-label">Nueva contraseña</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div>

                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn">Actualizar contraseña</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-secondary" onclick="history.back()">Volver</button>
                </div>

            </div>
        </div>
    </div>

</body>
</html>