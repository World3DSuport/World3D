<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Política de Privacidad - World3D</title>
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
    <h1>Política de Privacidad</h1>
    <p class="fecha-actualizacion">Última actualización: Mayo 2025</p>

    <h3>1. Información que recopilamos</h3>
    <p>Recopilamos información personal como nombre, correo electrónico y archivos cargados por el usuario. Esta información se utiliza exclusivamente para ofrecer nuestros servicios de modelado 3D.</p>

    <h3>2. Uso de la información</h3>
    <p>La información se utiliza para mejorar tu experiencia, mantener la seguridad de la plataforma y proporcionar soporte técnico. No compartimos datos con terceros sin consentimiento previo.</p>

    <h3>3. Almacenamiento y seguridad</h3>
    <p>Implementamos medidas de seguridad avanzadas para proteger tus datos. Los archivos y datos personales se almacenan en servidores seguros con acceso restringido.</p>

    <h3>4. Cookies y tecnologías similares</h3>
    <p>Utilizamos cookies para mejorar la funcionalidad del sitio y analizar el uso del mismo. Puedes configurar tu navegador para rechazar las cookies si lo deseas.</p>

    <h3>5. Derechos del usuario</h3>
    <p>Tienes derecho a acceder, rectificar y eliminar tus datos personales. También puedes solicitar la suspensión del uso de tus datos contactando con nuestro equipo de soporte.</p>

    <h3>6. Cambios en la política</h3>
    <p>Nos reservamos el derecho de actualizar esta política. Se notificará a los usuarios sobre cambios importantes mediante correo electrónico o mediante avisos en la plataforma.</p>

    <h3>7. Contacto</h3>
    <p>Si tienes preguntas sobre esta política de privacidad, puedes contactarnos a través de nuestro correo: <strong>soporte@world3d.com</strong></p>

    <div class="text-center mt-4">
      <a href="{{ route('registro') }}" class="btn" style="background-color: rgb(212, 0, 255); color: white; border: 2px solid white; font-weight: bold; padding: 12px 24px;">
        Salir
      </a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
