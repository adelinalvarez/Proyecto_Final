<?php
require_once ("../funciones/_db.php");
session_start();
error_reporting(0);

$validarusuarios = $_SESSION['correo'];

if( $validarusuarios == null || $validarusuarios = ''){

  header("Location: ../index.php");
  die();
  
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../imagenes/Logo.png">
        <title> Reservas - Doña Hilda Tapas and Grill</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> </script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> </script>
        
        <link rel="stylesheet" href="css/dashboard.css">
        <link href="../css/style.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

        <script type="text/javascript" src="js/dashboard.js"> </script>
        <script type="text/javascript" src="js/datatables.js"> </script>

        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"> </script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"> </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        

    </head>

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div> <a class="header_toggle" href="../funciones/cerrarSesion.php"> <i class='bx bx-log-out'></i> </a> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <div class="nav_list"> 
                        <a href="index.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                        <a href="usuarios.php" class="nav_link"> <i class='bx bx-user-plus nav_icon'></i> <span class="nav_name">Administradores</span> </a> 
                        <a href="productos.php" class="nav_link"> <i class='bx bx-restaurant nav_icon'></i> <span class="nav_name">Productos</span> </a> 
                        <a href="reservas.php" class="nav_link active"> <i class='bx bx-food-menu nav_icon'></i> <span class="nav_name">Reservas</span> </a> 
                        <a href="contactos.php" class="nav_link"> <i class='bx bx-chat nav_icon'></i> <span class="nav_name">Contactos</span> </a> 
                        <a href="clientes.php" class="nav_link "> <i class='bx bx-group nav_icon'></i> <span class="nav_name">Clientes</span> </a> 
                    </div>
                </div>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">
            <br>
            <h1 class="text-center color-white"> Reservar </h1>
            <div class="row py-5">
                <div class="col-lg-10 mx-auto">
                    <div class="card rounded shadow border-0"> 
                        <div class="card-body p-5 bg-white rounded">
                            <div class="text-end mb-3"> 
                            <a class="btn btn-dark text-white btn-add" href="#">
                                Agregar nueva reserva <i class='bx bxs-user-plus text-white'></i>
                            </a>
                            </div>
                            <div class="table-responsive">
                                <table id="example" style="width:100%" class="table table-striped table-bordered">
                                    <thead class="text-center" style="background-color: black; color:white;">
                                        <tr>
                                        <th>Id Reserva</th>
                                            <th>Id cliente</th>
                                            <th>Cantidad de Personas</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Evento</th>
                                            <th>Area</th>
                                            <th>Descripcion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $conexion=$GLOBALS['conex']; 
                                            $SQL=mysqli_query($conexion," SELECT reservas.IdCliente, reservas.IdReservas, reservas.cantidadPersonas, reservas.fecha, reservas.hora, reservas.evento, reservas.area, reservas.descripcion FROM reservas");
                                            while($fila=mysqli_fetch_assoc($SQL)):
                                        ?>
                                        <tr>
                                            <td><?php echo $fila['IdReservas']; ?></td>
                                            <td><?php echo $fila['IdCliente']; ?></td>
                                            <td><?php echo $fila['cantidadPersonas']; ?></td>
                                            <td><?php echo $fila['fecha']; ?></td>
                                            <td><?php echo $fila['hora']; ?></td>
                                            <td><?php echo $fila['evento']; ?></td>
                                            <td><?php echo $fila['area']; ?></td>
                                            <td><?php echo $fila['descripcion']; ?></td>
                                            <td>
                                                <a class="btn btn-view" href="#" data-id="<?php echo$fila['IdReservas']?>" >
                                                    <i class='bx bxs-user-detail'></i>
                                                </a>
                                                <a class="btn btn-edit" href="#" data-id="<?php echo $fila['IdReservas']?>">
                                                    <i class='bx bxs-edit'></i>
                                                </a>
                                                <a class="btn btn-del" href="#" data-id="<?php echo $fila['IdReservas']?>"> <i class='bx bxs-trash-alt'></i> </a>
                                            
                                            </td>
                                        </tr>
                                        <?php endwhile;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

    

    <script>
        $(document).ready(function() {
            $('.btn-add').on('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: '<h2> Agregar nueva reserva </h2>',
                    html:
                        '<div class="column">' +
                        '<label for="cantidadPersonas" class="css-label">cantidadPersonas: </label>' +
                        '<input id="cantidadPersonas" class="swal2-input css-input" placeholder="Ingrese la cantidad" value=""> ' +
                        '<br>' +
                        '<label for="IdCliente" class="css-label">IdCliente: </label>' +
                        '<br>' +
                        '<input id="IdCliente" class="swal2-input css-input" placeholder="Ingrese el IdCliente" value=""> ' +
                        '<br>' +
                        '<label for="fecha" class="css-label"> Fecha: </label>' +
                        '<br>' +
                        '<input id="fecha" class="swal2-input css-input" type="date"> ' +
                        '<br>' +
                        '<label for="hora" class="css-label"> Hora: </label>' +
                        '<br>'+
                        '<select class="swal2-input css-input" name="hora" id="hora" required>' +
                            '<option value="">Seleccione la hora</option>' +
                            '<option value="10:00 AM">10:00 AM</option>' +
                            '<option value="11:00 AM">11:00 AM</option>' +
                            '<option value="12:00 PM">12:00 PM</option>' +
                            '<option value="01:00 PM">01:00 PM</option>' +
                            '<option value="02:00 PM">02:00 PM</option>' +
                            '<option value="03:00 PM">03:00 PM</option>' +
                            '<option value="04:00 PM">04:00 PM</option>' +
                            '<option value="05:00 PM">05:00 PM</option>' +
                            '<option value="06:00 PM">06:00 PM</option>' +
                            '<option value="07:00 PM">07:00 PM</option>' +
                            '<option value="08:00 PM">08:00 PM</option>' +
                            '<option value="09:00 PM">09:00 PM</option>' +
                            '<option value="10:00 PM">10:00 PM</option>' +
                        '</select>' +
                        '<br>'+
                        '</div>' +
                        '<div class="divider"></div>' +
                        '<div class="column">' +
                        '<label for="evento" class="css-label"> Seleccion el tipo de evento: </label>' +
                        '<br>' +
                        '<select class="swal2-input css-input" name="evento" id="evento" required>' +
                            '<option value="">Seleccione el tipo de evento</option>' +
                            '<option value="Reservar normal">Reservar normal</option>' +
                            '<option value="Cumpleaños">Cumpleaños</option>' +
                            '<option value="Boda">Boda</option>' +
                            '<option value="Reunion">Reunion</option>' +
                        '</select>' +
                        '<br>'+
                        '<label for="area" class="css-label"> Seleccione area de reservacion: </label>' +
                        '<br>' +
                        '<select class="swal2-input css-input" name="area" id="area" required>' +
                            '<option value="">Seleccione area de reservacion</option>' +
                            '<option value="Sala VIP">Sala VIP</option>' +
                            '<option value="Terraza">Terraza</option>' +
                        '</select>' +                  
                        '<br>'+
                        '<label for="descripcion" class="css-label"> Descripcion: </label>' +
                        '<textarea id="descripcion" name="descripcion" rows="10" class="swal2-input css-input"> </textarea>'+
                        '</div>',
                    focusConfirm: false,
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    preConfirm: () => {
                        const IdCliente = $('#IdCliente').val();
                        const cantidadPersonas = $('#cantidadPersonas').val();
                        const fecha = $('#fecha').val();
                        const hora = $('#hora').val();
                        const evento = $('#evento').val();
                        const area = $('#area').val();
                        const descripcion = $('#descripcion').val();

                        if (!IdCliente|| !cantidadPersonas|| !fecha|| !hora || !evento || !area || !descripcion) {
                            Swal.showValidationMessage('Por favor, completa todos los campos');
                        } else {
                            $.ajax({
                                type: "POST",
                                url: "../funciones/funciones.php",
                                data: {
                                    IdCliente: IdCliente,
                                    cantidadPersonas: cantidadPersonas,
                                    hora: hora,
                                    evento: evento,
                                    area: area,
                                    descripcion: descripcion,
                                    accion: 'validar_reservas'
                                },
                                success: function(response) {
                                    Swal.fire('Éxito', 'El nuevo cliente ha sido agregado.', 'success').then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload(); // Recarga la página
                                        }
                                    });
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire('Error', 'Hubo un error al agregar el cliente: ' + error, 'error');
                                }
                            });
                        }
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
    $('.btn-edit').on('click', function(e) {
        e.preventDefault();
        const IdReservas = $(this).data('id');

        Swal.fire({
            title: '<h2> Editar reserva </h2>',
            html:
                '<div class="column">' +
                '<label for="cantidadPersonas" class="css-label">cantidadPersonas: </label>' +
                '<input id="cantidadPersonas" class="swal2-input css-input" placeholder="Ingrese la cantidad" value=""> ' +
                '<br>' +
                '<label for="IdCliente" class="css-label">IdCliente: </label>' +
                '<br>' +
                '<input id="IdCliente" class="swal2-input css-input" placeholder="Ingrese el IdCliente" value=""> ' +
                '<br>' +
                '<label for="fecha" class="css-label"> Fecha: </label>' +
                '<br>' +
                '<input id="fecha" class="swal2-input css-input" type="date"> ' +
                '<br>' +
                '<label for="hora" class="css-label"> Hora: </label>' +
                '<br>' +
                '<select class="swal2-input css-input" name="hora" id="hora" required>' +
                '<option value="">Seleccione la hora</option>' +
                '<option value="10:00 AM">10:00 AM</option>' +
                '<option value="11:00 AM">11:00 AM</option>' +
                '<option value="12:00 PM">12:00 PM</option>' +
                '<option value="01:00 PM">01:00 PM</option>' +
                '<option value="02:00 PM">02:00 PM</option>' +
                '<option value="03:00 PM">03:00 PM</option>' +
                '<option value="04:00 PM">04:00 PM</option>' +
                '<option value="05:00 PM">05:00 PM</option>' +
                '<option value="06:00 PM">06:00 PM</option>' +
                '<option value="07:00 PM">07:00 PM</option>' +
                '<option value="08:00 PM">08:00 PM</option>' +
                '<option value="09:00 PM">09:00 PM</option>' +
                '<option value="10:00 PM">10:00 PM</option>' +
                '</select>' +
                '<br>' +
                '</div>' +
                '<div class="divider"></div>' +
                '<div class="column">' +
                '<label for="evento" class="css-label"> Seleccion el tipo de evento: </label>' +
                '<br>' +
                '<select class="swal2-input css-input" name="evento" id="evento" required>' +
                '<option value="">Seleccione el tipo de evento</option>' +
                '<option value="Reservar normal">Reservar normal</option>' +
                '<option value="Cumpleaños">Cumpleaños</option>' +
                '<option value="Boda">Boda</option>' +
                '<option value="Reunion">Reunion</option>' +
                '</select>' +
                '<br>' +
                '<label for="area" class="css-label"> Seleccione area de reservacion: </label>' +
                '<br>' +
                '<select class="swal2-input css-input" name="area" id="area" required>' +
                '<option value="">Seleccione area de reservacion</option>' +
                '<option value="Sala VIP">Sala VIP</option>' +
                '<option value="Terraza">Terraza</option>' +
                '</select>' +
                '<br>' +
                '<label for="descripcion" class="css-label"> Descripcion: </label>' +
                '<textarea id="descripcion" name="descripcion" rows="10" class="swal2-input css-input"></textarea>' +
                '</div>',
            focusConfirm: false,
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            didOpen: () => {
                // Realiza una solicitud AJAX para cargar los datos de la reserva y mostrarlos en el formulario
                $.ajax({
                    type: "POST",
                    url: "../funciones/funciones.php",
                    data: {
                        idReservas: IdReservas, // Cambiado el nombre del campo a idReservas
                        accion: 'mostrar_reservas'
                    },
                    success: function(response) {
                        console.log(response); // Verifica si los datos se están recibiendo
                        const reservasData = JSON.parse(response);
                        if (reservasData) {
                            $('#IdCliente').val(reservasData.IdCliente);
                            $('#cantidadPersonas').val(reservasData.cantidadPersonas);
                            $('#fecha').val(reservasData.fecha);
                            $('#hora').val(reservasData.hora);
                            $('#evento').val(reservasData.evento);
                            $('#area').val(reservasData.area);
                            $('#descripcion').val(reservasData.descripcion);
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Error', 'Hubo un error al cargar los datos de la reserva: ' + error, 'error');
                    }
                });
            },
            preConfirm: () => {
                const IdCliente = $('#IdCliente').val();
                const cantidadPersonas = $('#cantidadPersonas').val();
                const fecha = $('#fecha').val();
                const hora = $('#hora').val();
                const evento = $('#evento').val();
                const area = $('#area').val();
                const descripcion = $('#descripcion').val();

                if (!cantidadPersonas || !fecha || !hora || !evento || !area || !descripcion) {
                    Swal.showValidationMessage('Por favor, completa todos los campos');
                } else {
                    $.ajax({
                        type: "POST",
                        url: "../funciones/funciones.php",
                        data: {
                            idReservas: IdReservas,
                            IdCliente: IdCliente,
                            cantidadPersonas: cantidadPersonas,
                            fecha: fecha,
                            hora: hora,
                            evento: evento,
                            area: area,
                            descripcion: descripcion,
                            accion: 'editar_reservas'
                        },
                        success: function(response) {
                            Swal.fire('Éxito', 'La reserva ha sido actualizada.', 'success').then((result) => {
                                if (result.isConfirmed) {
                                    location.reload(); // Recarga la página
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire('Error', 'Hubo un error al editar la reserva: ' + error, 'error');
                        }
                    });
                }
            }
        });
    });
});


    </script>

    <script>
        $('.btn-view').on('click', function(e) {
            e.preventDefault();
            const idReservas = $(this).data('id');

            Swal.fire({
                title: 'Datos de la reserva',
                didOpen: () => {

                    // Realiza una solicitud AJAX para cargar los detalles del contacto
                    $.ajax({
                        type: "POST",
                        url: "../funciones/funciones.php",
                        data: {
                            idReservas: idReservas,
                            accion: 'mostrar_reservas'
                        },
                        success: function(response) {
                            const userData = JSON.parse(response);

                            if (userData) {
                                Swal.update({
                                    html: `
                                        <p class="css-label">Id Cliente: ${userData.IdCliente}</p>
                                        <p class="css-label">nombre: ${userData.nombre}</p>
                                        <p class="css-label">correo: ${userData.correo}</p>
                                        <p class="css-label">celular: ${userData.celular}</p>
                                        <p class="css-label">direccion: ${userData.direccion}</p>
                                        <p class="css-label">cantidadPersonas: ${userData.cantidadPersonas}</p>
                                        <p class="css-label">fecha: ${userData.fecha}</p>
                                        <p class="css-label">hora: ${userData.hora}</p>
                                        <p class="css-label">evento: ${userData.evento}</p>
                                        <p class="css-label">area: ${userData.area}</p>
                                        <p class="css-label">descripcion: ${userData.descripcion}</p>`
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'No se pudieron cargar los detalles de la reserva.',
                                    icon: 'error'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error',
                                text: 'Hubo un error al cargar los datos de la reserva: ' + error,
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $('.btn-del').on('click', function(e){
        e.preventDefault();
        const IdReservas = $(this).data('id');

        Swal.fire({
            title: '¿Estás seguro de eliminar esta reserva',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar', 
            cancelButtonText: 'Cancelar', 
        }).then((result) => {
            if (result.value) {
            $.ajax({
                type: "POST",
                url: "../funciones/funciones.php",
                data: {
                id: IdReservas,
                accion: 'eliminar_reservas'
                },
                success: function(response) {
                Swal.fire(
                    'Eliminado',
                    'La reserva fue eliminada correctamente.',
                    'success'
                );
                location.reload();
                },
                error: function(xhr, status, error) {
                Swal.fire(
                    'Error',
                    'Hubo un error al eliminar la reserva: ' + error,
                    'error'
                );
                }
            });
            }
        });
        });
    </script>

    <style>
        .column {
            width: 48%;
            display: inline-block;
            vertical-align: top;
            border-right: 1px solid #ccc; /* Línea divisoria entre las columnas */
            padding-right: 10px; /* Espacio a la derecha de la línea divisoria */
        }

        .divider {
            width: 4%;
            display: inline-block;
        }

        /* Establece un ancho personalizado para el modal */
        .swal2-popup {
            width: 80%; /* Ancho personalizado */
        }
    </style>

</html>