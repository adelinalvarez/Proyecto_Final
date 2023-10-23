<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Doña Hilda Tapas and Grill</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link rel="icon" href="assets/Imagenes/Logo.png">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="../assets/css/veamos.css" rel="stylesheet">
    <!-- MDB - Nav -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
    
  </head>

  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-black">
      <!-- Container wrapper -->
      <div class="container">
          <!-- Navbar brand -->
          <a class="navbar-brand me-2" href="Index.php">
              <img src="assets/Imagenes/Logo-Hilda.png" height="40"style="margin-top: -1px;"/>
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
                  <a class="nav-link" href="Index.php" style= "color: white">Doña Hilda Tapas and Grill</a>
                  </li>
              </ul>
              <!-- Left links -->

              <div class="d-flex align-items-center">
                  <a class="nav-link" href="Index.php">Inicio</a>
                  <a class="nav-link" href="Vistas/Nosotros.php">Nosotros</a>
                  <a class="nav-link" href="Vistas/Menu.php">Menu</a>
                  <a class="nav-link" href="Vistas/Reservas.php">Reserva</a>
                  <a class="nav-link" href="Vistas/Contacto.php">Contacto</a>
                  <a type="button" href="Vistas/login.php" style="background-color:#ffffff; color: black; border-radius: 30px; padding: 08px 10px;"> Iniciar Sesión </a>
              </div>
          </div>
          <!-- Collapsible wrapper -->
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <!-- ======= Carousel Section ======= -->
      <section style="background-size: 100% 100%; background-repeat: no-repeat; min-height: 600px;">
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/Imagenes/Local/Privado2.jpg" alt="Los Angeles" class="d-block" style="width:100%">
                </div>

                <div class="carousel-item">
                    <img src="assets/Imagenes/Local/Privado2.jpg" alt="Chicago" class="d-block" style="width:100%">
                </div>

                <div class="carousel-item">
                    <img src="assets/Imagenes/Local/Privado2.jpg" alt="New York" class="d-block" style="width:100%">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        
     </section>
        <!-- End Carousel -->  

    <main id="main">

      <!-- ======= Gallery Section ======= -->
      <section id="gallery" class="hero gallery" >
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Platillos</h2>
            <p>Ver <span>Nuestro Menu</span></p>
          </div>

          <div class="gallery-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/Imagenes/Comida/Mero.jpeg"><img src="assets/Imagenes/Comida/Mero.jpeg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/Imagenes/Comida/Plato_del_dia1.jpeg"><img src="assets/Imagenes/Comida/Plato_del_dia1.jpeg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/Imagenes/Comida/Candita_de_lambi.jpeg"><img src="assets/Imagenes/Comida/Candita_de_lambi.jpeg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/Imagenes/Comida/Canasticas1.jpeg"><img src="assets/Imagenes/Comida/Canasticas1.jpeg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/Imagenes/Comida/Pollo_Relleno.jpeg"><img src="assets/Imagenes/Comida/Pollo_Relleno.jpeg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/Imagenes/Comida/Salmon_blanco.jpeg"><img src="assets/Imagenes/Comida/Salmon_blanco.jpeg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/Imagenes/Comida/Mofonguitos.jpeg"><img src="assets/Imagenes/Comida/Mofonguitos.jpeg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/Imagenes/Comida/Salmon.jpeg"><img src="assets/Imagenes/Comida/Salmon.jpeg" class="img-fluid" alt=""></a></div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="text-center" data-aos="fade-up" data-aos-delay="200">
            <a href="#book-a-table" class="btn-book-a-table "> Ver Menu </a>
          </div>
        </div>
      </section>
      <!-- End Gallery Section -->

      <!-- ======= Hero Section ======= -->
      <section class="hero d-flex align-items-center" style="background-color: black;">
        <div class="container">
          <div class="row justify-content-between gy-5">
            <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
              <img src="assets/Imagenes/reserve.jpeg" style="width: 350px; height: 350px;">
            </div>
            <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
              <h2 data-aos="fade-up">Ven y comparte<br>Reserva Ahora</h2>
              <p data-aos="fade-up" data-aos-delay="100">Realiza tus reservaciones para esos eventos importantes...</p>
              <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                <a href="#book-a-table" class="btn-book-a-table">Reservar</a>
              </div>
            </div>
            
          </div>
        </div>
      </section>
      <!-- End Hero Section -->

      <!-- ======= Hero Section ======= -->
      <section class="hero d-flex align-items-center" style="background-color: white;">
        <div class="container">
          <div class="row justify-content-between gy-5">
            <div class="col-lg-5 order-2 order-lg-1 text-center text-lg-start">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15154.1395834592!2d-70.3335576!3d18.2771309!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ea54f0ac5c34d01%3A0x6f86dcf823593705!2sDo%C3%B1a%20Hilda%20Tapas%20%26%20Grill!5e0!3m2!1ses!2sdo!4v1695340721703!5m2!1ses!2sdo" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
              <h2 data-aos="fade-up">Conctate con Nosotros<br></h2>
              <p data-aos="fade-up" data-aos-delay="100">Estamos Ubicados en la calle Santome, esquina 16 de agosto, En Baní Provincia Peravia.</p>
              <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                <a href="#book-a-table" class="btn-book-a-table">Contactos</a>
              </div>
            </div>
            
          </div>
        </div>
      </section>
      <!-- End Hero Section -->
      

    </main><!-- End #main -->

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

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

  </body>

</html>