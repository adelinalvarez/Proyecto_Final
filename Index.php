<!DOCTYPE html>
<html lang="es">
    <head>

        <title>Doña Hilda Tapas and Grill</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <!-- Carrusel -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <link href="assets/css/style.css" rel="stylesheet">
        <link rel="icon" href="Imagenes/Logo.png">
        <style>
        /* Estilos para el carrusel */
        .carousel {
            width: 100%;
            height: 100vh; /* Pantalla completa */
        }

        .carousel-inner {
            height: 100%;
        }

        .carousel-item {
            height: 100%;
            background-size: cover;
            background-position: center;
            margin:0;
            padding:0;
          
        }

        /* Estilos para el contenido de las diapositivas */
        .carousel-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        
        }
       

        h2 {
            font-size: 2.5rem;
        }

        p {
            font-size: 1.5rem;
        }
    </style>
    
    </head>

    <body>
        <br>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top " style="background-color: #FFEC6F">
            <div class="container d-flex align-items-center">
                <h1 class="logo me-auto"><a href="index.html"> <img src="Imagenes/Logo.png"></a></h1>
                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto" href="Index.php">Inicio</a></li>
                        <li><a class="nav-link scrollto" href="Vistas/Nosotros.php">Nosotros</a></li>
                        <li><a class="nav-link scrollto" href="Vistas/Menu.php">Menu</a></li>
                        <li><a class="nav-link scrollto" href="Vistas/Reservas.php">Reserva</a></li>
                        <li><a class="nav-link   scrollto" href="Vistas/Contacto.php">Contacto</a></li>
                        <li><a class="getstarted scrollto" href="#about">Iniciar Sesión</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->
            </div>
        </header>
        <!-- End Header -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Diapositivas del Carrusel -->
        <div class="carousel-inner">
            <!-- Diapositiva 1 -->
            <div class="carousel-item active">
                <img src="Imagenes/Local/Nosotros.jpeg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-content">
                    <h2>Diapositiva 1</h2>
                    <p>Contenido de la primera diapositiva.</p>
                </div>
            </div>

            <!-- Diapositiva 2 -->
            <div class="carousel-item">
                <img src="Imagenes/Local/Nosotros.jpeg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-content">
                    <h2>Diapositiva 2</h2>
                    <p>Contenido de la segunda diapositiva.</p>
                </div>
            </div>

            <!-- Diapositiva 3 -->
            <div class="carousel-item">
                <img src="Imagenes/Local/Nosotros.jpeg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-content">
                    <h2>Diapositiva 3</h2>
                    <p>Contenido de la tercera diapositiva.</p>
                </div>
            </div>
        </div>

        <!-- Controles del Carrusel -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <!-- Scripts de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript para carrusel automático -->
    <script>
        $(document).ready(function() {
            // Iniciar el carrusel y configurar la transición
            $('#myCarousel').carousel({
                interval: 5000, // Cambia la imagen cada 5 segundos (5000 ms)
                pause: false, // No pausar en interacción del usuario
                wrap: true // Vuelve al principio después de la última diapositiva
            });
        });
    </script>

    </script>
        <section class="popular">

            <div class="popular-content container">
                <h2>Un espacio para compratir  y pasar lindos momentos</h2>

                <p>Doña Hilda Tapas and Grill, cuenta con una terraza al aire libre y también con un espacio más privado con un área cerrada con aire acondicionado brinda comodidad sin sacrificar la atmósfera con luces tenues y la decoración cuidadosamente elegida que crean un ambiente elegante y acogedor, este lugar es perfecto para cenas más formales, reuniones especiales, también tiene la opción de bufé y la opción a la carta inspiradas en la cocina dominicana y sabores españoles. también cuenta con el mini bar ofrece una selección de cócteles y bebidas para acompañar la experiencia. !</p>
                <div class="popular-pl">
                    <div class="popular-1">
                        <img src="Doña Hilda/Local/Airelibre.jpeg" alt="">
                        <h3>Al aire libre</h3>
                        <p>
                            ipsum, dolor sit amet consectetur ad
                        </p>
                    </div>

                    <div class="popular-1">
                        <img src="Doña Hilda/Local/Privado.jpeg" alt="">
                        <h3>Un espacio mas privado</h3>
                        <p>
                            ipsum, dolor sit amet consectetur adi
                        </p>
                    </div>

                    <div class="popular-1">
                        <img src="Doña Hilda/Local/HildaExpress.jpeg" alt="">
                        <h3>Hilda Express </h3>
                        <p>
                            ipsum, dolor sit amet consectetur ad
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <section class="about">

            

            <div class="about-content container">
                <div class="about-img">
                    <img src="Doña Hilda/Local/Nosotros.jpeg" alt="">
    
                </div>
    
                <div class="about-txt">
                    <h2>Nosotros</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam et exercitationem soluta ab neque omnis rerum temporibus nobis, quaerat cum tenetur, quae aliquid velit laudantium labore quisquam, consequuntur molestias excepturi?</p>
                    <a href="#" class="btn-1">Informacion</a>
    
                </div>
            </div>
            
            
        </section>

        <section class="number">

            <div class="number-container container">
                <h2>Menu</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, maiores adipisci ab minima eius obcaecati totam cum quasi sint animi numquam iste recusandae eos odit molestiae eaque cupiditate aliquid fugit.</p>

                <div class="number-box">
                    <div class="number-circle">
                    
                        <a href="Menu.html"> A la carta</a>
                    </div>

                    <div class="number-circle">
                        <a href="Menu.html">Bebidas</a>
                      
                    </div>

                    <div class="number-circle">
                        <a href="Menu.html">Buffet</a>
                       
                    </div>

                </div>
            </div>
        </section>

        <section class="contact">

            <div class="contact-content container">
                <h2>Contacto</h2>
                <p>Lorem ip.</p>

                <form>
                    <input type="text" placeholder="Escriba su correo aqui">
                    <input type="submit" value="Enviar" class="btn-2">
                </form>
            </div>
        </section>
        <footer class="footer">
            <div class="footer-content container">
                <div class="link">
                    <h3>Redes sociales</h3>
                    <ul>
                        <li><a href="https://instagram.com/donahildabani?igshid=MmU2YjMzNjRlOQ==">Instagram</a></li>
                        <li><a href="https://api.whatsapp.com/message/XV75XSG4HTO2J1?autoload=1&app_absent=0
                            ">WhatsApp</a></li>
                        <li><a href="https://www.facebook.com/DonaHildaBani?mibextid=ZbWKwL">Facebook</a></li>
                    </ul>
                </div>
            </div>
        </footer>
</body>
</html>
