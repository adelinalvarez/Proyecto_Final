<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../imagenes/Logo.png">

        <!-- MDB - Nav -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link href="../css/style.css" rel="stylesheet">
        <title>Doña Hilda Tapas and Grill</title>
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-black nav-height">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2" href="index.php">
                    <img src="../imagenes/Logo-Hilda.png" height="40"style="margin-top: -1px;"/>
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
                        <a class="nav-link" href="index.php" style= "color: white">Doña Hilda Tapas and Grill</a>
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
            <h1 class="tracking-in-expand text-center color-white"> Reservar </h1>
            <div class="row">
                <div class="info">
                    <form  action="../funciones/reservas/validarreserva.php" method="POST">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="Nombre" class="css-label"> Nombre Completo:</label>
                                <input type="text" name="Nombre" class="css-input form-control" id="Nombre" required Placeholder="Ingrese su nombre">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Correo" class="css-label"> Correo: </label>
                                <input type="email" class="css-input form-control" name="Correo" id="Correo" required Placeholder="Ingrese su correo electronico">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Celular" class="css-label"> Celular: </label>
                                <input type="text" class="css-input form-control" name="Celular" id="Celular" required  Placeholder="Ingresar numero de celular">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Cantidad" class="css-label">Cantidad de personas: </label>
                                <input type="number" class="css-input form-control" name="Cantidad" id="Cantidad" required  Placeholder="Ingresar cantidad de personas">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Fecha" class="css-label"> Fecha: </label>
                                <input type="date" class="css-input form-control" name="Fecha" id="Fecha" required  Placeholder="dd/mm/aa">
                                
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Hora" class="css-label"> Hora: </label>
                                <select class=" css-input form-control" name="Hora" id="Hora" required>
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
                                <select class="css-input form-control" name="Evento" id="Evento" required>
                                    <option value="" >Seleccione el tipo de evento</option>
                                    <option value="Reservar normal" >Reservar normal </option>
                                    <option value="Cumpleaños">Cumpleaños </option>
                                    <option value="Boda">Boda </option>
                                    <option value="Reunion">Reunion</option >
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Area" class="css-label"> Area de reservacion: </label>
                                <select class="css-input form-control" name="Area" id="Area" required>
                                    <option value="">Seleccione area de reservacion</option>
                                    <option value="Sala VIP" >Sala VIP </option>
                                    <option value="Terraza">Terraza</option>

                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="Descripcion" class="css-label"> Descripcion de la reservacion</label>
                                <textarea id="Descripcion" name="Descripcion" rows="10" class="css-input form-control" required> </textarea>
                                <br>
                            </div>
                            
                            <br>
                            <input type="submit" value="Guardar" id="register" class="btn-guardar" name="registrar">

                        </form>

                     </div>

                </div>
            </div>

            <br>
        </div>



        <!-- Footer -->
        <footer class="text-center text-lg-start bg-black color-white text-muted p-1">            

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="bi bi-geo-alt icon me-3 text-secondary"></i>Dirección
                            </h6>
                            <p>
                                Santome #49 
                            </p>
                            <p>
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
                                <strong>Telefono:</strong> +1 809-522-5146
                            </p>
                            <p>
                                <strong>Email:</strong> Donahildabani@gmail.com                            
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
                                <strong>Lunes a Domingos: 8:00AM - 11:00PM</strong>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Siguenos</h6>
                            <a href=" https://www.facebook.com/DonaHildaBani?mibextid=ZbWKwL" class="facebook"><i class="bi bi-facebook" ></i></a>
                            <a href="https://instagram.com/donahildabani?igshid=MmU2YjMzNjRlOQ==" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href=" https://api.whatsapp.com/message/XV75XSG4HTO2J1?autoload=1&app_absent=0" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
                &copy; Copyright <strong><span>Doña Hilda Tapas and Grill</span></strong>. All Rights Reserved
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->  
        
    </body>
</html>