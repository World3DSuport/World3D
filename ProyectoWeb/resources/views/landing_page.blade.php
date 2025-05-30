<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<!-- Main CSS File -->
<link href="{{ asset('/css/main.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: rgb(246, 238, 248); /* Fondo claro */
        }

        .navbar {
            background-color: rgba(42, 0, 48, 0.91); /* Color oscuro fijo */
            position: fixed; /* Fija la barra de navegación */
            width: 100%; /* Ocupa todo el ancho */
            z-index: 1000; /* Por encima de otros elementos */
            box-shadow: 0 4px 20px rgb(212, 0, 255); /* Sombra */
        }

        .navbar-brand {
            color: white !important; /* Fuerza el color blanco para "World3D" */
            font-size: 1.5rem; /* Ajusta el tamaño */
            text-decoration: none; /* Evita subrayados en el texto */
        }

        .navbar-toggler svg {
            color: white; /* Ícono del menú con color blanco */
        }

        .navbar-nav {
            justify-content: flex-end; /* Alinea los elementos a la derecha */
        }

        .nav-link {
            color: white; /* Color de los enlaces */
            transition: color 0.3s; /* Efecto suave al pasar el mouse */
        }

        .nav-link:hover {
            color: #9f44d3; /* Cambia de color al pasar el mouse */
        }

        .hero {
            background: linear-gradient(135deg, rgb(0, 0, 0), rgb(128, 0, 160));
            color: white;
            padding: 50px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .features {
            background-color: rgb(32, 0, 36); /* Color morado para la sección de características */
            color: white;
            padding: 50px 0;
            padding: 30px; /* Espaciado interno */
            box-shadow: 0 4px 20px rgb(212, 0, 255); /* Sombra suave */
            margin: 50px; /* Espacio entre secciones */
            border-radius: 10px;
        }

        .row {
            display: flex; /* Hacer que las columnas sean flexibles */
        }

        .feature-item {
            background: rgba(255, 255, 255, 0.34); /* Fondo blanco semitransparente */
            border-radius: 10px;
            padding: 20px; /* Espaciado interno uniforme */
            box-shadow: 0 4px 20px rgb(212, 0, 255);
            transition: transform 0.3s;
            margin: 10px; /* Margen uniforme alrededor de cada elemento */
            flex: 1; /* Permitir que los elementos crezcan para ocupar el mismo espacio */
            display: flex; /* Hacer que el contenido interno sea flexible */
            flex-direction: column; /* Alinear el contenido verticalmente */
            justify-content: space-between; /* Espaciar el contenido */
            height: 250px; /* Establecer una altura fija para todos los elementos */
        }

        .feature-item:hover {
            transform: translateY(-5px);
        }

        .btn-primary {
            background: #6a0dad;
            border-color: #6a0dad;
            transition: background 0.3s ease;
            --bs-btn-active-bg: #9f44d3;
            --bs-btn-active-border-color: #9f44d3;
        }

        .btn-primary:hover {
            background: #9f44d3;
            border-color: #9f44d3;
        }

        .guide,
        .contact-section,
        .testimonial {
            background-color: white; /* Fondo blanco para las secciones */
            border-radius: 10px; /* Bordes redondeados */
            padding: 30px; /* Espaciado interno */
            box-shadow: 0 4px 20px rgb(212, 0, 255); /* Sombra suave */
            margin: 50px; /* Espacio entre secciones */
        }

        .guide {
            background-color: rgb(32, 0, 36); /* Color morado para la sección de guía */
            color: white; /* Color de texto blanco */
        }

        .contact-section {
            background-color: rgb(32, 0, 36); /* Color morado para la sección de guía */
            color: white; /* Color de texto blanco */
        }

        .form-container {
            background: rgba(255, 255, 255, 0.6); /* Fondo blanco semitransparente */
            border-radius: 10px;
            padding: 20px; /* Espaciado interno uniforme */
            box-shadow: 0 4px 20px rgb(212, 0, 255);
            transition: transform 0.3s;
        }

        .form-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #6a0dad; /* Color del título */
            text-align: center;
            margin-bottom: 30px;
        }

        .form-control {
            border: 2px solid #6a0dad; /* Borde morado */
            transition: border-color 0.3s ease; /* Transición suave */
        }

        .form-control:focus {
            border-color: #9f44d3; /* Borde morado al enfocar */
            box-shadow: 0 0 10px rgba(159, 68, 211, 0.5); /* Sombra morada al enfocar */
        }

        .testimonial {
            background: rgb(255, 255, 229); /* Color gris claro para la sección de testimonios */
            color: black; /* Color de texto negro */
        }

        .guide h2,
        .contact-section h2,
        .testimonial h2 {
            margin-bottom: 20px;
        }

        .guide-item {
            background: rgba(255, 255, 255, 0.34); /* Fondo blanco semitransparente */
            border-radius: 10px;
            padding: 20px; /* Espaciado interno uniforme */
            box-shadow: 0 4px 20px rgb(212, 0, 255);
            transition: transform 0.3s;
            margin: 10px; /* Margen uniforme alrededor de cada elemento */
            flex: 1; /* Permitir que los elementos crezcan para ocupar el mismo espacio */
            display: flex; /* Hacer que el contenido interno sea flexible */
            flex-direction: column; /* Alinear el contenido verticalmente */
            justify-content: space-between; /* Espaciar el contenido */
            height: 250px; /* Establecer una altura fija para todos los elementos */
        }

        .guide-item:hover {
            transform: translateY(-5px);
        }

        .footer {
            background: #343a40; /* Color oscuro para el pie de página */
            color: white; /* Color del texto en el pie de página */
            padding: 20px 0;
            position: relative; /* Para posicionar la línea de luz */
        }

        .footer .small {
            color: white; /* Cambiar el color del copyright a blanco */
        }

        .footer a {
            color: rgb(255, 255, 255); /* Color de los enlaces en el pie de página */
            transition: color 0.3s;
        }

        .footer a:hover {
            color: #9f44d3; /* Color de los enlaces al pasar el mouse */
        }

        /* Estilos para los modales */
        .modal-content {
            border-radius: 10px; /* Bordes redondeados para el contenido del modal */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Sombra para el modal */
        }

        .modal-header {
            background-color: #343a40; /* Color de fondo para el encabezado del modal */
            color: white; /* Color del texto del encabezado */
        }

        .modal-body {
            padding: 20px; /* Espaciado interno para el cuerpo del modal */
            min-height: 400px; /* Establecer una altura mínima para el cuerpo del modal */
        }

        iframe {
            width: 100%; /* Asegúrate de que el iframe ocupe todo el ancho */
            height: 315px; /* Altura fija para el iframe */
        }

        /* Estilos para las imágenes */
        .logo {
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 4px 20px rgba(212, 0, 255, 0.5); /* Sombra similar a la de las características */
            transition: transform 0.3s; /* Transición suave al pasar el mouse */
            border: 2px solid rgba(106, 13, 173, 0.5); /* Borde morado */
        }

        .logo:hover {
            transform: scale(1.05); /* Efecto de aumento al pasar el mouse */
        }

        .btn-primary {
            background: #6a0dad; /* Color del botón */
            border-color: #6a0dad; /* Color del borde del botón */
        }

        .btn-primary:hover {
            background: #9f44d3; /* Color del botón al pasar el mouse */
            border-color: #9f44d3; /* Color del borde del botón al pasar el mouse */
        }
    </style>
</head>

<body class="d-flex flex-column h-100" name="index">
    <main class="flex-shrink-0">
        <!-- Nueva Navigation-->
        <nav class="navbar navbar-marketing navbar-expand-lg navbar-light fixed-top">
            <div class="container px-5">
                <a class="navbar-brand text-primary" href="index.html">World3D</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto me-lg-5">
                        <li class="nav-item"><a class="nav-link" href="#inicio">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#acerca">Acerca de</a></li>
                        <li class="nav-item"><a class="nav-link" href="#guia">Guía de Uso</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contacto">Contactanos</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header-->
        <header class="hero">
            <div class="container px-5" id="inicio">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder mb-2">World3D: Transforma fotogramas en increíbles modelos 3D, diseñando el futuro en tus manos.</h1>
                            <p class="lead fw-normal mb-4">World3D es una plataforma intuitiva que convierte imágenes en modelos 3D precisos y descargables en múltiples formatos.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ url('/login') }}">Iniciar Sesión</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="{{ url('/registro') }}">Registrarse</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                        <img class="img-fluid rounded-3 my-5 logo" src="{{ asset('/img/logo.PNG')}}" alt="Logo de World3D" />
                    </div>
                </div>
            </div>
        </header>
                  
   <!-- Features section-->
   <section class="features" id="acerca">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h2 class="fw-bolder mb-0 text-center">Imagina un mundo que puedes modelar, con World3D.</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <div class="col mb-5 h-100">
                                <div class="feature-item">
                                    <h2 class="h3">Crea tus modelos 3D</h2>
                                    <p class="mb-0">Convierte en forma lo que puedes soñar, con World3D todo es posible crear. De imágenes simples a mundos sin fin, el modelado 3D comienza aquí.</p>
                                </div>
                            </div>
                            <div class="col mb-5 h-100">
                                <div class="feature-item">
                                    <h2 class="h3">Descarga tus modelos 3D</h2>
                                    <p class="mb-0">Tu modelo 3D está listo para brillar,  ¡con World3D listo para impactar.</p>
                                </div>
                            </div>
                            <div class="col mb-5 h-100">
                                <div class="feature-item">
                                    <h2 class="h3">Carga tus modelos 3D</h2>
                                    <p class="mb-0">Sube tus modelos, deja que brillen, con World3D tus ideas se perfilen. Carga tu diseño y dale un lugar, el futuro en 3D está por comenzar.</p>
                                </div>
                            </div>
                            <div class="col mb-5 h-100">
                                <div class="feature-item">
                                    <h2 class="h3">Visualiza tus modelos 3D</h2>
                                    <p class="mb-0">Explora tus modelos en cada detalle, con World3D todo cobra un aire. Visualízalos vivos, listos para brillar, tu creación en pantalla empieza a impactar.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Guía de Uso section-->
        <section class="guide" id="guia">
            <div class="container px-5">
                <h2 class="fw-bolder mb-0 text-center">Guía de Uso</h2>
                <br>
                <div class="row gx-5">
                    <div class="col-md-6 mb-5">
                        <div class="guide-item" data-bs-toggle="modal" data-bs-target="#videoModal1">
                            <h3>1. Crea modelos 3D</h3>
                            <p>"¡Desata tu creatividad! En este tutorial, aprenderás a transformar tus ideas en impresionantes modelos 3D. Te guiaremos paso a paso en el proceso de creación, desde la selección de imágenes hasta la generación de tu modelo final. Con World3D, cada diseño cobra vida, y tú serás el arquitecto de tu propio mundo tridimensional."</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="guide-item" data-bs-toggle="modal" data-bs-target="#videoModal2">
                            <h3>2. Descarga modelos 3D</h3>
                            <p>Una vez que hayas creado tu obra maestra, es hora de llevarla al siguiente nivel. En este tutorial, descubrirás cómo descargar tus modelos 3D, listos para ser utilizados en tus proyectos o compartidos con el mundo. ¡Prepárate para ver tu trabajo brillar en cualquier plataforma!</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="guide-item" data-bs-toggle="modal" data-bs-target="#videoModal3">
                            <h3>3. Carga tus modelos 3D</h3>
                            <p>"¿Tienes modelos que deseas compartir con la comunidad? Este tutorial te enseñará a cargar tus creaciones en nuestra plataforma de manera sencilla y rápida. Aprende a optimizar tus archivos y a asegurarte de que tus modelos estén listos para ser explorados y utilizados por otros. ¡Es tu momento de brillar!".</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="guide-item" data-bs-toggle="modal" data-bs-target="#videoModal4">
                            <h3>4. Visualiza tus modelos 3D</h3>
                            <p> "La visualización es clave para apreciar cada detalle de tus modelos 3D. En este tutorial, te mostraremos cómo utilizar nuestras herramientas de visualización para explorar tus creaciones desde diferentes ángulos y perspectivas. Descubre cómo resaltar las características de tus diseños y hacer que cobren vida en la pantalla.".</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<!-- Sección de Contacto -->
<section class="contact-section vh-100 d-flex flex-column justify-content-center align-items-center" id="contacto">

    <div class="form-container">
        <div class="text-center">
            <h2 class="form-title">Contáctanos</h2>
            <h3 class="section-subheading text-muted">Estamos aquí para ayudarte.</h3>
        </div>
       <form action="{{ route('enviar.contacto') }}" method="POST">
    @csrf
    <div class="row align-items-stretch mb-5">
        <div class="col-md-6">
            <input name="nombre" class="form-control form-control-lg mb-3" type="text" placeholder="Tu Nombre *" required>
            <input name="correo" class="form-control form-control-lg mb-3" type="email" placeholder="Tu Correo *" required>
            <input name="telefono" class="form-control form-control-lg mb-3" type="tel" placeholder="Tu Teléfono *" required>
        </div>
        <div class="col-md-6">
            <textarea name="mensaje" class="form-control form-control-lg" rows="8" placeholder="Tu Mensaje *" required></textarea>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-primary btn-lg" type="submit">Enviar Mensaje</button>
    </div>
</form>
    </div>
</section>

        <!-- Testimonial section-->
        <div class="testimonial">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-10 col-xl-7">
                        <div class="text-center">
                            <div class="fs-4 mb-4 fst-italic">"Gracias por ser parte de la comunidad World3D. Cada uno de ustedes impulsa nuestra misión de transformar ideas en modelos tridimensionales. Este software es el resultado de pasión y dedicación, pero su verdadero valor lo aportan ustedes al utilizarlo y llevar sus creaciones al siguiente nivel. ¡Sigamos dando forma al futuro juntos!"</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="rounded-circle me-3 logo" src="{{ asset('/img/logo.PNG')}}" alt="Fundadores" />
                                <div class="fw-bold">
                                    Juan Vaquiro & Omar Juliao
                                    <span class="fw-bold text-primary mx-1">/</span>
                                    Fundadores Del Software 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright © Your Website 2023</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="{{ route('privacidad') }}">Política de Privacidad</a>
                        <span class="text-white mx-1">·</span>
                        <a class="link-light small" href="{{ route('terminos') }}">Terminos y condiciones</a>
                        <span class="text-white mx-1">·</span>
                        <a class="link-light small" href="#contacto">contacto</a>
                    </div>
                </div>
                <div class="row mt-3 justify-content-center">
      <div class="col-auto">
        <a href="https://www.facebook.com/tuempresa" class="text-white me-3" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/tuempresa" class="text-white me-3" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="https://www.tiktok.com/@world3d_model" class="text-white me-3" target="_blank" title="TikTok"><i class="fab fa-tiktok"></i></a>
        <a href="https://www.youtube.com/@World3D-e1b" class="text-white me-3" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
        <a href="https://mail.google.com/mail/u/3/#inbox" class="text-white" title="Correo"><i class="fas fa-envelope"></i></a>
      </div>
    </div>
            </div>
        </footer>

    </main>
      

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 

  <!-- Vendor JS Files -->
  <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('/js/main.js') }}"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        const imagenes = document.querySelectorAll('img');

        imagenes.forEach(img => {
            const container = document.createElement('div');
            container.classList.add('image-container');

            const loader = document.createElement('div');
            loader.classList.add('loader');

            img.parentNode.insertBefore(container, img);
            container.appendChild(loader);
            container.appendChild(img);

            img.addEventListener('load', () => {
                container.classList.add('loaded');
                img.style.display = 'block';
            });
            if (img.complete) {
                img.dispatchEvent(new Event('load'));
            }
        });
    });
</script>
</body>
<script>
  fetch('/registrar-visita/landing_page')
      .then(res => res.json())
      .then(data => console.log('Visita registrada:', data))
      .catch(err => console.error('Error al registrar visita:', err));
</script>
</html>