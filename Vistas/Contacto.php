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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous" ></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Template Main CSS File -->
        <link href="../assets/css/style.css" rel="stylesheet">
        <link rel="icon" href="../Imagenes/Logo.png">
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- Vendor CSS Files -->
        <!-- Template Main CSS File -->
        <link href="../assets/css/main.css" rel="stylesheet">

    </head>

    <body>
        <br>
        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">
                <a href="../index.php" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h4 class="logo me-auto"><a href="../index.php"> <img src="../assets/Imagenes/Logo.png"> Doña Hilda Tapas and Grill </a></h4>
                </a>

                <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="../Index.php">Inicio</a></li>
                    <li><a class="nav-link scrollto" href="Nosotros.php">Nosotros</a></li>
                    <li><a class="nav-link scrollto" href="Menu.php">Menu</a></li>
                    <li><a class="nav-link scrollto" href="Reservas.php">Reserva</a></li>
                    <li><a class="nav-link   scrollto" href="Contacto.php">Contacto</a></li>
                </ul>
                </nav><!-- .navbar -->

                <a class="btn-book-a-table" href="#book-a-table">Iniciar Sesión</a>
                <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
                <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

            </div>
        </header>
        <!-- End Header -->

        <main id="main">

            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
                <div class="container" data-aos="fade-up">
                    <br>
                    <div class="section-title">
                      <h2>Contáctanos</h2>
                    </div>

                    <div class="row">

                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Ubicación:</h4>
                                <p>16 De Agosto Esq, Baní 94000</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Correo:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="Telefono">
                                <i class="bi bi-phone"></i>
                                <h4>Telefono:</h4>
                                <p>+1 809-522-4151</p>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15154.1395834592!2d-70.3335576!3d18.2771309!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ea54f0ac5c34d01%3A0x6f86dcf823593705!2sDo%C3%B1a%20Hilda%20Tapas%20%26%20Grill!5e0!3m2!1ses!2sdo!4v1695340721703!5m2!1ses!2sdo" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                            <label for="name"><b>Nombre Completo:</b></label>
                            <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="name"><b>Correo:</b></label>
                            <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name"><b>Asunto:</b></label>
                            <input type="text" class="form-control" name="subject" id="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="name"><b>Mensaje:</b></label>
                            <textarea class="form-control" name="message" rows="10" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Cargando</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Enviado correctamente</div>
                        </div>
                        <div class="text-center" ><button type="submit" style="background-color: #FFEC6F; color: black"><b>Enviar</b></button></div>
                        </form>
                    </div>

                    </div>

                </div>
            </section><!-- End Contact Section -->

        </main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

<div class="container">
<div class="row gy-3">
    <div class="col-lg-3 col-md-6 d-flex">
    <i class="bi bi-geo-alt icon"></i>
    <div>
        <h4>Address</h4>
        <p>
        A108 Adam Street <br>
        New York, NY 535022 - US<br>
        </p>
    </div>

    </div>

    <div class="col-lg-3 col-md-6 footer-links d-flex">
    <i class="bi bi-telephone icon"></i>
    <div>
        <h4>Reservations</h4>
        <p>
        <strong>Phone:</strong> +1 5589 55488 55<br>
        <strong>Email:</strong> info@example.com<br>
        </p>
    </div>
    </div>

    <div class="col-lg-3 col-md-6 footer-links d-flex">
    <i class="bi bi-clock icon"></i>
    <div>
        <h4>Opening Hours</h4>
        <p>
        <strong>Mon-Sat: 11AM</strong> - 23PM<br>
        Sunday: Closed
        </p>
    </div>
    </div>

    <div class="col-lg-3 col-md-6 footer-links">
    <h4>Follow Us</h4>
    <div class="social-links d-flex">
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="whatsapp"><i class="bi bi-whatsapp"></i></a>

    </div>
    </div>

</div>
</div>

<div class="container">
<div class="copyright">
    &copy; Copyright <strong><span>Yummy</span></strong>. All Rights Reserved
</div>
<div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
</div>
</div>

</footer><!-- End Footer -->
<!-- End Footer -->


<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>

        
    </body>
</html>