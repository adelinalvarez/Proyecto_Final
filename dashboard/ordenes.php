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
        <title> Clientes - Doña Hilda Tapas and Grill</title>
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
                        <a href="contactos.php" class="nav_link"> <i class='bx bx-chat nav_icon'></i> <span class="nav_name">Contactos</span> </a> 
                        <a href="clientes.php" class="nav_link"> <i class='bx bx-group nav_icon'></i> <span class="nav_name">Clientes</span> </a> 
                        <a href="ordenes.php" class="nav_link active"> <i class='bx bx-cart-add nav_icon'></i> <span class="nav_name">Ordenes</span> </a> 
                    </div>
                </div>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">
            <br>
            <h1 class="text-center color-white"> Ordenes </h1>
            <div class="row py-5">
                <div class="col-lg-10 mx-auto">
                    <div class="card rounded shadow border-0"> 
                        <div class="card-body p-5 bg-white rounded">
                            <div class="table-responsive">
                                <table id="example" style="width:100%" class="table table-striped table-bordered">
                                    <thead class="text-center" style="background-color: black; color:white;">
                                        <tr>
                                            <th>Id Orden</th>
                                            <th>Id Cliente</th>
                                            <th>Fecha</th>
                                            <th>Id Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $conexion = $GLOBALS['conex'];                
                                            $SQL = mysqli_query($conexion, "
                                                SELECT 
                                                    orden.Id AS IdOrden, 
                                                    orden.IdCliente, 
                                                    orden.Fecha, 
                                                    ordendetalle.IdProducto, 
                                                    ordendetalle.Cantidad, 
                                                    ordendetalle.Precio 
                                                FROM 
                                                    orden 
                                                INNER JOIN 
                                                    ordendetalle ON orden.Id = ordendetalle.IdOrden
                                            ");

                                            while ($fila = mysqli_fetch_assoc($SQL)):
                                        ?>
                                            <tr>
                                                <td><?php echo $fila['IdOrden']; ?></td>
                                                <td><?php echo $fila['IdCliente']; ?></td>
                                                <td><?php echo $fila['Fecha']; ?></td>
                                                <td><?php echo $fila['IdProducto']; ?></td>
                                                <td><?php echo $fila['Cantidad']; ?></td>
                                                <td><?php echo $fila['Precio']; ?></td>
                                                <td>
                                                    <a class="btn btn-view" href="#" data-id="<?php echo $fila['IdOrden']?>" >
                                                        <i class='bx bxs-user-detail'></i>
                                                    </a>
                                                    <a class="btn btn-edit" href="#" data-id="<?php echo $fila['IdOrden']?>">
                                                        <i class='bx bxs-edit'></i>
                                                    </a>
                                                    <a class="btn btn-del" href="#" data-id="<?php echo $fila['IdOrden']?>"> <i class='bx bxs-trash-alt'></i> </a>
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
            $('#example').DataTable({
                "searching": true, 
                "search": {"regex": true}, 
                "columnDefs": [
                    { "searchable": false, "targets": [1, 2, 3, 4, 5, 6] } 
                ]
            });
        });
    </script>

    <script>
        $('.btn-view').on('click', function(e) {
            e.preventDefault();
            const IdOrden = $(this).data('id');
            console.log('ID de la orden enviado:', IdOrden);

            Swal.fire({
                didOpen: () => {
                    $.ajax({
                        type: "POST",
                        url: "../funciones/funciones.php",
                        data: {
                            id: IdOrden,
                            accion: 'mostrar_ordenes'
                        },
                        success: function(response) {
                            console.log('Respuesta completa del servidor:', response);

                            try {
                                if (response.trim() !== '') {
                                    const ordenData = JSON.parse(response);

                                    if (!ordenData.error) {
                                        const idOrden = ordenData.IdOrden;
                                        const idCliente = ordenData.IdCliente;
                                        const fecha = ordenData.Fecha;
                                        const idProducto = ordenData.IdProducto;
                                        const cantidad = ordenData.Cantidad;
                                        const precio = ordenData.Precio;

                                        Swal.update({
                                            title: 'Datos de la orden:',
                                            html: `<p class="css-label">ID de la orden: </p> <p>${idOrden}</p>
                                                    <p class="css-label">ID del cliente: </p> <p> ${idCliente}</p>
                                                    <p class="css-label">Fecha: </p> <p>${fecha}</p>
                                                    <p class="css-label">ID del producto: </p> <p>${idProducto}</p>
                                                    <p class="css-label">Cantidad: </p> <p>${cantidad}</p>
                                                    <p class="css-label">Precio: </p> <p>${precio}</p>`,
                                        });
                                    } else {
                                        console.error('Error en la respuesta del servidor:', ordenData.error);
                                        Swal.fire(
                                            'Error',
                                            'Hubo un error al cargar los datos de la orden: ' + ordenData.error,
                                            'error'
                                        );
                                    }
                                } else {
                                    console.error('La respuesta del servidor está vacía o incompleta.');
                                    Swal.fire(
                                        'Error',
                                        'La respuesta del servidor está vacía o incompleta.',
                                        'error'
                                    );
                                }
                            } catch (error) {
                                console.error('Error al analizar la respuesta JSON:', error);
                                Swal.fire(
                                    'Error',
                                    'Hubo un error al cargar los datos de la orden.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error en la solicitud AJAX:', error);
                            Swal.fire(
                                'Error',
                                'Hubo un error en la solicitud AJAX: ' + error,
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
        const IdOrden = $(this).data('id');

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
                id: IdOrden,
                accion: 'eliminar_orden'
                },
                success: function(response) {
                Swal.fire(
                    'Eliminado',
                    'El cliente fue eliminado correctamente.',
                    'success'
                );
                location.reload();
                },
                error: function(xhr, status, error) {
                Swal.fire(
                    'Error',
                    'Hubo un error al eliminar el cliente: ' + error,
                    'error'
                );
                }
            });
            }
        });
        });
    </script>

</html>