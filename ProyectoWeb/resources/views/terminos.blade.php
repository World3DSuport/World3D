<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Términos y Condiciones - World3D</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      overflow: auto;
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }
    ::-webkit-scrollbar {
      width: 12px;
    }
    ::-webkit-scrollbar-track {
      background: #f8f9fa;
    }
    ::-webkit-scrollbar-thumb {
      background-color: rgba(42, 0, 48, 0.91);
      border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background-color: rgba(42, 0, 48, 0.91);
    }
    .container {
      max-width: 700px;
      background-color: rgba(42, 0, 48, 0.91);
      padding: 40px;
      margin-top: 50px;
      border-radius: 10px;
      border: 3px solid #9f44d3;
      box-shadow: 0 0 15px rgba(159, 68, 211, 0.6);
      transition: all 0.4s ease;
      min-height: 700px;
    }
    .container:hover {
      box-shadow: 0 0 25px rgba(159, 68, 211, 0.85);
      transform: translateY(-5px);
    }
    h1, h3, p {
      color: white;
    }
    .fecha-actualizacion {
      color: white !important;
      font-weight: bold;
    }
    .btn-custom {
      background-color: rgba(42, 0, 48, 0.91);
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      display: inline-block;
    }
    .btn-custom:hover {
     background-color: rgba(42, 0, 48, 0.91);
      color: white;
    }
    .form-check-label {
      color: white;
    }
  </style>
</head>
<body>

  <div class="container text-center">
    <h1>Términos y Condiciones de Uso</h1>
    <p class="fecha-actualizacion">Última actualización: Mayo 2025</p>

    <h3>1. Introducción</h3>
    <p>Bienvenido a World3D, una plataforma innovadora para la creación y modelado de artículos tridimensionales. Al acceder y utilizar nuestro sitio web o servicios, aceptas los términos y condiciones descritos a continuación.</p>

    <h3>2. Uso del Servicio</h3>
    <p>World3D está diseñado para convertir imágenes en modelos 3D de alta calidad mediante algoritmos avanzados de reconstrucción. Los usuarios se comprometen a utilizar la plataforma de forma ética y exclusivamente para fines legítimos, sin alterar procesos ni distribuir contenido no autorizado.</p>

    <h3>3. Propiedad Intelectual</h3>
    <p>Todos los modelos generados por los usuarios son propiedad de estos, siempre que hayan sido creados a partir de contenido propio. World3D se reserva el derecho de uso para fines de mejora de la plataforma, siempre respetando la privacidad del usuario.</p>

    <h3>4. Privacidad</h3>
    <p>La información personal y los archivos subidos son tratados con confidencialidad. No compartimos tus datos con terceros, salvo autorización expresa o requerimiento legal. Para más detalles, revisa nuestra política de privacidad.</p>

    <h3>5. Responsabilidad del Usuario</h3>
    <p>El usuario es responsable del contenido que sube. Queda prohibido subir imágenes que violen derechos de autor, sean ofensivas o ilegales. World3D podrá eliminar contenido que infrinja estas normas sin previo aviso.</p>

    <h3>6. Modificaciones</h3>
    <p>Nos reservamos el derecho de modificar estos términos en cualquier momento. Se notificará a los usuarios registrados sobre cambios importantes. El uso continuado del servicio implica la aceptación de los nuevos términos.</p>

    <h3>7. Membresías y Suscripciones</h3>
    <p>Algunas funcionalidades de World3D requieren suscripción. Los pagos no son reembolsables, salvo por fallos comprobables del sistema. Las suscripciones pueden ser canceladas en cualquier momento desde el perfil del usuario.</p>

    
    <div class="text-center mt-4">
      <a href="{{ route('registro') }}" class="btn" style="background-color: rgb(212, 0, 255); color: white; border: 2px solid white; font-weight: bold; padding: 12px 24px;">
        Salir
      </a>
    </div>
  </div>

  <script>
    document.getElementById('aceptarTerminos')?.addEventListener('change', function () {
      document.getElementById('btnAceptar').disabled = !this.checked;
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>