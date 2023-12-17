<?php
require_once ("../funciones/_db.php");

if (isset($_GET['id'])) {
    $IdProducto = $_GET['id'];

    if ($conex) {
        $consulta = mysqli_query($conex, "SELECT IdProducto, nombre, descripcion, categoria, precio, imagen FROM productos WHERE IdProducto = '$IdProducto'");

        if ($consulta) {
            $producto = mysqli_fetch_assoc($consulta);

            if ($producto) {
                // Muestra la información del producto en una card
                ?>
                <!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Detalles del Producto</title>
                    <!-- Agrega el enlace al CSS de Bootstrap si aún no lo has hecho -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="...">
                    <link rel="icon" href="../imagenes/Logo.png">
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
                    <link href="../css/style.css" rel="stylesheet">
                    <title>Doña Hilda Tapas and Grill</title>
                    <style>
                        .custom-card {
                            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
                        }
                    </style>
                </head>
                <body>
                    <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg navbar-light bg-black nav-height">
                        <!-- Container wrapper -->
                        <div class="container">
                            <!-- Navbar brand -->
                            <a class="navbar-brand me-2" href="Index.php">
                                <img src="../imagenes/Logo-Hilda.png" height="40"style="margin-top: -1px;"/>
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
                    <br>

                    <div class="container">
                        <div class="row gx-3 custom-card">
                            
                            <div class="col-md-6">
                                <br>
                                <br>
                                <img src="/Proyecto_Final/product_images/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="Imagen del Producto">
                            </div>
                            <br>

                            <div class="col-md-6">
                                <br>
                                <h5 class="card-title text-center mb-4" style="font-size: 24px; font-weight: bold;"><?php echo $producto['nombre']; ?></h5>                            
                                <p class="card-text"><strong>Descripción:</strong> <?php echo $producto['descripcion']; ?></p>
                                <p class="card-text"><strong>Categoría:</strong> <?php echo $producto['categoria']; ?></p>
                                <p class="card-text"><strong>Precio:</strong> <?php echo $producto['precio']; ?></p>
                                <br>

                            </div>
                            
                        </div>
                        <div style="text-align: center; margin-top: 20px;">
                                <a href="Menu.php" class="btn" style="background-color: #f8f673; color: #000;">Volver al Menú</a>
                            </div>
                    </div>
                    <br>

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
                    <!-- End Footer -->  

                </body>
                </html>
                <?php
            } else {
                echo "No se encontraron datos para el producto con ID: $IdProducto";
            }
        } else {
            echo "Error al obtener los datos del producto: " . mysqli_error($conex);
        }
    } else {
        echo "Error: No se ha establecido la conexión a la base de datos.";
    }
} else {
    echo "ID del producto no proporcionado";
}
?>