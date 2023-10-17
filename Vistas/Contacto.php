<?php
require_once ("../includes/_db.php");
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Doña Hilda Tapas and Grill</title>
        <link rel="icon" href="../assets/Imagenes/Logo.png">

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="../startbootstrap-sb-admin-2-gh-pages/css/dashboard.css" rel="stylesheet">

    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light nav-dashboard topbar mb-4 static-top shadow">

                    <ul>
                        <li><a class="navbar-link scrollto" href="../Index.php">Inicio</a></li>
                        <li><a class="navbar-link scrollto" href="Nosotros.php">Nosotros</a></li>
                        <li><a class="navbar-link scrollto" href="Menu.php">Menu</a></li>
                        <li><a class="navbar-link scrollto" href="Reservas.php">Reserva</a></li>
                        <li><a class="navbar-link scrollto" href="Contacto.php">Contacto</a></li>
                    </ul>
                    <a class="btn-book-a-table" href="#book-a-table">Iniciar Sesión</a>

                    </nav>
                    <!-- End of Topbar -->
                    
            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
                <div class="container" data-aos="fade-up">
                    <div class="row">

                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Ubicación:</h4>
                                <p>Santome, Esq. 16 De Agosto, Baní 94000</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Correo:</h4>
                                <p>donahildabani@gmail.com</p>
                            </div>

                            <div class="Telefono">
                                <i class="bi bi-phone"></i>
                                <h4>Telefono:</h4>
                                <p>+1 809-522-5146</p>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15154.1395834592!2d-70.3335576!3d18.2771309!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ea54f0ac5c34d01%3A0x6f86dcf823593705!2sDo%C3%B1a%20Hilda%20Tapas%20%26%20Grill!5e0!3m2!1ses!2sdo!4v1695340721703!5m2!1ses!2sdo" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="../includes/validarcontacto.php" method="POST" class="php-email-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="css-label"><b>Nombre Completo:</b></label>
                                    <input type="text" name="Nombre"  id="Nombre" style="border-radius: 20px;" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name" class="css-label"><b>Correo:</b></label>
                                    <input type="text" name="Correo" id="Correo"  class="form-control" style="border-radius: 20px;" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="css-label"><b>Asunto:</b></label>
                                <input type="text" class="form-control" style="border-radius: 20px;" name="Asunto" id="Asunto" required>
                            </div>
                            <div class="form-group">
                                <label for="name" class="css-label"><b>Mensaje:</b></label>
                                <textarea class="form-control" style="border-radius: 20px;" name="Mensaje" id="Mensaje"  rows="10" required></textarea>
                            </div>
                            <input type="submit" value="Enviar" id="guardar" class="btn-guardar" name="guardar">
                        </form>
                    </div>

                    </div>

                </div>
            </section><!-- End Contact Section -->

                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- ======= Footer ======= -->
        <br>
        <footer id="footer" class="footer">

<div class="container">

<div class="row gy-3">
    <div class="col-lg-3 col-md-6 d-flex">
    <i class="bi bi-geo-alt icon"></i>
    
    <div>
        <h4>Direccion</h4>
        <p>
        Santome #49 <br>
        Esq. 16 de Agosto, Baní Peravia<br>
        </p>
    </div>

    </div>

    <div class="col-lg-3 col-md-6 footer-links d-flex">
    <i class="bi bi-telephone icon"></i>
    <div>
        <h4>Reservaciones</h4>
        <p>
        <strong>Telefono:</strong> +1 809-522-5146<br>
        <strong>Email:</strong> Donahildabani@gmail.com<br>
        </p>
    </div>
    </div>

    <div class="col-lg-3 col-md-6 footer-links d-flex">
    <i class="bi bi-clock icon"></i>
    <div>
        <h4>Horarios</h4>
        <p>
        <strong>Lunes-Domingos: 8AM - 11PM<br></strong>
        
        </p>
    </div>
    </div>

    <div class="col-lg-3 col-md-6 footer-links">
    <h4>Siguenos</h4>
    <div class="social-links d-flex">
        <a href=" https://www.facebook.com/DonaHildaBani?mibextid=ZbWKwL" class="facebook"><i class="fa fa-facebook" ></i></a>
        <a href="https://instagram.com/donahildabani?igshid=MmU2YjMzNjRlOQ==" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href=" https://api.whatsapp.com/message/XV75XSG4HTO2J1?autoload=1&app_absent=0" class="whatsapp"><i class="fa fa-whatsapp"></i></a>



    </div>
    </div>

</div>
</div>

<div class="container">
<div class="copyright">
    &copy; Copyright <strong><span>Doña Hilda Tapas and Grill</span></strong>. All Rights Reserved
</div>

</div>

</footer><!-- End Footer -->


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