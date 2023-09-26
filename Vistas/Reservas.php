<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Doña Hilda Tapas and Grill</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <!-- Template Main CSS File -->
        <link href="../assets/css/style.css" rel="stylesheet">
        <link rel="icon" href="../Imagenes/Logo.png">
    </head>

    <body>

        <br>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top " style="background-color: #FFEC6F">
            <div class="container d-flex align-items-center">
                <h1 class="logo me-auto"><a href="index.html"> <img src="../Imagenes/Logo.png"></a></h1>
                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto" href="../Index.php">Inicio</a></li>
                        <li><a class="nav-link scrollto" href="Nosotros.php">Nosotros</a></li>
                        <li><a class="nav-link scrollto" href="Menu.php">Menu</a></li>
                        <li><a class="nav-link scrollto" href="Reservas.php">Reserva</a></li>
                        <li><a class="nav-link   scrollto" href="Contacto.php">Contacto</a></li>
                        <li><a class="getstarted scrollto" href="#about">Iniciar Sesión</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->
            </div>
        </header>
        <!-- End Header -->

        <main id="main">

            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
                <div class="container" data-aos="fade-up">
                    <br>
                    <div class="section-title">
                      <h2>Reserva</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-15 mt-5 mt-lg-0 d-flex align-items-stretch">
                            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name"><b>Nombre Completo:</b></label>
                                        <input type="text" name="name" class="form-control" id="name" required Placeholder="Ingrese su nombre">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name"><b>Correo:</b></label>
                                        <input type="email" class="form-control" name="email" id="email" required Placeholder="Ingrese su correo electronico">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name"><b>Celular:</b></label>
                                        <input type="email" class="form-control" name="email" id="email" required  Placeholder="Ingresar numero de celular">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name"><b>Cantidad de personas:</b></label>
                                        <input type="number" class="form-control" name="email" id="email" required  Placeholder="Ingresar cantidad de personas">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name"><b>Fecha:</b></label>
                                        <input type="date" class="form-control" name="fecha" id="fecha" required  Placeholder="dd/mm/aa">
                                        
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name"><b>Hora:</b></label>
                                        <select class="form-control" name="Hora" id="Hora" required>
                                            <option value="" >Seleccione la hora</option >
                                            <option value="10:00 AM" >10:00 AM </option >
                                            <option value="11:00 AM">11:00 AM </option >
                                            <option value="12:00 PM">12:00 PM </option >
                                            <option value="01:00 PM">01:00 PM </option >
                                            <option value="02:00 PM">02:00 PM </option >
                                            <option value="03:00 PM">03:00 PM </option >
                                            <option value="04:00 PM">04:00 PM </option >
                                            <option value="05:00 PM">05:00 PM </option >
                                            <option value="06:00 PM">06:00 PM </option >
                                            <option value="07:00 PM">07:00 PM </option >
                                            <option value="08:00 PM">08:00 PM </option >
                                            <option value="09:00 PM">09:00 PM </option >
                                            <option value="10:00 PM">10:00 PM </option >
                                        </select>
  
                                </div>
                                <div class="form-group col-md-6">
                                        <label for="name"><b>Tipo de Evento:</b></label>
                                        <select class="form-control" name="Hora" id="Hora" required>
                                            <option value="" >Seleccione el tipo de evento</option>
                                            <option value="Reservar normal" >Reservar normal </option>
                                            <option value="Cumpleaños">Cumpleaños </option>
                                            <option value="Boda">Boda </option>
                                            <option value="Reunion">Reunion</option >
                                        </select>
                                </div>
                                <div class="form-group col-md-6">
                                        <label for="name"><b>Area de reservacion:</b></label>
                                        <select class="form-control" name="Hora" id="Hora" required>
                                            <option value="" >Seleccione area de reservacion</option>
                                            <option value="Sala VIP" >Sala VIP </option>
                                            <option value="Terraza">Terraza</option>

                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="name"><b>Descripcion de la reservacion</b></label>
                                    <textarea class="form-control" name="message" rows="10" required Placeholder="Ingresar la descripcion de la reserva"></textarea>
                                </div>
                                <div class="my-3">
                                    <div class="loading">Cargando</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Solicitud de reserva enviada</div>
                                </div>
                                <div class="text-center" ><button type="submit" style="background-color: #FFEC6F; color: black"><b>Reservar</b></button></div>
                                
                            </form>
                        </div>

                    </div>

                </div>
            </section>
            <!-- End Contact Section -->

            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-6 footer-contact">
                        <h3>Doña Hilda Tapas and Grill</h3>
                        <p>
                        A108 Adam Street <br>
                        New York, NY 535022<br>
                        United States <br><br>
                        <strong>Phone:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>
                                
                    <div class="col-lg-6 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                        <div class="social-links mt-3">
                        <a href="https://api.whatsapp.com/message/XV75XSG4HTO2J1?autoload=1&app_absent=0" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                        <a href="https://www.facebook.com/DonaHildaBani?mibextid=ZbWKwL" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="https://instagram.com/donahildabani?igshid=MmU2YjMzNjRlOQ==" class="instagram"><i class="bx bxl-instagram"></i></a>
                        </div>
                    </div>

                </div>
            </div>

        </main>
        <!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="container footer-bottom clearfix">
                <div class="copyright">
                    &copy; Copyright <strong><span>Doña Hilda Tapas and Grill</span></strong>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- Vendor JS Files -->
        <script src="../assets/vendor/aos/aos.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="../assets/vendor/php-email-form/validate.js"></script>
        <script src="../assets/js/main.js"></script>
        
    </body>
</html>