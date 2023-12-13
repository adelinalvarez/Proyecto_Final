<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../imagenes/Logo.webp">

        <!-- MDB - Nav -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../dashboard/dashboard.css" rel="stylesheet">
        <title>Doña Hilda Tapas and Grill</title>
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-black nav-height">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2" href="../Index.php">
                    <img src="../imagenes/Logo-Hilda.webp" height="40"style="margin-top: -1px;"/>
                    <a class="nav-link" href="../Index.php" style= "color: white">Doña Hilda Tapas and Grill</a>
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
                        <a class="nav-link p-2 EfectoSombra" href="../Index.php">Inicio</a>
                        <a class="nav-link p-2 EfectoSombra" href="Nosotros.php">Nosotros</a>
                        <a class="nav-link p-2 EfectoSombra" href="Menu.php">Menu</a>
                        <a class="nav-link p-2 EfectoSombra" href="Reservas.php">Reserva</a>
                        <a class="nav-link p-2 EfectoSombra" href="Contacto.php">Contacto</a>

                        <a class="BotonIniciar" type="button" href="login.php"> Iniciar Sesión </a>
                    </div>
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->

        <div class="container">
            <br>
            <h1 class="focus-in-expand text-center" style="color: black;"> Contáctanos </h1>
            <br>
            <div class="row">
                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4 style="color: black;">Ubicación:</h4>
                            <p>Santome #49, Esq. 16 De Agosto, Baní 94000</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4 style="color: black;">Correo:</h4>
                            <p>donahildabani@gmail.com</p>
                        </div>

                        <div class="Telefono" >
                            <i class="bi bi-phone"></i>
                            <h4 style="color: black;">Telefono:</h4>
                            <p>+1 809-522-5146</p>
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15154.1395834592!2d-70.3335576!3d18.2771309!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ea54f0ac5c34d01%3A0x6f86dcf823593705!2sDo%C3%B1a%20Hilda%20Tapas%20%26%20Grill!5e0!3m2!1ses!2sdo!4v1695340721703!5m2!1ses!2sdo" frameborder="0" style="border:0; width: 100%; height: 350px;" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <div class="info">
                        <form  action="../funciones/funciones.php" method="POST">
                            <div>
                                <label for="nombre" class="css-label"> Nombre Completo: </label>  
                                <input type="text" id="nombre" name="nombre" class="css-input" style= " display: block; width: 100%; border: 2px solid #AEB6BF;" required  pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" Placeholder="Ingrese su nombre">
                            </div>
                            
                            <div>
                                <label for="correo" class="css-label"> Correo:</label>   
                                <input type="text" id="correo" name="correo" class="css-input" style= " display: block; width: 100%; border: 2px solid #AEB6BF;" required Placeholder="Ingrese su correo" pattern="[^@\s]+@[^@\s]+\.[a-zA-Z]{2,}"  title="Por favor, incluya el símbolo @ en su dirección de correo."> 
                            </div>

                                                
                            <div>
                                <label for="asunto" class="css-label">Asunto:</label> 
                                <input type="text" id="asunto" name="asunto" class="css-input" style= " display: block; width: 100%; border: 2px solid #AEB6BF;" required Placeholder="Ingrese el asunto" >
                            </div>
                            <div>
                                <label for="mensaje" class="css-label">Mensaje:</label>  
                                <textarea id="mensaje" name="mensaje" rows="10" style="width: 100%; border: 2px solid #AEB6BF;" class="css-input form-control" required placeholder="Ingrese un mensaje"></textarea>
                            </div>

                            <input type="hidden" name="accion" value="insertar_contacto">
                            <button type="submit" class="btn-guardar">Enviar</button>
                        </form> 
                    </div>
                </div>
            </div>
            <br>
        </div>


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
                                Esq. 16 de Agosto, Baní, Peravia, República Dominicana
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