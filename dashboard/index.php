<?php
require_once ("../funciones/_db.php");
session_start();
error_reporting(0);

$validarusuarios = $_SESSION['correo'];

if ($validarusuarios == null || $validarusuarios = '') {
    header("Location: ../index.php");
    die();
}

// Conexión a la base de datos (reemplaza los datos con los tuyos)
$conexion = mysqli_connect("localhost", "root", "", "hilda");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta para obtener la cantidad de usuarios
$sqlUsuarios = "SELECT COUNT(*) AS totalUsuarios FROM usuarios";
$resultUsuarios = mysqli_query($conexion, $sqlUsuarios);
$rowUsuarios = mysqli_fetch_assoc($resultUsuarios);
$totalUsuarios = $rowUsuarios['totalUsuarios'];

$sqlCategorias = "SELECT COUNT(*) AS totalCategorias FROM categorias";
$resultCategorias = mysqli_query($conexion, $sqlCategorias);
$rowCategorias = mysqli_fetch_assoc($resultCategorias);
$totalCategorias = $rowCategorias['totalCategorias'];

$sqlProductos = "SELECT COUNT(*) AS totalProductos FROM productos";
$resultProductos = mysqli_query($conexion, $sqlProductos);
$rowProductos = mysqli_fetch_assoc($resultProductos);
$totalProductos = $rowProductos['totalProductos'];

$sqlReservas = "SELECT COUNT(*) AS totalReservas FROM reservas";
$resultReservas = mysqli_query($conexion, $sqlReservas);
$rowReservas = mysqli_fetch_assoc($resultReservas);
$totalReservas = $rowReservas['totalReservas'];

$sqlContactos = "SELECT COUNT(*) AS totalContactos FROM contactos";
$resultContactos = mysqli_query($conexion, $sqlContactos);
$rowContactos = mysqli_fetch_assoc($resultContactos);
$totalContactos = $rowContactos['totalContactos'];

$sqlClientes = "SELECT COUNT(*) AS totalClientes FROM clientes";
$resultClientes = mysqli_query($conexion, $sqlClientes);
$rowClientes = mysqli_fetch_assoc($resultClientes);
$totalClientes = $rowClientes['totalClientes'];

$sqlOrdenes = "SELECT COUNT(*) AS totalOrdenes FROM ordenes";
$resultOrdenes = mysqli_query($conexion, $sqlOrdenes);
$rowOrdenes = mysqli_fetch_assoc($resultOrdenes);
$totalOrdenes = $rowUsuarios['totalOrdenes'];

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
        <script type="text/javascript" src="js/dashboard.js"> </script>
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
                        <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                        <a href="usuarios.php" class="nav_link"> <i class='bx bx-user-plus nav_icon'></i> <span class="nav_name">Administradores</span> </a> 
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
        <div class="height-100 bg-light">
        <h4>Panel Administrativo</h4>

        <!-- Tarjetas para mostrar la cantidad de elementos en cada tabla -->
            <div class="row">
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Usuarios</h5>
                            <p class="card-text"><?php echo $totalUsuarios; ?></p>
                        </div>
                    </div>
                </div>
                <!-- Repite esta estructura para cada tabla -->
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Productos</h5>
                            <p class="card-text"><?php echo $totalProductos; ?></p>
                        </div>
                    </div>
                </div>
                <!-- ... Repite esta estructura para cada tabla -->
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Categorías</h5>
                            <p class="card-text"><?php echo $totalCategorias; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Reservas</h5>
                            <p class="card-text"><?php echo $totalReservas; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Contactos</h5>
                            <p class="card-text"><?php echo $totalContactos; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Clientes</h5>
                            <p class="card-text"><?php echo $totalClientes; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ordenes</h5>
                            <p class="card-text"><?php echo $totalOrdenes; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>