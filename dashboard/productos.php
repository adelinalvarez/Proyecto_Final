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
            <div style= "color:white"> <?php echo $_SESSION['correo']; ?></div>
            <div> 
                <a class="header_toggle" href="../funciones/cerrarSesion.php"> 
                    <i class='bx bx-log-out'></i> 
                </a> 
            </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <div class="nav_list"> 
                        <a href="index.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                        <a href="usuarios.php" class="nav_link"> <i class='bx bx-user-plus nav_icon'></i> <span class="nav_name">Administradores</span> </a> 
                        <a href="productos.php" class="nav_link active"> <i class='bx bx-restaurant nav_icon'></i> <span class="nav_name">Productos</span> </a> 
                        <a href="categorias.php" class="nav_link"> <i class='bx bx-folder-plus nav_icon'></i> <span class="nav_name">Categorias</span> </a> 
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
                                            <td> <img src="../product_images/<?php echo $fila['imagen']?>" alt="Imagen del producto" style="max-width: 100px;"></td>
                                            <td><?php echo $fila['nombre']; ?></td>
                                            <td><?php echo $fila['descripcion']; ?></td>
                                            <td><?php echo $fila['categoria']; ?></td>
                                            <td>
                                                <span><i class='bx bx-dollar'></i></span><?php echo $fila['precio']; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-view" href="#" data-id="<?php echo $fila['IdProducto']?>" >
                                                    <i class='bx bxs-user-detail'></i>
                                                </a>
                                                <a class="btn btn-edit" href="#" data-id="<?php echo $fila['IdProducto']?>">
                                                    <i class='bx bxs-edit'></i>
                                                </a>
                                                <a class="btn btn-del" href="#" data-id="<?php echo $fila['IdProducto']?>"> 
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
      $('.btn-add').on('click', function(e) {
            Swal.fire({
                title: "Agregar nuevo producto",
                html: `
                    <form action="../funciones/funciones.php" method="POST" enctype="multipart/form-data">
                        <div class="column">
                            <label class="css-label" for="customFile">Agregar imagen</label>
                            <input type="file" name="imagen" id="imagen" class="css-input" style="display: none;" required />
                            <input type="file" name="imagen" id="imagen" class="css-input" style="display: block; width: 100%;" />
                            <br>                            
                            <label for="Nombre" class="css-label"> Nombre: </label>
                            <input type="text" id="nombre" name="nombre" class="css-input" style="display: block; width: 100%;" required>
                            <br>
                            <label for "Categoria" class="css-label">Categoria:</label>
                            <select name="NombreCategoria" id="NombreCategoria" class="css-input" style="display: block; width: 100%;" required>
                                <?php
                                    $conexion = $GLOBALS['conex'];                
                                    $SQL = mysqli_query($conexion, "SELECT categorias.NombreCategoria FROM categorias");
                                    while ($row = mysqli_fetch_assoc($SQL)) {
                                        echo "<option value='" . $row['NombreCategoria'] . "'>" . $row['NombreCategoria'] . "</option>";
                                    }
                                ?>
                            </select>
                            <br>
                            <label for="Precio" class="css-label">Precio:</label>
                            <input type="number" id="precio" name="precio" class="css-input" style="display: block; width: 100%;" required>
                            <br>
                            <p id="errorPrecio" style="color: red;"></p>
                        </div>
                        <div class="divider"></div>
                        <div class="column">
                            <label for="Descripcion" class="css-label"> Descripcion:</label>
                            <textarea id="descripcion" name="descripcion" rows="14"  style="width: 100%;" class="css-input" required> </textarea>
                        </div>
                        <br>
                    </form>`,
                showCancelButton: true,
                confirmButtonText: "Agregar",
                preConfirm: () => {
                    const formData = new FormData(document.querySelector('form'));
                    const nombre = $('#nombre').val();
                    const imagen = $('#imagen').val();
                    const descripcion = $('#descripcion').val();
                    const NombreCategoria = $('#NombreCategoria').val();
                    const precio = $('#precio').val();

                    // Verificar si el valor del precio es un número
                    if (isNaN(precio)) {
                        $('#errorPrecio').text('Solo se permiten números en el campo de precio.');
                        return false;
                    }
                    if (isNaN(precio) || parseFloat(precio) < 1) {
                        $('#errorPrecio').text('Ingrese un precio válido (mayor o igual a 1).');
                        return false;
                    }

                    // Verificar si el nombre contiene números
                    if (/\d/.test(nombre)) {
                        $('#nombre').val('');
                        $('#nombre').focus();
                        Swal.showValidationMessage('El nombre no puede contener números.');
                        return false;
                    }


                    if (!nombre || !precio) {
                        Swal.showValidationMessage('Por favor, completa todos los campos');
                    } else {
                        formData.append('nombre', nombre);
                        formData.append('imagen', imagen);
                        formData.append('descripcion', descripcion);
                        formData.append('NombreCategoria', NombreCategoria);
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
                                        location.reload(); 
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
        $(document).ready(function() {
            $('.btn-edit').on('click', function(e) {
                e.preventDefault();
                const IdProducto = $(this).data('id');

                Swal.fire({
                    title: 'Editar Producto',
                    html: `
                        <form action="../funciones/funciones.php" method="POST" enctype="multipart/form-data">
                        <div class="column">
                            <img id="imagenActual" src="" alt="Imagen del producto" style="max-width: 100px; hei">
                            <br>
                            <label class="css-label" for="customFile">Agregar imagen</label>
                            <input type="file" name="imagen" id="imagen" class="css-input" style="display: none;" required />
                            <input type="file" name="imagen" id="imagen" class="css-input" style="display: block; width: 100%;" />
                            <br>
                            <label for="Nombre" class="css-label"> Nombre: </label>
                            <input type="text" id="nombre" name="nombre" class="css-input" style="display: block; width: 100%;" required>
                            <br>
                            <label for "Categoria" class="css-label">Categoria:</label>
                            <select name="NombreCategoria" id="NombreCategoria" class="css-input" style="display: block; width: 100%;" required>
                                <?php $conexion = $GLOBALS['conex'];
                                    $SQL = mysqli_query($conexion, "SELECT categorias.NombreCategoria FROM categorias");
                                    while ($row = mysqli_fetch_assoc($SQL)) {
                                        echo "<option value='" . $row['NombreCategoria'] . "'>" . $row['NombreCategoria'] . "</option>";
                                    }
                                    ?>
                            </select>
                            <br>
                            <label for="Precio" class="css-label">Precio:</label>
                            <input type="number" id="precio" name="precio" class="css-input" style="display: block; width: 100%;" required>
                            <br>
                            <p id="errorPrecio" style="color: red;"></p>
                        </div>
                        <div class="divider"></div>
                        <div class="column">
                            <label for="Descripcion" class="css-label"> Descripcion:</label>
                            <textarea id="descripcion" name="descripcion" rows="14"  style="width: 100%;" class="css-input" required> </textarea>
                        </div>
                        <br>
                    </form>`,
                    focusConfirm: false,
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    preConfirm: () => {
                        const formData = new FormData(document.querySelector('form'));
                        const nombre = $('#nombre').val();
                        const descripcion = $('#descripcion').val();
                        const NombreCategoria = $('#NombreCategoria').val();
                        const precio = $('#precio').val();
                        const imagen = $('#imagen').val();
                    // Verificar si el valor del precio es un número
                    if (isNaN(precio)) {
                        $('#errorPrecio').text('Solo se permiten números en el campo de precio.');
                        return false;
                    }
                    if (isNaN(precio) || parseFloat(precio) < 1) {
                        $('#errorPrecio').text('Ingrese un precio válido (mayor o igual a 1).');
                        return false;
                    }

                    // Verificar si el nombre contiene números
                    if (/\d/.test(nombre)) {
                        $('#nombre').val('');
                        $('#nombre').focus();
                        Swal.showValidationMessage('El nombre no puede contener números.');
                        return false;
                    }

                        if (!validateNombre(nombre) || !validatePrecio()) {
                            Swal.showValidationMessage('Por favor, completa el campo de Nombre y asegúrate de ingresar un precio válido.');
                            return false;
                        } else {
                            formData.append('id', IdProducto);
                            formData.append('nombre', nombre);
                            formData.append('imagen', imagen);
                            formData.append('descripcion', descripcion);
                            formData.append('NombreCategoria', NombreCategoria);
                            formData.append('precio', precio);
                            formData.append('accion', 'editar_productos');

                            $.ajax({
                                type: "POST",
                                url: "../funciones/funciones.php",
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    Swal.fire('Éxito', 'El producto ha sido actualizado.', 'success').then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload(); // Recarga la página
                                        }
                                    });
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire('Error', 'Hubo un error al editar el producto: ' + error, 'error');
                                }
                            });
                        }
                    }
                });

                // Realiza una solicitud AJAX para cargar los datos del producto y mostrarlos en el formulario
                $.ajax({
                    type: "POST",
                    url: "../funciones/funciones.php",
                    data: {
                        id: IdProducto,
                        accion: 'mostrar_productos'
                    },
                    success: function(response) {
                        const productoData = JSON.parse(response);

                        if (productoData) {
                            $('#nombre').val(productoData.nombre);
                            $('#descripcion').val(productoData.descripcion);
                            $('#NombreCategoria').val(productoData.categoria);
                            $('#precio').val(productoData.precio);
                            $('#imagenActual').attr('src', '../product_images/' + productoData.imagen);
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Error', 'Hubo un error al cargar los datos del producto: ' + error, 'error');
                    }
                });
            });
        });

        function validateNombre(nombre) {
            return nombre.trim() !== '';
        }

        function validatePrecio() {
            const precio = $('#precio').val().trim();
            return /^\d+$/.test(precio); // Devuelve true si el precio es un número entero, de lo contrario, false
        }
    </script>    

    <script>
        $(document).ready(function () {
            $('.btn-view').on('click', function () {
                const IdProducto = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: "../funciones/funciones.php", 
                    data: {
                        id: IdProducto,
                        accion: 'mostrar_productos'
                    },
                    success: function (response) {
                        const productosData = JSON.parse(response);

                        if (productosData) {
                            Swal.fire({
                                title: 'Datos del producto:',
                                html: `<p class="css-label">nombre: </p> <p>${productosData.nombre}</p>
                                       <p class="css-label">descripcion: </p> <p>${productosData.descripcion}</p>
                                       <p class="css-label">categoria: </p> <p>${productosData.NombreCategoria}</p>
                                       <p class="css-label">precio: </p> <p>${productosData.precio}</p>`,
                            });
                        } else {
                            Swal.fire('Error', 'No se pudo cargar los datos del producto', 'error');
                        }
                    },
                    error: function () {
                        Swal.fire('Error', 'Hubo un error en la solicitud', 'error');
                    }
                });
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

    <style>
        .column {
            width: 40%;
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