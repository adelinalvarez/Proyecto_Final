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
        
    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">

                    <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #1f1f24; position: fixed; width: 100%; z-index: 999">
                            <div class="d-flex justify-content-start">
                                <img src ="../assets/Imagenes/Logo.png" style="width: 28px; height: 25px;">
                                <a href="Index.php" class="navbar-brand" style="color: white">Doña Hilda Tapas and Grill</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li>
                                            <a class="nav-link" href="../Index.php">Inicio</a></li>
                                        <a class="nav-link" href="Nosotros.php">Nosotros</a>
                                        <a class="nav-link" href="Menu.php">Menu</a>
                                        <a class="nav-link" href="Reservas.php">Reserva</a>
                                        <a class="nav-link" href="Contacto.php">Contacto</a>
                                        </li>

                                    </ul>

                                    <a class="button" href="login.php" style="background-color:#ffffff; color: black; border-radius: 30px; padding: 08px 10px;">Iniciar Sesión</a>

                                </div>
                            </div>

                        </nav>
                        <!-- Navbar -->
                        <br>
                        <br>
                        <br>
                    <!-- ======= Menu Section ======= -->
                    <section id="Menu" class="Menu">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 d-flex align-items-center container-lg my-15" style="">
                            <?php
                            $conexion=$GLOBALS['conex'];
                            $fila = null;
                            $SQL=mysqli_query($conexion,"SELECT productos.Id, productos.Nombre, productos.Descripcion, productos.Categoria, productos.Precio, productos.Imagen FROM productos");
                            while($fila=mysqli_fetch_assoc($SQL)):
                                ?>
                                   <div class="col p-2 ">
                                       <div class="card ml-4 shadow" style="width: 18rem;">
                                           <img src="<?php echo $fila['Imagen']?>" class="card-img-top" alt="...">
                                           <div class="card-body">
                                               <h5 class="card-title css-label text-center"><?php echo $fila['Nombre']?></h5>
                                               <p class="card-text text-center"><?php echo $fila['Descripcion']?></p>
                                               <p class="card-text text-center"><?php echo $fila['Precio']?></p>
                                               <a href="#" class="btn btn-primary">Añadir al Carrito</a>
                                               <a href="#" class="carrito"><i class="bi bi-cart-check-fill"></i></a>
                                           </div>
                                       </div>
                                   </div>
                            <?php endwhile;?>
                        </div>
                    </section>
                    <!-- End Menu Section -->

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