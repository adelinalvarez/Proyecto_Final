<?php
require_once ("../funciones/_db.php");
session_start();
error_reporting(0);
?>

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
        <title>Doña Hilda Tapas and Grill</title>
        <style>

   
        @media screen and (max-width: 768px) {
        /* Asegurar que los elementos se coloquen en columnas */
        .row.align-items-stretch {
            display: flex;
            flex-direction: column;
        }

        /* Ajustar el ancho y alinear los label */
        .form-group {
            width: 100%;
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        /* Ajustar el ancho de los input */
        .css-input {
            width: 100%;
            border-bottom: 1px solid #ccc; /* Línea que separa los campos */
            padding: 5px 0; /* Ajuste del padding para mejorar el aspecto visual */
            margin-bottom: 10px; /* Espacio entre campos */
        }

        /* Estilo para el label */
        .css-label {
            margin-bottom: 5px; /* Espacio entre el label y el input */
        }
    }
    }
</style>

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
            <h1 class="focus-in-expand text-center color-white"> Reservar </h1>
            <div class="row">
                <div class="info">
                    <form action="../funciones/funciones.php" method="POST" onsubmit="return validarFormulario()">
                        <div class="row align-items-stretch">
                                    <div class="form-group col-md-4">
                                        <label for="nombre" class="css-label"> Nombre Completo:</label>
                                        <input type="text" name="nombre" class="css-input" id="nombre" required placeholder=" Ingrese su nombre">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="correo" class="css-label"> Correo Electrónico: </label>
                                        <input type="email" class="css-input" name="correo" id="correo" required placeholder=" Ingrese su correo electrónico">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="celular" class="css-label"> Celular: </label>
                                        <input type="text" class="css-input" name="celular" id="celular" required placeholder=" Ingresar número de celular">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="cantidadPersonas" class="css-label">Cantidad de personas: </label>
                                        <input type="number" class="css-input" name="cantidadPersonas" id="cantidadPersonas" required min="1" max="50" Placeholder=" Ingresar cantidad de personas">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="fecha" class="css-label"> Fecha: </label>
                                        <input type="date" class="css-input" name="fecha" id="fecha" required min="<?php echo date('Y-m-d'); ?>" Placeholder="  dd/mm/aa">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="hora" class="css-label"> Hora: </label>
                                        <select class="css-input" name="hora" id="hora" required>
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
                                        <label for="evento" class="css-label"> Tipo de Evento: </label>
                                         <br>
                                        <select class="css-input" name="evento" id="evento" required>
                                            <option value="" >Seleccione el tipo de evento</option>
                                                <option value="Reservar normal">Reservar normal </option>
                                                <option value="Cumpleaños">Cumpleaños </option>
                                                <option value="Boda">Boda </option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Reunion">Otro</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="area" class="css-label"> Area de reservacion: </label>
                                        <br>
                                        <select class="css-input" name="area" id="area" required>
                                            <option value="">Seleccione area de reservacion</option>
                                            <option value="Sala VIP" >Sala VIP </option>
                                            <option value="Terraza">Terraza</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="descripcion" class="css-label"> Descripcion de la reservacion</label>
                                        <br>
                                        <textarea id="descripcion" name="descripcion" rows="10" style="width: 100%;" class="css-input" required placeholder="Ingrese detalles adicionales sobre la reserva"></textarea>
                                        <br>
                                    </div>

                            <input type="hidden" name="accion" value="validar_reservas_normal">
                            <button type="submit" class="btn-guardar">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>

        <script>
            function validarFormulario() {
                var nombre = document.getElementById("nombre").value;
                var correo = document.getElementById("correo").value;
                var celular = document.getElementById("celular").value;
                var letras = /^[A-Za-z\s]+$/;
                var formatoCorreo = /\S+@\S+\.\S+/;
                var formatoCelular = /^[0-9-]+$/;
                if (!nombre.match(letras)) {
                    alert("Por favor, ingrese un nombre válido (solo letras).");
                    return false;
                }

                if (!correo.match(formatoCorreo)) {
                    alert("Por favor, ingrese un correo electrónico válido.");
                    return false;
                }
                if (!celular.match(formatoCelular)) {
                    alert("Por favor, ingrese un número de celular válido (solo números y guiones).");
                    return false;
                }
                 enviarPorWhatsApp(); // Llamar a la función de WhatsApp aquí si la validación es exitosa
                return true;
            }
            function enviarPorWhatsApp() {
                 // Obtener los valores del formulario de reservas
                const nombre = document.getElementById('nombre').value;
                const correo = document.getElementById('correo').value;
                const celular = document.getElementById('celular').value;
                const cantidadPersonas = document.getElementById('cantidadPersonas').value;
                const fecha = document.getElementById('fecha').value;
                const hora = document.getElementById('hora').value;
                const evento = document.getElementById('evento').value;
                const area = document.getElementById('area').value;
                const descripcion = document.getElementById('descripcion').value;
                   // Verificar si todos los campos obligatorios están llenos
                  if (nombre && correo && celular && cantidadPersonas && fecha && hora && evento && area && descripcion) {
                        // Crear el mensaje con los datos del formulario de reservas
                       const mensajeWhatsApp = 
                        `Quiero realizar una nueva reserva:\n` +
                          `Nombre: ${nombre}\n` +
                            `Correo: ${correo}\n` +
                            `Celular: ${celular}\n` +
                            `Cantidad de Personas: ${cantidadPersonas}\n` +
                            `Fecha: ${fecha}\n` +
                            `Hora: ${hora}\n` +
                            `Tipo de Evento: ${evento}\n` +
                            `Área de Reservación: ${area}\n` +
                            `Descripción: ${descripcion}`;

                            // Codificar el mensaje para ser parte del enlace de WhatsApp
                            const mensajeCodificado = encodeURIComponent(mensajeWhatsApp);

                            // Crear el enlace de WhatsApp con el mensaje
                            const enlaceWhatsApp = `https://wa.me/+18295330410?text=${mensajeCodificado}`;

                            // Abrir una nueva ventana para redirigir a WhatsApp
                            window.open(enlaceWhatsApp, '_blank');
                    } else {
                            // Mostrar un mensaje de error o tomar alguna acción adicional si no se llenaron todos los campos
                            alert('Por favor, completa todos los campos obligatorios antes de enviar la reserva.');
                    }
                }
        </script>

           
    </script>

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
        <!-- Footer -->  
        
    </body>
</html>