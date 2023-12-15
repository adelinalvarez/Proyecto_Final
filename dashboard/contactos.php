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
        <title> Contactos - Doña Hilda Tapas and Grill</title>
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
            <div style= "color:white"> <?php echo $_SESSION['correo']; ?></div>
            <div> <a class="header_toggle" href="../funciones/cerrarSesion.php"> <i class='bx bx-log-out'></i> </a> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <div class="nav_list"> 
                        <a href="index.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                        <a href="usuarios.php" class="nav_link"> <i class='bx bx-user-plus nav_icon'></i> <span class="nav_name">Administradores</span> </a> 
                        <a href="productos.php" class="nav_link"> <i class='bx bx-restaurant nav_icon'></i> <span class="nav_name">Productos</span> </a> 
                        <a href="categorias.php" class="nav_link"> <i class='bx bx-folder-plus nav_icon'></i> <span class="nav_name">Categorias</span> </a> 
                        <a href="reservas.php" class="nav_link"> <i class='bx bx-food-menu nav_icon'></i> <span class="nav_name">Reservas</span> </a> 
                        <a href="contactos.php" class="nav_link active"> <i class='bx bx-chat nav_icon'></i> <span class="nav_name">Contactos</span> </a> 
                        <a href="clientes.php" class="nav_link"> <i class='bx bx-group nav_icon'></i> <span class="nav_name">Clientes</span> </a> 
                        <a href="ordenes.php" class="nav_link"> <i class='bx bx-cart-add nav_icon'></i> <span class="nav_name">Ordenes</span> </a> 
                    </div>
                </div>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">
            <br>
            <h1 class="text-center color-white"> Contactos </h1>
            <div class="row py-5">
                <div class="col-lg-10 mx-auto">
                    <div class="card rounded shadow border-0"> 
                        <div class="card-body p-5 bg-white rounded">
                            <div class="text-end mb-3"> <!-- Agrega esta línea para alinear a la derecha -->
                            <a class="btn btn-dark text-white btn-add" href="#">
                                Agregar nuevo contacto <i class='bx bxs-user-plus text-white'></i>
                            </a>
                            </div>
                            <div class="table-responsive">
                                <table id="example" style="width:100%" class="table table-striped table-bordered">
                                    <thead class="text-center" style="background-color: black; color:white;">
                                        <tr>
                                            <th>Id Cliente</th>
                                            <th>Asunto</th>
                                            <th>Mensaje</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $conexion=$GLOBALS['conex'];                
                                            $SQL=mysqli_query($conexion,"SELECT contactos.IdContacto, contactos.IdCliente, contactos.asunto, contactos.mensaje FROM contactos");
                                            while($fila=mysqli_fetch_assoc($SQL)):
                                        ?>
                                         <tr>
                                            <td><?php echo $fila['IdCliente']; ?></td>
                                            <td><?php echo $fila['asunto']; ?></td>
                                            <td><?php echo $fila['mensaje']; ?></td>
                                            <td class="text-center align-middle">
                                            <a class="btn btn-view" href="#" data-id="<?php echo $fila['IdContacto'] ?>">
                                                <i class='bx bxs-user-detail'></i>
                                            </a>
                                            <a class="btn btn-edit" href="#" data-id="<?php echo $fila['IdContacto'] ?>">
                                                <i class='bx bxs-edit'></i>
                                            </a>
                                            <a class="btn btn-del" href="#" data-id="<?php echo $fila['IdContacto'] ?>">
                                                <i class='bx bxs-trash-alt'></i>
                                            </a>
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
                    title: '<h2> Agregar nuevo contacto </h2>',
                    html:
                        '<label for="correo" class="css-label">Correo: </label>' +
                        '<br>' +
                        '<input id="correo" class="swal2-input css-input" placeholder="Ingrese el correo" value=""> ' +
                        '<br>' +
                        '<label for="asunto" class="css-label"> Asunto: </label>' +
                        '<br>' +
                        '<input id="asunto" class="swal2-input css-input" placeholder="Ingrese el asunto" value=""> ' +
                        '<br>' +
                        '<label for="mensaje" class="css-label"> Mensaje: </label>' +
                        '<input id="mensaje" class="swal2-input css-input" placeholder="Ingrese un mensaje" value="">',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    preConfirm: () => {
                        const correo = $('#correo').val();
                        const asunto = $('#asunto').val();
                        const mensaje = $('#mensaje').val();


                        if (!correo || !asunto || !mensaje) {
                            Swal.showValidationMessage('Por favor, completa todos los campos');
                        } else {
                            $.ajax({
                                type: "POST",
                                url: "../funciones/funciones.php",
                                data: {
                                    correo: correo,
                                    accion: 'verificar_cliente'
                                },
                                success: function(response) {
                                    if (response === 'existe_cliente') {
                                        $.ajax({
                                            type: "POST",
                                            url: "../funciones/funciones.php",
                                            data: {
                                                correo: correo,
                                                asunto: asunto,
                                                mensaje: mensaje,
                                                accion: 'validar_contactos'
                                            },
                                            success: function(response) {
                                                Swal.fire('Éxito', 'El nuevo contacto ha sido agregado.', 'success').then((result) => {
                                                    if (result.isConfirmed) {
                                                        location.reload();
                                                    }
                                                });
                                            },
                                            error: function(xhr, status, error) {
                                                Swal.fire('Error', 'Hubo un error al agregar el contacto: ' + error, 'error');
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            title: '<h2> Agregar nuevo cliente </h2>',
                                            html:
                                                '<label for="nombreCliente" class="css-label"> Nombre Cliente: </label>' +
                                                '<input id="nombreCliente" class="swal2-input css-input" placeholder="Ingrese el nombre del cliente" value=""> ' +
                                                '<br>' +
                                                '<label for="celularCliente" class="css-label"> Celular Cliente: </label>' +
                                                '<input id="celularCliente" class="swal2-input css-input" placeholder="Ingrese el celular del cliente" value=""> ' +
                                                '<br>' +
                                                '<label for="direccionCliente" class="css-label"> Direccion Cliente: </label>' +
                                                '<input id="direccionCliente" class="swal2-input css-input" placeholder="Ingrese la direccion del cliente" value=""> ',
                                            showCancelButton: true,
                                            cancelButtonText: 'Cancelar',
                                            preConfirm: () => {
                                                const nombreCliente = $('#nombreCliente').val();
                                                const celularCliente = $('#celularCliente').val();
                                                const direccionCliente = $('#direccionCliente').val();


                                                $.ajax({
                                                    type: "POST",
                                                    url: "../funciones/funciones.php",
                                                    data: {
                                                        correo: correo,
                                                        asunto: asunto,
                                                        mensaje: mensaje,
                                                        nombreCliente: nombreCliente,
                                                        celularCliente: celularCliente,
                                                        direccionCliente: direccionCliente,
                                                        accion: 'validar_contactos'
                                                    },
                                                    success: function(response) {
                                                        Swal.fire('Éxito', 'El nuevo contacto ha sido agregado.', 'success').then((result) => {
                                                            if (result.isConfirmed) {
                                                                location.reload();
                                                            }
                                                        });
                                                    },
                                                    error: function(xhr, status, error) {
                                                        Swal.fire('Error', 'Hubo un error al agregar el contacto: ' + error, 'error');
                                                    }
                                                });
                                            }
                                        });
                                    }
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire('Error', 'Hubo un error al verificar el cliente: ' + error, 'error');
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
                const IdContacto = $(this).data('id');


                Swal.fire({
                    title: '<h2> Editar contacto </h2>',
                    html:
                        '<label for="correo" class="css-label">Correo: </label>' +
                        '<br>' +
                        '<input id="correo" class="swal2-input css-input" placeholder="Ingrese el correo" value=""> ' +
                        '<br>' +
                        '<label for="asunto" class="css-label"> Asunto: </label>' +
                        '<br>' +
                        '<input id="asunto" class="swal2-input css-input" placeholder="Ingrese el asunto" value=""> ' +
                        '<br>' +
                        '<label for="mensaje" class="css-label"> Mensaje: </label>' +
                        '<input id="mensaje" class="swal2-input css-input" placeholder="Ingrese un mensaje" value="">',
                    focusConfirm: false,
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    didOpen: () => {
                        // Realiza una solicitud AJAX para cargar los datos del contacto y mostrarlos en el formulario
                        $.ajax({
                            type: "POST",
                            url: "../funciones/funciones.php",
                            data: {
                                idContacto: IdContacto,
                                accion: 'mostrar_contactos'
                            },
                            success: function(response) {
                                const contactData = JSON.parse(response);


                                if (contactData) {
                                    $('#correo').val(contactData.correo);
                                    $('#asunto').val(contactData.asunto);
                                    $('#mensaje').val(contactData.mensaje);
                                }
                            },
                            error: function(xhr, status, error) {
                                Swal.fire('Error', 'Hubo un error al cargar los datos del contacto: ' + error, 'error');
                            }
                        });
                    },
                    preConfirm: () => {
                        const correo = $('#correo').val();
                        const asunto = $('#asunto').val();
                        const mensaje = $('#mensaje').val();


                        if (!correo || !asunto || !mensaje) {
                            Swal.showValidationMessage('Por favor, completa todos los campos');
                        } else {
                            // Realiza una solicitud AJAX para editar el contacto
                            $.ajax({
                                type: "POST",
                                url: "../funciones/funciones.php",
                                data: {
                                    idContacto: IdContacto,
                                    correo: correo,
                                    asunto: asunto,
                                    mensaje: mensaje,
                                    accion: 'editar_contactos'
                                },
                                success: function(response) {
                                    Swal.fire('Éxito', 'El contacto ha sido actualizado.', 'success').then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload(); // Recarga la página
                                        }
                                    });
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire('Error', 'Hubo un error al editar el contacto: ' + error, 'error');
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
            const IdContacto = $(this).data('id');

            Swal.fire({
                title: 'Datos del contacto',
                didOpen: () => {

                    // Realiza una solicitud AJAX para cargar los detalles del contacto
                    $.ajax({
                        type: "POST",
                        url: "../funciones/funciones.php",
                        data: {
                            idContacto: IdContacto,
                            accion: 'mostrar_contactos'
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
                                        <p class="css-label">Asunto: ${userData.asunto}</p>
                                        <p class="css-label">Mensaje: ${userData.mensaje}</p>`
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'No se pudieron cargar los detalles del contacto.',
                                    icon: 'error'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error',
                                text: 'Hubo un error al cargar los datos del contacto: ' + error,
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
        const IdContacto = $(this).data('id');

        Swal.fire({
            title: '¿Estás seguro de eliminar este contacto?',
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
                id: IdContacto,
                accion: 'eliminar_contactos'
                },
                success: function(response) {
                Swal.fire(
                    'Eliminado',
                    'El contacto fue eliminado correctamente.',
                    'success'
                );
                location.reload();
                },
                error: function(xhr, status, error) {
                Swal.fire(
                    'Error',
                    'Hubo un error al eliminar el contacto: ' + error,
                    'error'
                );
                }
            });
            }
        });
        });
    </script>

</html>