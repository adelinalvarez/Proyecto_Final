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
        <title> Usuarios - Doña Hilda Tapas and Grill</title>
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
        
        <style> 
            .dataTables_wrapper .dataTables_length select,
            .dataTables_wrapper .dataTables_filter input {
                border: 1px solid #ccc;
                border-radius: 4px;
                margin-right: 10px;
            }
        </style>

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
                        <a href="usuarios.php" class="nav_link active"> <i class='bx bx-user-plus nav_icon'></i> <span class="nav_name">Administradores</span> </a> 
                        <a href="productos.php" class="nav_link"> <i class='bx bx-restaurant nav_icon'></i> <span class="nav_name">Productos</span> </a> 
                        <a href="categorias.php" class="nav_link"> <i class='bx bx-folder-plus nav_icon'></i> <span class="nav_name">Categorias</span> </a> 
                        <a href="reservas.php" class="nav_link"> <i class='bx bx-food-menu nav_icon'></i> <span class="nav_name">Reservas</span> </a> 
                        <a href="contactos.php" class="nav_link"> <i class='bx bx-chat nav_icon'></i> <span class="nav_name">Contactos</span> </a> 
                        <a href="clientes.php" class="nav_link"> <i class='bx bx-group nav_icon'></i> <span class="nav_name">Clientes</span> </a> 
                        <a href="ordenes.php" class="nav_link"> <i class='bx bx-cart-add nav_icon'></i> <span class="nav_name">Ordenes</span> </a> 
                    </div>
                </div>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">
            <br>
            <h1 class="text-center color-white"> Administradores </h1>
            <div class="row py-5">
                <div class="col-lg-10 mx-auto">
                    <div class="card rounded shadow border-0"> 
                        <div class="card-body p-5 bg-white rounded">
                            <div class="text-end mb-3"> 
                            <a class="btn btn-dark text-white btn-add" href="#">
                                Agregar nuevo usuario <i class='bx bxs-user-plus text-white'></i>
                            </a>
                            </div>
                            <div class="table-responsive">
                            <table id="example" style="width:100%" class="table table-striped table-bordered text-center">
                                <thead class="text-center" style="background-color: black; color:white;">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $conexion = $GLOBALS['conex'];
                                    $SQL = mysqli_query($conexion, "SELECT usuarios.IdUsuario, usuarios.nombre, usuarios.correo, usuarios.contraseña FROM usuarios");
                                    while ($fila = mysqli_fetch_assoc($SQL)) :
                                    ?>
                                        <tr>
                                            <td><?php echo $fila['nombre']; ?></td>
                                            <td><?php echo $fila['correo']; ?></td>
                                            <td class="text-center align-middle">
                                                <a class="btn btn-view" href="#" data-id="<?php echo $fila['IdUsuario'] ?>">
                                                    <i class='bx bxs-user-detail'></i>
                                                </a>
                                                <a class="btn btn-edit" href="#" data-id="<?php echo $fila['IdUsuario'] ?>">
                                                    <i class='bx bxs-edit'></i>
                                                </a>
                                                <a class="btn btn-del" href="#" data-id="<?php echo $fila['IdUsuario'] ?>">
                                                    <i class='bx bxs-trash-alt'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
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
                    title: '<h2> Agregar nuevo usuario </h2>',
                    html:
                        '<label for="nombre" class="css-label"> Nombre completo: </label>' +
                        '<input id="nombre" class="swal2-input css-input" placeholder="Ingrese el nombre" value=""> ' +
                        '<br>' +
                        '<label for="correo" class="css-label"> Correo: </label>' +
                        '<br>' +
                        '<input id="correo" class="swal2-input css-input" placeholder="Ingrese el correo" value=""> ' +
                        '<br>' +
                        '<label for="contraseña" class="css-label"> Contraseña: </label>' +
                        '<input id="contraseña" class="swal2-input css-input" placeholder="Ingrese una contraseña" value="">',
                    focusConfirm: false,
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    preConfirm: () => {
                        const nombre = $('#nombre').val();
                        const correo = $('#correo').val();
                        const contraseña = $('#contraseña').val();
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        const nameRegex = /^[A-Za-z\s]+$/;
                        
                        if (!nombre || !correo || !contraseña) {
                            Swal.showValidationMessage('Por favor, completa todos los campos');
                            return false; // Evita que se cierre el modal si falta información
                        } else if (!emailRegex.test(correo)) {
                            Swal.showValidationMessage('Formato de correo electrónico no válido');
                            return false;
                        } else if (!nameRegex.test(nombre)) {
                            Swal.showValidationMessage('El nombre solo puede contener letras y espacios');
                            return false;
                        } else {
                            $.ajax({
                                type: "POST",
                                url: "../funciones/funciones.php",
                                data: {
                                    nombre: nombre,
                                    correo: correo,
                                    contraseña: contraseña,
                                    accion: 'validar_usuarios'
                                },
                                success: function(response) {
                                    Swal.fire('Éxito', 'El nuevo usuario ha sido agregado.', 'success').then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload();
                                        }
                                    });
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire('Error', 'Hubo un error al agregar el usuario: ' + error, 'error');
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
                const IdUsuario = $(this).data('id');

                Swal.fire({
                    title: '<h2> Editar usuario <h2>',
                    html:
                        '<label for="nombre" class="css-label"> Nombre completo: </label>' +
                        '<input id="nombre" class="swal2-input css-input" placeholder="Ingrese el nombre" value=""> ' +
                        '<br>' +
                        '<label for="correo" class="css-label"> Correo: </label>' +
                        '<br>' +
                        '<input id="correo" class="swal2-input css-input" placeholder="Ingrese el correo" value=""> ' +
                        '<br>' +
                        '<label for="contraseña" class="css-label"> Contraseña: </label>' +
                        '<input id="contraseña" class="swal2-input css-input" placeholder="Ingrese una contraseña" value="">',
                    focusConfirm: false,
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    preConfirm: () => {
                        const nombre = $('#nombre').val();
                        const correo = $('#correo').val();
                        const contraseña = $('#contraseña').val();
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        const nameRegex = /^[a-zA-Z\s]*$/; 
                        if (!nombre || !correo || !contraseña) {
                            Swal.showValidationMessage('Por favor, completa todos los campos');
                        } else if (!emailRegex.test(correo)) {
                            Swal.showValidationMessage('Formato de correo electrónico no válido');
                        } else if (!nameRegex.test(nombre)) {
                            Swal.showValidationMessage('El nombre solo puede contener letras y espacios');
                        } else {
                            $.ajax({
                                type: "POST",
                                url: "../funciones/funciones.php",
                                data: {
                                    id: IdUsuario,
                                    nombre: nombre,
                                    correo: correo,
                                    contraseña: contraseña,
                                    accion: 'editar_usuario'
                                },
                                success: function(response) {
                                    Swal.fire('Éxito', 'El usuario ha sido actualizado.', 'success').then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload(); 
                                        }
                                    });
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire('Error', 'Hubo un error al editar el usuario: ' + error, 'error');
                                }
                            });
                        }
                    }
                });

               
                $.ajax({
                    type: "POST",
                    url: "../funciones/funciones.php",
                    data: {
                        id: IdUsuario,
                        accion: 'mostrar_usuario'
                    },
                    success: function(response) {
                        const userData = JSON.parse(response);

                        if (userData) {
                            $('#nombre').val(userData.nombre);
                            $('#correo').val(userData.correo);
                            $('#contraseña').val(userData.contraseña);
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Error', 'Hubo un error al cargar los datos del usuario: ' + error, 'error');
                    }
                });
            });
        });

    </script>

    <script>
        $('.btn-view').on('click', function(e) {
            e.preventDefault();
            const IdUsuario = $(this).data('id');

            Swal.fire({
                didOpen: () => {
                    $.ajax({
                        type: "POST",
                        url: "../funciones/funciones.php",
                        data: {
                            id: IdUsuario,
                            accion: 'mostrar_usuario'
                        },
                        success: function(response) {
                            // Parse the response from the server, assuming it's in JSON format
                            const userData = JSON.parse(response);

                            if (userData) {
                                // Extract and display user information
                                const name = userData.nombre;
                                const email = userData.correo;
                                const password = userData.contraseña;

                                Swal.update({
                                    title: 'Datos del usuario:',
                                    html: `<p class="css-label">Nombre: </p> <p>${name}</p>
                                            <p class="css-label">Correo: </p> <p> ${email}</p>
                                            <p class="css-label">Contraseña: </p> <p>${password}</p>`,
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error',
                                'Hubo un error al cargar los datos del usuario: ' + error,
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
        const IdUsuario = $(this).data('id');

        Swal.fire({
            title: '¿Estás seguro de eliminar este usuario?',
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
                id: IdUsuario,
                accion: 'eliminar_usuario'
                },
                success: function(response) {
                Swal.fire(
                    'Eliminado',
                    'El usuario fue eliminado correctamente.',
                    'success'
                );
                location.reload();
                },
                error: function(xhr, status, error) {
                Swal.fire(
                    'Error',
                    'Hubo un error al eliminar el usuario: ' + error,
                    'error'
                );
                }
            });
            }
        });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "lengthMenu": [5, 10, 25, 50],
                "pageLength": 10,
                "searching": true,
                "dom": '<"top"lfr>t<"bottom"ip>',
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "search": "Buscar:",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>


</html>