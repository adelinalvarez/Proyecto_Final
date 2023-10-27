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
        <title> Dashboard - Doña Hilda Tapas and Grill</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> </script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> </script>
        <link rel="stylesheet" href="css/dashboard.css">
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
                        <a href="usuarios.php" class="nav_link active"> <i class='bx bx-user-plus nav_icon'></i> <span class="nav_name">Administradores</span> </a> 
                        <a href="productos.php" class="nav_link"> <i class='bx bx-restaurant nav_icon'></i> <span class="nav_name">Productos</span> </a> 
                        <a href="reservas.php" class="nav_link"> <i class='bx bx-food-menu nav_icon'></i> <span class="nav_name">Reservas</span> </a> 
                        <a href="contactos.php" class="nav_link"> <i class='bx bx-chat nav_icon'></i> <span class="nav_name">Contactos</span> </a> 
                        <a href="clientes.php" class="nav_link"> <i class='bx bx-group nav_icon'></i> <span class="nav_name">Clientes</span> </a> 
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
                            <div class="text-end mb-3"> <!-- Agrega esta línea para alinear a la derecha -->
                                <a class="btn btn-dark text-white"data-toggle="modal" data-target="#createuser"> Agregar nuevo usuario <i class='bx bxs-user-plus text-white'></i> </a>
                            </div>
                            <div class="table-responsive">
                                <table id="example" style="width:100%" class="table table-striped table-bordered">
                                    <thead class="text-center" style="background-color: black; color:white;">
                                        <tr>
                                            <th>Id Usuario</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Contraseña</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $conexion=$GLOBALS['conex'];                
                                            $SQL=mysqli_query($conexion,"SELECT usuarios.IdUsuario, usuarios.nombre, usuarios.correo, usuarios.contraseña FROM usuarios");
                                            while($fila=mysqli_fetch_assoc($SQL)):
                                        ?>
                                        <tr>
                                            <td><?php echo $fila['IdUsuario']; ?></td>
                                            <td><?php echo $fila['nombre']; ?></td>
                                            <td><?php echo $fila['correo']; ?></td>
                                            <td><?php echo $fila['contraseña']; ?></td>
                                            <td>
                                                <a class="btn" href=""> <i class='bx bxs-user-detail'></i> </a>
                                                <a class="btn btn-edit" href="#" 
                                                    data-id="<?php echo $fila['IdUsuario']?>" 
                                                    data-nombre="<?php echo $fila['nombre']?>" 
                                                    data-correo="<?php echo $fila['correo']?>" 
                                                    data-contraseña="<?php echo $fila['contraseña']?>">
                                                    <i class='bx bxs-edit'></i>
                                                </a>
                                                <a class="btn btn-del" href="#" data-id="<?php echo $fila['IdUsuario']?>"> <i class='bx bxs-trash-alt'></i> </a>
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
        <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="edituserLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edituserLabel">Editar usuario</h5>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" action="#">
                        <input type="hidden" name="id" id="editId">
                        <div>
                            <label for="nombre" class="css-label">Nombre Completo:</label>
                            <input type="text" id="nombre" name="nombre" class="css-input" style="display: block; width: 100%;" required>
                        </div>

                        <div>
                            <label for="correo" class="css-label">Correo:</label>
                            <input type="text" id="correo" name="correo" class="css-input" style="display: block; width: 100%;" required>
                        </div>

                        <div>
                            <label for="contraseña" class="css-label">Contraseña:</label>
                            <input type="text" id="contraseña" name="contraseña" class="css-input" style="display: block; width: 100%;" required>
                        </div>
                        <br>

                        <div style="text-align: center;">
                            <a type="button" class="btn-guardar" href="usuarios.php"> Cancelar</a>
                        </div>

                        <div style="text-align: center;">
                            <input type="submit" value="Guardar" id="update" class="btn-guardar" name="actualizar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </body>




    <script>
        // Al hacer clic en el botón de editar
        $('.btn-edit').on('click', function(e){
            e.preventDefault();
            const idUsuario = $(this).data('id');
            const nombre = $(this).data('nombre');
            const correo = $(this).data('correo');
            const contraseña = $(this).data('contraseña');

            // Poblar el formulario de edición con los datos del usuario
            $('#editId').val(idUsuario);
            $('#nombre').val(nombre);
            $('#correo').val(correo);
            $('#contraseña').val(contraseña);

            // Abrir el modal de edición
            $('#edituser').modal('show');
        });

        // Al enviar el formulario de edición
        $('#editUserForm').on('submit', function(e){
            e.preventDefault();

            // Obtener los datos del formulario
            const idUsuario = $('#editId').val();
            const nombre = $('#nombre').val();
            const correo = $('#correo').val();
            const contraseña = $('#contraseña').val();

            // Realizar la solicitud AJAX para editar el usuario
            $.ajax({
                type: "POST",
                url: "../funciones/funciones.php",
                data: {
                    id: idUsuario,
                    nombre: nombre,
                    correo: correo,
                    contraseña: contraseña,
                    accion: 'editar_usuario'
                },
                success: function(response) {
                    // Manejar la respuesta (puedes mostrar un mensaje de éxito o recargar la página)
                    Swal.fire(
                        'Editado',
                        'El usuario se ha editado correctamente.',
                        'success'
                    );
                    // Otra acción que desees realizar, como recargar la tabla
                    location.reload();
                    // Cerrar el modal de edición
                    $('#edituser').modal('hide');
                },
                error: function(xhr, status, error) {
                    // Manejar errores
                    Swal.fire(
                        'Error',
                        'Hubo un error al editar el usuario: ' + error,
                        'error'
                    );
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

</html>