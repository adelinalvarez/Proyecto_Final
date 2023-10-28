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
        <title> Productos - Doña Hilda Tapas and Grill</title>
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
                        <a href="productos.php" class="nav_link active"> <i class='bx bx-restaurant nav_icon'></i> <span class="nav_name">Productos</span> </a> 
                        <a href="reservas.php" class="nav_link"> <i class='bx bx-food-menu nav_icon'></i> <span class="nav_name">Reservas</span> </a> 
                        <a href="contactos.php" class="nav_link"> <i class='bx bx-chat nav_icon'></i> <span class="nav_name">Contactos</span> </a> 
                        <a href="clientes.php" class="nav_link "> <i class='bx bx-group nav_icon'></i> <span class="nav_name">Clientes</span> </a> 
                    </div>
                </div>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">
            <br>
            <h1 class="text-center color-white"> Productos </h1>
            <div class="row py-5">
                <div class="col-lg-10 mx-auto">
                    <div class="card rounded shadow border-0"> 
                        <div class="card-body p-5 bg-white rounded">
                            <div class="text-end mb-3"> 
                            <a class="btn btn-dark text-white btn-add" href="#">
                                Agregar nuevo producto <i class='bx bxs-user-plus text-white'></i>
                            </a>
                            </div>
                            <div class="table-responsive">
                                <table id="example" style="width:100%" class="table table-striped table-bordered">
                                    <thead class="text-center" style="background-color: black; color:white;">
                                        <tr>
                                            <th>Id Producto</th>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Categoria</th>
                                            <th>Precio</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $conexion=$GLOBALS['conex'];                
                                            $SQL=mysqli_query($conexion,"SELECT productos.IdProducto, productos.imagen, productos.nombre, productos.descripcion, productos.categoria, productos.precio FROM productos");
                                            while($fila=mysqli_fetch_assoc($SQL)):
                                        ?>
                                        <tr>
                                            <td><?php echo $fila['IdProducto']; ?></td>
                                            <td> <img src="data:image/jpg;base64, <?php echo base64_encode($fila['imagen'])?>" alt="Imagen del producto" style="max-width: 100px;"></td>
                                            <td><?php echo $fila['nombre']; ?></td>
                                            <td><?php echo $fila['descripcion']; ?></td>
                                            <td><?php echo $fila['categoria']; ?></td>
                                            <td><?php echo $fila['precio']; ?></td>
                                            <td>
                                                <a class="btn btn-view" href="#" data-id="<?php echo $fila['IdProducto']?>" >
                                                    <i class='bx bxs-user-detail'></i>
                                                </a>
                                                <a class="btn btn-edit" href="#" data-id="<?php echo $fila['IdProducto']?>">
                                                    <i class='bx bxs-edit'></i>
                                                </a>

                                                <a class="btn btn-del" href="#" data-id="<?php echo $fila['IdProducto']?>"> <i class='bx bxs-trash-alt'></i> </a>
                                            
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
        $('.btn-add').on('click', function(e) {
            Swal.fire({
                title: "Agregar nuevo producto",
                html: `
                <form action="../funciones/funciones.php" method="POST" enctype="multipart/form-data">
                    <div>
                    <label class="css-label" for="customFile">Agregar imagen</label>
                    <input type="file" name="imagen" id="imagen" class="css-input" style="display: none;" required />
                    <input type="file" name="imagen" id="imagen" class="css-input" style="display: block; width: 100%;" />
                    </div>
                    <div>
                    <label for="Nombre" class="css-label"> Nombre: </label>
                    <input type="text" id="nombre" name="nombre" class="css-input" style="display: block; width: 100%;" required>
                    </div>
                    <div>
                    <label for="Descripcion" class="css-label"> Descripcion:</label>
                    <input type="text" id="descripcion" name="descripcion" class="css-input" style="display: block; width: 100%;" required>
                    </div>
                    <div>
                    <label for "Categoria" class="css-label">Categoria:</label>
                    <input type="text" id="categoria" name="categoria" class="css-input" style="display: block; width: 100%;" required>
                    </div>
                    <div>
                    <label for="Precio" class="css-label">Precio:</label>
                    <input type="text" id="precio" name="precio" class="css-input" style="display: block; width: 100%;" required>
                    </div>
                    <br>
                </form>`,
                showCancelButton: true,
                confirmButtonText: "Agregar",
                preConfirm: () => {
                const formData = new FormData(document.querySelector('form'));
                
                // Obtiene los valores de nombre, correo y contraseña desde el formulario
                const nombre = $('#nombre').val();
                const imagen = $('#imagen').val();
                const descripcion = $('#descripcion').val();
                const categoria = $('#categoria').val();
                const precio = $('#precio').val();

                
                if (!nombre) {
                    Swal.showValidationMessage('Por favor, completa todos los campos');
                } else {
                    // Agrega los valores al objeto FormData
                    formData.append('nombre', nombre);
                    formData.append('imagen', imagen);
                    formData.append('descripcion', descripcion);
                    formData.append('categoria', categoria);
                    formData.append('precio', precio);
                    formData.append('accion', 'validar_productos');

                    $.ajax({
                    type: "POST",
                    url: "../funciones/funciones.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        Swal.fire('Éxito', 'El nuevo producto ha sido agregado.', 'success').then((result) => {
                        if (result.isConfirmed) {
                            location.reload(); // Recarga la página
                        }
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Error', 'Hubo un error al agregar el producto: ' + error, 'error');
                    }
                    });
                }
                }
            });
        });
    </script>

    <script>
        $('.btn-view').on('click', function(e) {
            e.preventDefault();
            const IdProducto = $(this).data('id');

            Swal.fire({
                didOpen: () => {
                    $.ajax({
                        type: "POST",
                        url: "../funciones/funciones.php",
                        data: {
                            id: IdProducto,
                            accion: 'mostrar_productos'
                        },
                        success: function(response) {
                            // Parse the response from the server, assuming it's in JSON format
                            const productosData = JSON.parse(response);

                            if (productosData) {
                                // Extract and display user information
                               // const imagen = productosData.imagen;
                               const nombre = productosData.nombre;
                                const descripcion = productosData.descripcion;
                                const categoria = productosData.categoria;
                                const precio = productosData.precio;

                                Swal.update({
                                    title: 'Datos del producto:',
                                  //  <p class="css-label">imagen: </p> <p>${name}</p>
                                    html: `<p class="css-label">nombre: </p> <p>${nombre}</p>
                                            <p class="css-label">descripcion: </p> <p> ${descripcion}</p>
                                            <p class="css-label">categoria: </p> <p>${categoria}</p>
                                            <p class="css-label">precio: </p> <p>${preConfirm}</p>`,
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error',
                                'Hubo un error al cargar los datos del producto: ' + error,
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
        const IdProducto = $(this).data('id');

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
                    id: IdProducto,
                    accion: 'eliminar_productos'
                },
                success: function(response) {
                Swal.fire(
                    'Eliminado',
                    'El producto fue eliminado correctamente.',
                    'success'
                );
                location.reload();
                },
                error: function(xhr, status, error) {
                Swal.fire(
                    'Error',
                    'Hubo un error al eliminar el producto: ' + error,
                    'error'
                );
                }
            });
            }
        });
        });
    </script>

</html>