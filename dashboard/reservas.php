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
                        '<label for="Cantidad" class="css-label"> Cantidad de Personas: </label>' +
                        '<input id="Cantidad" class="swal2-input css-input" placeholder="Ingrese la cantidad=""> ' +
                        '<br>' +
                        '<label for="Fecha" class="css-label"> Fecha: </label>' +
                        '<br>' +
                        '<input id="Fecha" class="swal2-input css-input" placeholder="Ingrese la fecha" value=""> ' +
                        '<br>' +
                        '<label for="hora" class="css-label"> Hora: </label>' +
                        '<br>'+
                        '<input id="hora" class="swal2-input css-input" placeholder="Ingrese la hora" value="">'+
                        '<br>'+
                        '<label for="evento" class="css-label"> Evento: </label>' +
                        '<br>'+
                        '<input id="evento" class="swal2-input css-input" placeholder="Ingrese su tipo de evento" value="">'
                        '<br>'+
                        '<label for="area" class="css-label"> Area: </label>' +
                        '<br>'+
                        '<input id="area" class="swal2-input css-input" placeholder="Ingrese el area" value="">'+
                        '<br>'+
                        '<label for="descripcion" class="css-label"> Descripcion: </label>' +
                        '<br>'+
                        '<input id="descripcion" class="swal2-input css-input" placeholder="Ingrese la descripcion" value="">',
                    focusConfirm: false,
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    preConfirm: () => {
                        const cantidadPersonas = $('#cantidadPersonas').val();
                        const fecha = $('#fecha').val();
                        const hora = $('#hora').val();
                        const evento = $('#evento').val();
                        const area = $('#area').val();
                        const descripcion = $('#descripcion').val();

                        if (!cantidadPersona || !fecha || !hora || !evento || !area
                        || !descripcion ) {
                            Swal.showValidationMessage('Por favor, completa todos los campos');
                        } else {
                            $.ajax({
                                type: "POST",
                                url: "../funciones/funciones.php",
                                data: {
                                    <td><?php echo $fila['IdReservas']; ?></td>
                                            <td><?php echo $fila['cantidadPersonas']; ?></td>
                                            <td><?php echo $fila['fecha']; ?></td>
                                            <td><?php echo $fila['hora']; ?></td>
                                            <td><?php echo $fila['evento']; ?></td>
                                            <td><?php echo $fila['area']; ?></td>
                                            <td><?php echo $fila['descripcion']; ?></td>
                                            <td>
                                    cantidadPersonas:cantidadPersonas,
                                    fecha: fecha,
                                    hora: hora,
                                    evento: evento,
                                    area: area,
                                    descripcion: descripcion,
                                    accion: 'validar_reservas'
                                },
                                success: function(response) {
                                    Swal.fire('Éxito', 'La nueva reserva ha sido agregada.', 'success').then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload(); // Recarga la página
                                        }
                                    });
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire('Error', 'Hubo un error al agregar la reserva: ' + error, 'error');
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
                    title: '<h2> Editar reserva <h2>',
                    html:
                    '<label for="Cantidad" class="css-label"> Cantidad Personas: </label>' +
                        '<input id="Cantidad" class="swal2-input css-input" placeholder="Ingrese la cantidad=""> ' +
                        '<br>' +
                        '<label for="Fecha" class="css-label"> Fecha: </label>' +
                        '<br>' +
                        '<input id="Fecha" class="swal2-input css-input" placeholder="Ingrese la fecha" value=""> ' +
                        '<br>' +
                        '<label for="hora" class="css-label"> Hora: </label>' +
                        '<br>'+
                        '<input id="hora" class="swal2-input css-input" placeholder="Ingrese la hora" value="">'+
                        '<br>'+
                        '<label for="evento" class="css-label"> Evento: </label>' +
                        '<br>'+
                        '<input id="evento" class="swal2-input css-input" placeholder="Ingrese su tipo de evento" value="">'
                        '<br>'+
                        '<label for="area" class="css-label"> Area: </label>' +
                        '<br>'+
                        '<input id="area" class="swal2-input css-input" placeholder="Ingrese el area" value="">'+
                        '<br>'+
                        '<label for="descripcion" class="css-label"> Descripcion: </label>' +
                        '<br>'+
                        '<input id="descripcion" class="swal2-input css-input" placeholder="Ingrese la descripcion" value="">',
                    focusConfirm: false,
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    preConfirm: () => {
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
                                    cantidadPersonas:cantidadPersonas,
                                    fecha: fecha,
                                    hora: hora,
                                    evento: evento,
                                    area: area,
                                    descripcion: descripcion,
                                    accion: 'editar_reserva'
                                },
                                success: function(response) {
                                    Swal.fire('Éxito', 'La reserva ha sido actualizado.', 'success').then((result) => {
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

                // Realiza una solicitud AJAX para cargar los datos del usuario y mostrarlos en el formulario
                $.ajax({
                    type: "POST",
                    url: "../funciones/funciones.php",
                    data: {
                        id: Idreservas,
                        accion: 'mostrar_reservas'
                    },
                    success: function(response) {
                        const reservasData = JSON.parse(response);
                        if (reservasData) {
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
            });
        });
    </script>

    <script>
        $('.btn-view').on('click', function(e) {
            e.preventDefault();
            const IdReservas = $(this).data('id');

            Swal.fire({
                didOpen: () => {
                    $.ajax({
                        type: "POST",
                        url: "../funciones/funciones.php",
                        data: {
                            id: IdReservas,
                            accion: 'mostrar_reservas'
                        },
                        success: function(response) {
                            // Parse the response from the server, assuming it's in JSON format
                            const reservasData = JSON.parse(response);
                            if (reservasData) {
                                // Extract and display user information
                                const cantidadPersonas = reservasData.cantidadPersonas;
                                const fecha = reservasData.fecha;
                                const hora = reservasData.hora;
                                const evento = reservasData.evento;
                                const area = reservasData.area;
                                const descripcion = reservasData.descripcion;

                                Swal.update({
                                    title: 'Datos del reservas:',
                                    html: `<p class="css-label">Cantidad de Personas: </p>
                                            <p> ${cantidadPersonas} </p>
                                            <p class="css-label">Fecha: </p> 
                                            <p> ${fecha}</p>
                                            <p class="css-label">Hora: </p> 
                                            <p>${hora}</p>
                                            <p class="css-label">Evento: </p> 
                                            <p>${evento}</p> <p class="css-label">Area: </p> 
                                            <p>${area}</p> <p class="css-label">Descripcion: </p> 
                                            <p>${descripcion}</p> `,
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error',
                                'Hubo un error al cargar los datos de la reserva:' + error,
                                'error'
                            );
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

</html>