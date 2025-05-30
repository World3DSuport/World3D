<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color:rgb(255, 255, 255);
            color:rgb(46, 0, 48);
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #9f44d3;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #6a0dad;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color:rgb(255, 255, 255);
        }

        tr:nth-child(odd) {
            background-color:rgb(255, 255, 255);
        }

        .header-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .header-table td {
            background-color: #6a0dad;
            color: white;
            border: 1px solid #6a0dad;
            vertical-align: middle;
            text-align: center;
            padding: 10px;
        }

        .header-logo {
            width: 100px;
        }

        .header-title {
            font-size: 18px;
            font-weight: bold;
            line-height: 1.4;
        }

        h3 {
            color: #9f44d3;
            margin-top: 30px;
            font-size: 16px;
        }

        img {
            border: 2px solid #6a0dad;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(159, 68, 211, 0.5);
        }
    </style>
</head>
<body>
    <table class="header-table">
        <tr>
            <td class="header-title">
                Reporte de Usuarios y Visitas Registradas<br>
                <span style="font-size: 14px;">World3D: Transforma fotogramas en increíbles modelos 3D, diseñando el futuro en tus manos.</span>
            </td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 30px;">
        <h3>Gráfica de Usuarios Activos e Inactivos</h3>
        <img src="{{ public_path('path_to_graphs/usuariosActivosInactivos.png') }}" alt="Usuarios Activos e Inactivos" width="400">
    </div>

    <div style="margin-top: 30px;">
        <h3>Gráfica de Visitas</h3>
        <img src="{{ public_path('path_to_graphs/visitasChart.png') }}" alt="Visitas" width="400">
    </div>
</body>
</html>
