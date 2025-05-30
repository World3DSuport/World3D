<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            
            padding: 40px;
             background: linear-gradient(135deg, rgb(0, 0, 0), rgb(128, 0, 160));
            min-height: 100vh;
        }

        /* === ESTILO WORLD3D PARA BORDES Y EFECTOS === */
        .custom-card {
            max-width: 900px;
            margin: 0 auto;
            border-color: #9f44d3; /* Borde morado brillante */
             box-shadow: 0 0 10px rgba(159, 68, 211, 0.5); /* Sombra vibrante */
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .custom-card:hover {
            transform: translateY(-5px);
           box-shadow: 0 4px 20px rgb(212, 0, 255); /* Sombra suave */
        }

        .card-header {
            background: #6a0dad;
            color: white;
        }

        .btn {
           background: #6a0dad;
           color:white;
        }

        .btn:hover {
            background: #6a0dad;
            color:white;
        }

        table th {
           background: #6a0dad;
            color: white;
        }

        /* También aplicamos el mismo estilo a contenedores de formularios si lo deseas usar */
        .form-container {
            background: rgba(255, 255, 255, 0.6);
            border-radius: 10px;
            padding: 20px;
            border: 2px solid rgb(212, 0, 255);
           box-shadow: 0 4px 20px rgb(212, 0, 255); /* Sombra suave */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-5px);
           box-shadow: 0 4px 20px rgb(255, 252, 255);
        }
    </style>
</head>
<body>

<div class="container py-2">
    <div class="card shadow-lg custom-card">
        <div class="card-header d-flex align-items-center justify-content-center gap-3">
            <img src="{{ asset('/img/logo.PNG')}}" alt="Foto de perfil"  width="50" height="50">
            <h2 class="mb-0">Perfil de Usuario</h2>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Nombre completo</th>
                        <td>{{ $usuario->name }}</td>
                    </tr>
                    <tr>
                        <th>Correo electrónico</th>
                        <td>{{ $usuario->email }}</td>
                    </tr>
                    <tr>
                        <th>Rol</th>
                        <td>{{ $usuario->role }}</td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        <td>{{ $usuario->estado }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de registro</th>
                        <td>{{ $usuario->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="text-center mt-4 d-grid gap-3 d-md-flex justify-content-md-center">
                <form action="{{ route('usuario.desactivar', $usuario->id) }}" method="POST" onsubmit="return confirmarDesactivacion();">
                    @csrf
                    <button type="submit" class="btn">
                        Eliminar Usuario
                    </button>
                </form>                

<button class="btn btn-secondary" onclick="history.back()">Volver</button>

            </div>
        </div>
    </div>
</div>

<script>
    function confirmarDesactivacion() {
        return confirm('¿Estás seguro de que deseas eliminar tu cuenta?');
    }
</script>

</body>
</html>