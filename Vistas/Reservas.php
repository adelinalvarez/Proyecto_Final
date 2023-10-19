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
                    
                    <!-- ======= Contact Section ======= -->
                    <section id="contact" class="contact">
                        <br>
                        <div class="container" data-aos="fade-up">
                            <div class="row">
                                <div class="info">
                                    <form  action="../includes/validarreserva.php" method="POST">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="Nombre" class="css-label"> Nombre Completo:</label>
                                                <input type="text" name="Nombre" class="form-control" id="Nombre" required Placeholder="Ingrese su nombre">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="Correo" class="css-label"> Correo: </label>
                                                <input type="email" class="form-control" name="Correo" id="Correo" required Placeholder="Ingrese su correo electronico">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="Celular" class="css-label"> Celular: </label>
                                                <input type="text" class="form-control" name="Celular" id="Celular" required  Placeholder="Ingresar numero de celular">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="Cantidad" class="css-label">Cantidad de personas: </label>
                                                <input type="number" class="form-control" name="Cantidad" id="Cantidad" required  Placeholder="Ingresar cantidad de personas">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="Fecha" class="css-label"> Fecha: </label>
                                                <input type="date" class="form-control" name="Fecha" id="Fecha" required  Placeholder="dd/mm/aa">
                                                
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="Hora" class="css-label"> Hora: </label>
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
                                                <label for="Evento" class="css-label"> Tipo de Evento: </label>
                                                <select class="form-control" name="Evento" id="Evento" required>
                                                    <option value="" >Seleccione el tipo de evento</option>
                                                    <option value="Reservar normal" >Reservar normal </option>
                                                    <option value="Cumpleaños">Cumpleaños </option>
                                                    <option value="Boda">Boda </option>
                                                    <option value="Reunion">Reunion</option >
                                                </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label for="Area" class="css-label"> Area de reservacion: </label>
                                                <select class="form-control" name="Area" id="Area" required>
                                                    <option value="">Seleccione area de reservacion</option>
                                                    <option value="Sala VIP" >Sala VIP </option>
                                                    <option value="Terraza">Terraza</option>

                                                </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="Descripcion" class="css-label"> Descripcion de la reservacion</label>
                                            <textarea id="Descripcion" name="Descripcion" rows="10" class="css-input form-control" required> </textarea>
                                        </div>
                                        
                                        <br>
                                        <input type="submit" value="Guardar" id="register" class="btn-guardar" name="registrar">

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


        <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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