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
        <title> Categorias - Doña Hilda Tapas and Grill</title>
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
                        <a href="categorias.php" class="nav_link active"> <i class='bx bx-folder-plus nav_icon'></i> <span class="nav_name">Categorias</span> </a> 
                        <a href="reservas.php" class="nav_link"> <i class='bx bx-food-menu nav_icon'></i> <span class="nav_name">Reservas</span> </a> 
                        <a href="contactos.php" class="nav_link"> <i class='bx bx-chat nav_icon'></i> <span class="nav_name">Contactos</span> </a> 
                        <a href="clientes.php" class="nav_link "> <i class='bx bx-group nav_icon'></i> <span class="nav_name">Clientes</span> </a> 
                        <a href="ordenes.php" class="nav_link"> <i class='bx bx-cart-add nav_icon'></i> <span class="nav_name">Ordenes</span> </a> 
                    </div>
                </div>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">
            <br>
            <h1 class="text-center color-white"> Categorias </h1>
            <div class="row py-5">
                <div class="col-lg-10 mx-auto">
                    <div class="card rounded shadow border-0"> 
                        <div class="card-body p-5 bg-white rounded">
                            <div class="text-end mb-3"> 
                            <a class="btn btn-dark text-white btn-add" href="#">
                                Agregar nueva categoria <i class='bx bxs-user-plus text-white'></i>
                            </a>
                            </div>
                            <div class="table-responsive">
                                <table id="example" style="width:100%" class="table table-striped table-bordered">
                                    <thead class="text-center" style="background-color: black; color:white;">
                                        <tr>
                                            <th>Id Categoria</th>
                                            <th>Nombre Categoria</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $conexion=$GLOBALS['conex'];                
                                            $SQL=mysqli_query($conexion,"SELECT categorias.IdCategoria, categorias.NombreCategoria FROM categorias");
                                            while($fila=mysqli_fetch_assoc($SQL)):
                                        ?>
                                        <tr>
                                            <td><?php echo $fila['IdCategoria']; ?></td>
                                            <td><?php echo $fila['NombreCategoria']; ?></td>

                                            <td>

                                                <a class="btn btn-view" href="#" data-id="<?php echo $fila['IdCategoria']?>" >
                                                    <i class='bx bxs-user-detail'></i>
                                                </a>
                                                <a class="btn btn-edit" href="#" data-id="<?php echo $fila['IdCategoria']?>">
                                                    <i class='bx bxs-edit'></i>
                                                </a>

                                                <a class="btn btn-del" href="#" data-id="<?php echo $fila['IdCategoria']?>"> <i class='bx bxs-trash-alt'></i> </a>
                                            
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
                    title: '<h2> Agregar nueva categoria </h2>',
                    html:
                        '<label for="NombreCategoria" class="css-label"> Nombre de la categoria: </label>' +
                        '<input id="NombreCategoria" class="swal2-input css-input" placeholder="Ingrese el nombre de la categoria" value=""> ' +
                        '<br>',
                    focusConfirm: false,
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    preConfirm: () => {
                        const NombreCategoria = $('#NombreCategoria').val();

                        if (!NombreCategoria) {
                            Swal.showValidationMessage('Por favor, completa todos los campos');
                        } else {
                            $.ajax({
                                type: "POST",
                                url: "../funciones/funciones.php",
                                data: {
                                    NombreCategoria: NombreCategoria,
                                    accion: 'validar_categorias'
                                },
                                success: function(response) {
                                    Swal.fire('Éxito', 'La nueva categoria ha sido agregada.', 'success').then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload(); // Recarga la página
                                        }
                                    });
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire('Error', 'Hubo un error al agregar la nueva categoria: ' + error, 'error');
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
                const IdCategoria = $(this).data('id');

                Swal.fire({
                    title: '<h2> Editar categoria <h2>',
                    html:
                        '<label for="NombreCategoria" class="css-label"> Nombre de la categoria: </label>' +
                        '<input id="NombreCategoria" class="swal2-input css-input" placeholder="Ingrese el nombre de la categoria" value=""> ' +
                        '<br>',
                    focusConfirm: false,
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    preConfirm: () => {
                        const NombreCategoria = $('#NombreCategoria').val();

                        if (!NombreCategoria) {
                            Swal.showValidationMessage('Por favor, completa todos los campos');
                        } else {
                            $.ajax({
                                type: "POST",
                                url: "../funciones/funciones.php",
                                data: {
                                    id: IdCategoria,
                                    NombreCategoria: NombreCategoria,
                                    accion: 'editar_categorias'
                                },
                                success: function(response) {
                                    Swal.fire('Éxito', 'La categoria ha sido actualizada.', 'success').then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload(); // Recarga la página
                                        }
                                    });
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire('Error', 'Hubo un error al editar la categoria: ' + error, 'error');
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
                        id: IdCategoria,
                        accion: 'mostrar_categorias'
                    },
                    success: function(response) {
                        const userData = JSON.parse(response);

                        if (userData) {
                            $('#NombreCategoria').val(userData.NombreCategoria);
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Error', 'Hubo un error al cargar los datos de la categoria: ' + error, 'error');
                    }
                });
            });
        });
    </script>

    <script>
        $('.btn-view').on('click', function(e) {
            e.preventDefault();
            const IdCategoria = $(this).data('id');

            Swal.fire({
                didOpen: () => {
                    $.ajax({
                        type: "POST",
                        url: "../funciones/funciones.php",
                        data: {
                            id: IdCategoria,
                            accion: 'mostrar_categorias'
                        },
                        success: function(response) {
                            // Parse the response from the server, assuming it's in JSON format
                            const userData = JSON.parse(response);

                            if (userData) {
                                // Extract and display user information
                                const IdCategoria = userData.IdCategoria;
                                const NombreCategoria = userData.NombreCategoria;

                                Swal.update({
                                    title: 'Datos de la categoria:',
                                    html: `<p class="css-label">Id Categoria: </p> <p>${IdCategoria}</p>
                                            <p class="css-label">Nombre Categoria: </p> <p> ${NombreCategoria}</p>`,
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
        const IdCategoria = $(this).data('id');

        Swal.fire({
            title: '¿Estás seguro de eliminar esta categoria?',
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
                id: IdCategoria,
                accion: 'eliminar_categorias'
                },
                success: function(response) {
                Swal.fire(
                    'Eliminado',
                    'La categoria fue eliminado correctamente.',
                    'success'
                );
                location.reload();
                },
                error: function(xhr, status, error) {
                Swal.fire(
                    'Error',
                    'Hubo un error al eliminar la categoria: ' + error,
                    'error'
                );
                }
            });
            }
        });
        });
    </script>

</html>