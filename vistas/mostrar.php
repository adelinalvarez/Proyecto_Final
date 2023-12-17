<?php
require_once ("../funciones/_db.php");

if (isset($_GET['id'])) {
    $IdProducto = $_GET['id'];

    if ($conex) {
        $consulta = mysqli_query($conex, "SELECT IdProducto, nombre, descripcion, categoria, precio, imagen FROM productos WHERE IdProducto = '$IdProducto'");

        if ($consulta) {
            $producto = mysqli_fetch_assoc($consulta);

            if ($producto) {
                // Muestra la información del producto en una card
                ?>
                <!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Detalles del Producto</title>
                    <!-- Agrega el enlace al CSS de Bootstrap si aún no lo has hecho -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="...">
                    <style>
                        body {
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            height: 100vh;
                            margin: 0;
                        }
                        .custom-card {
                            width: 18rem;
                            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
                        }
                    </style>
                </head>
                <body>
                    <div class="card custom-card">
                        <img src="/Proyecto_Final/product_images/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="Imagen del Producto">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                            <p class="card-text">ID del Producto: <?php echo $producto['IdProducto']; ?></p>
                            <p class="card-text">Descripción: <?php echo $producto['descripcion']; ?></p>
                            <p class="card-text">Categoría: <?php echo $producto['categoria']; ?></p>
                            <p class="card-text">Precio: <?php echo $producto['precio']; ?></p>
                        </div>
                    </div>
                </body>
                </html>
                <?php
            } else {
                echo "No se encontraron datos para el producto con ID: $IdProducto";
            }
        } else {
            echo "Error al obtener los datos del producto: " . mysqli_error($conex);
        }
    } else {
        echo "Error: No se ha establecido la conexión a la base de datos.";
    }
} else {
    echo "ID del producto no proporcionado";
}
?>