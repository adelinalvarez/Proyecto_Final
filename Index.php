<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="imagenes/Logo.webp">
        <!-- carousel -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- MDB - Nav -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link href="css/style.css" rel="stylesheet">
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
        <title>Doña Hilda Tapas and Grill</title>
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-black nav-height">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2" href="Index.php">
                    <img src="imagenes/Logo-Hilda.webp" height="40"style="margin-top: -1px;"/>
                    <a class="nav-link" href="Index.php" style= "color: white">Doña Hilda Tapas and Grill</a>
                </a>

                <!-- Toggle button -->
                <button class="navbar-toggler" 
                    type="button" 
                    data-mdb-toggle="collapse" 
                    data-mdb-target="#navbarButtonsExample"
                    aria-controls="navbarButtonsExample"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars" style="color:white"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarButtonsExample" >
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        </li>
                    </ul>
                    <!-- Left links -->

                    <div class="d-flex align-items-center justify-content-center w-auto nav-items-responsive">
                        <a class="nav-link p-2 EfectoSombra" href="Index.php">Inicio</a>
                        <a class="nav-link p-2 EfectoSombra" href="vistas/Nosotros.php">Nosotros</a>
                        <a class="nav-link p-2 EfectoSombra" href="vistas/Menu.php">Menu</a>
                        <a class="nav-link p-2 EfectoSombra" href="vistas/Reservas.php">Reserva</a>
                        <a class="nav-link p-2 EfectoSombra" href="vistas/Contacto.php">Contacto</a>

                        <a class="BotonIniciar" type="button" href="vistas/login.php"> Iniciar Sesión </a>
                    </div>
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
           <!-- ======= Carousel Section ======= -->
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <a class="BotonEnlaces nosotros-index" type="button" href="vistas/nosotros.php">Conocenos</a>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="imagenes/Local/Privado4.webp" class="d-block w-100 img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/Local/Hilda_Express1.webp" class="d-block w-100 img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/Local/BarAmplia1.webp" class="d-block w-100 img-fluid" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
                <main>
                    <section class="section slider-section">
                    <div class="container slider-column">
                    <h1 class="focus-in-expand text-center"> ¡Revisa nuestro menu! </h1>
                            <div class="swiper swiper-slider">
                                <div class="swiper-wrapper">
                                    <img class="swiper-slide" src="imagenes/Comida/Penne_ala_marinera.webp" alt="Swiper" style="max-width: 100%; height: auto; max-height: 250px;">
                                    <img class="swiper-slide" src="imagenes/Comida/Mero.webp" alt="Swiper" style="max-width: 100%; height: auto; max-height: 250px;">
                                    <img class="swiper-slide" src="imagenes/Comida/Candita_de_lambi.webp" alt="Swiper" style="max-width: 100%; height: auto; max-height: 250px;">
                                    <img class="swiper-slide" src="imagenes/Comida/Mofonguitos.webp" alt="Swiper" style="max-width: 100%; height: auto; max-height: 250px;">
                                    <img class="swiper-slide" src="imagenes/Comida/filete2.webp" alt="Swiper" style="max-width: 100%; height: auto; max-height: 250px;">
                                    <img class="swiper-slide" src="imagenes/Comida/Mariscos.webp" alt="Swiper"  style="max-width: 100%; height: auto; max-height: 250px;">
                                    <img class="swiper-slide" src="imagenes/Comida/Carbonada.webp" alt="Swiper"  style="max-width: 100%; height: auto; max-height: 250px;">
                                    <img class="swiper-slide" src="imagenes/Comida/Canasticas1.webp" alt="Swiper"  style="max-width: 100%; height: auto; max-height: 250px;">
                                    <img class="swiper-slide" src="imagenes/Comida/Mofongo.webp" alt="Swiper"  style="max-width: 100%; height: auto; max-height: 250px;">
                                </div>
                                <br>
                                    <div class="swiper-pagination"></div>
                                <br> 
                            </div>
                            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                                <a class="BotonEnlaces" type="button" href="vistas/menu.php"> Ver menu </a>
                            </div>
                            <br>
                    </div>
                    </section>
                </main>

        <!-- Enlaza la librería de Swiper -->
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
            <script>
                const swiper = new Swiper(".swiper-slider", {
                centeredSlides: true,
                slidesPerView: 1,
                grabCursor: true,
                freeMode: false,
                loop: true,
                mousewheel: false,
                keyboard: {
                    enabled: true
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false
                },
                pagination: {
                    el: ".swiper-pagination",
                    dynamicBullets: false,
                    clickable: true
                },
                breakpoints: {
                    640: {
                    slidesPerView: 1.25,
                    spaceBetween: 20
                    },
                    1024: {
                    slidesPerView: 2,
                    spaceBetween: 20
                    }
                }
                });
            </script>

            <div style="background-color: black; color:white">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <br>
                            <h1 class="focus-in-expand text-center color-white"> ¡Ven y comparte!</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7" style="font-size: 30px">
                            <br>
                            Realiza tus reservaciones para cualquier tipo de evento importante.
                            <div style="font-size: 15px">
                                <br>
                                <a class="BotonEnlaces" type="button" href="vistas/reservas.php"> Reserva Ahora </a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <img src="imagenes/Local/Privado2.webp" class="img-fluid mb-3 rounded" alt="">
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <br>
                        <h1 class="focus-in-expand text-center color-white"> ¡Contáctate con nosotros!</h1>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-5">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15154.1395834592!2d-70.3335576!3d18.2771309!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ea54f0ac5c34d01%3A0x6f86dcf823593705!2sDo%C3%B1a%20Hilda%20Tapas%20%26%20Grill!5e0!3m2!1ses!2sdo!4v1695340721703!5m2!1ses!2sdo" frameborder="0" style="border:0; width: 100%; height: 290px; border-radius: 15px;" allowfullscreen></iframe>
                    </div>

                    <div class="col-md-7" style="font-size: 40px">
                        <p style="color: black;">
                            Estamos Ubicados en la calle Santome, esquina 16 de agosto.
                            Baní, provincia Peravia.
                        </p>
                        <div style="font-size: 15px">
                            <br>
                            <a class="BotonEnlaces" type="button" href="vistas/contacto.php"> Contáctate Ahora </a>
                        </div>
                    </div>
                </div>
            </div>
            <br>

        <!-- Footer -->
        <footer class="text-center text-lg-start bg-black text-muted p-1"  >         

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5" style="color:white">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4" >
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4" >
                                <i class="bi bi-geo-alt icon me-1 text-secondary"></i>Dirección
                            </h6>
                            <p>
                                Santome #49 
                                Esq. 16 de Agosto, Baní Peravia
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="bi bi-telephone icon me-3 text-secondary"></i>Reservaciones
                            </h6>
                            <p>
                                Telefono +1 809-522-5146 <br>
                                Email: Donahildabani@gmail.com                            
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="bi bi-clock icon me-3 text-secondary"></i>Horarios
                            </h6>
                            <p>
                               Lunes a Domingos: 8:00AM - 11:00PM
                            </p>
                        </div>
                        <!-- Grid column -->

                       <!-- Grid column -->
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 text-center">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">Siguenos</h6>
                                <a href="https://www.facebook.com/DonaHildaBani?mibextid=ZbWKwL" class="facebook mb-2"><i class="bi bi-facebook text-white"></i></a>
                                <a href="https://instagram.com/donahildabani?igshid=MmU2YjMzNjRlOQ==" class="instagram mb-2"><i class="bi bi-instagram text-white"></i></a>
                                <a href="https://api.whatsapp.com/message/XV75XSG4HTO2J1?autoload=1&app_absent=0" class="whatsapp"><i class="bi bi-whatsapp text-white"></i></a>
                            </div>
                        <!-- Grid column -->

                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4"  style="color:white">
                &copy; Copyright <strong><span>Doña Hilda Tapas and Grill</span></strong>. All Rights Reserved
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->  
        
        
    </body>
</html>

