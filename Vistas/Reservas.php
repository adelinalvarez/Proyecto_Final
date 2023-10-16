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

        </main>
        <!-- End #main -->

         <!-- ======= Footer ======= -->
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
                        <a href=" https://www.facebook.com/DonaHildaBani?mibextid=ZbWKwL" class="facebook"><i class="bi bi-facebook"></i></a>
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