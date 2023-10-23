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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="../startbootstrap-sb-admin-2-gh-pages/css/dashboard.css" rel="stylesheet">
        <link href="../assets/css/veamos.css" rel="stylesheet">
        
        <!-- MDB - Nav -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
        
    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg navbar-light bg-black">
                        <!-- Container wrapper -->
                        <div class="container">
                            <!-- Navbar brand -->
                            <a class="navbar-brand me-2" href="../index.php">
                                <img src="../assets/Imagenes/Logo-Hilda.png" height="40"style="margin-top: -1px;"/>
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
                            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                                <!-- Left links -->
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                    <a class="nav-link" href="../index.php" style= "color: white">Doña Hilda Tapas and Grill</a>
                                    </li>
                                </ul>
                                <!-- Left links -->

                                <div class="d-flex align-items-center">
                                    <a class="nav-link" href="../Index.php">Inicio</a>
                                    <a class="nav-link" href="Nosotros.php">Nosotros</a>
                                    <a class="nav-link" href="Menu.php">Menu</a>
                                    <a class="nav-link" href="Reservas.php">Reserva</a>
                                    <a class="nav-link" href="Contacto.php">Contacto</a>
                                    <a type="button" href="login.php" style="background-color:#ffffff; color: black; border-radius: 30px; padding: 08px 10px;"> Iniciar Sesión </a>
                                </div>
                            </div>
                            <!-- Collapsible wrapper -->
                        </div>
                        <!-- Container wrapper -->
                    </nav>
                    <!-- Navbar -->
                    
                   <br>
                    <!-- ======= Contact Section ======= -->
                    <section class="contact">

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
                                    <div class="info">

                                        <form  action="../includes/validarcontacto.php" method="POST">
                                            <div>
                                                <label for="Nombre" class="css-label"> Nombre Completo: </label>
                                                <input type="text" id="Nombre" name="Nombre" class="css-input" style= " display: block; width: 100%;" required >
                                            </div>
                                            
                                            <div>
                                                <label for="Correo" class="css-label"> Correo:</label>
                                                <input type="text" id="Correo" name="Correo" class="css-input" style= " display: block; width: 100%;" required >
                                            </div>

                                                                
                                            <div>
                                                <label for="Asunto" class="css-label">Asunto:</label>
                                                <input type="text" id="Asunto" name="Asunto" class="css-input" style= " display: block; width: 100%;" required >
                                            </div>
                                            <div>
                                                <label for="Mensaje" class="css-label">Mensaje:</label>
                                                <textarea id="Mensaje" name="Mensaje" rows="10" class="css-input form-control" required> </textarea>
                                            </div>

                                            <br>

                                            <input type="submit" value="Guardar" id="register" class="btn-guardar" name="registrar">
                                        </form> 
                                    </div>
                                </div>

                            </div>

                        </div>
                    </section>
                    <!-- End Contact Section -->

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
                            <a href=" https://www.facebook.com/DonaHildaBani?mibextid=ZbWKwL" class="facebook"><i class="bi bi-facebook" ></i></a>
                            <a href="https://instagram.com/donahildabani?igshid=MmU2YjMzNjRlOQ==" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href=" https://api.whatsapp.com/message/XV75XSG4HTO2J1?autoload=1&app_absent=0" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
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

        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/aos/aos.js"></script>
        <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

        <!-- Template Main JS File -->
        <script src="../assets/js/main.js"></script>
        
    </body>
</html>