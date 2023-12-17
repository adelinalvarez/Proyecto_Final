<?php
require_once("../funciones/_db.php");
session_start();
error_reporting(E_ALL);

$validarusuarios = $_SESSION['correo'];

if ($validarusuarios == null || $validarusuarios == '') {
    header("Location: ../index.php");
    die();
}

// Consulta para obtener la cantidad de usuarios
$sqlUsuarios = "SELECT COUNT(*) as cantidad_usuarios FROM usuarios";
$resultadoUsuarios = $conex->query($sqlUsuarios);

if ($resultadoUsuarios) {
    $filaUsuarios = $resultadoUsuarios->fetch_assoc();
    $totalUsuarios = $filaUsuarios['cantidad_usuarios'];
} else {
    echo "Error en la consulta de usuarios: " . $conex->error;
}

// Consulta para obtener la cantidad de productos
$sqlProductos = "SELECT COUNT(*) as cantidad_productos FROM productos";
$resultadoProductos = $conex->query($sqlProductos);

if ($resultadoProductos) {
    $filaProductos = $resultadoProductos->fetch_assoc();
    $totalProductos = $filaProductos['cantidad_productos'];
} else {
    echo "Error en la consulta de productos: " . $conex->error;
}

// Consulta para obtener la cantidad de categorías
$sqlCategorias = "SELECT COUNT(*) as cantidad_categorias FROM categorias";
$resultadoCategorias = $conex->query($sqlCategorias);

if ($resultadoCategorias) {
    $filaCategorias = $resultadoCategorias->fetch_assoc();
    $totalCategorias = $filaCategorias['cantidad_categorias'];
} else {
    echo "Error en la consulta de categorías: " . $conex->error;
}

// Consulta para obtener la cantidad de reservas
$sqlReservas = "SELECT COUNT(*) as cantidad_reservas FROM reservas";
$resultadoReservas = $conex->query($sqlReservas);

if ($resultadoReservas) {
    $filaReservas = $resultadoReservas->fetch_assoc();
    $totalReservas = $filaReservas['cantidad_reservas'];
} else {
    echo "Error en la consulta de reservas: " . $conex->error;
}

// Consulta para obtener la cantidad de contactos
$sqlContactos = "SELECT COUNT(*) as cantidad_contactos FROM contactos";
$resultadoContactos = $conex->query($sqlContactos);

if ($resultadoContactos) {
    $filaContactos = $resultadoContactos->fetch_assoc();
    $totalContactos = $filaContactos ['cantidad_contactos'];
} else {
    echo "Error en la consulta de contactos: " . $conex->error;
}

// Consulta para obtener la cantidad de clientes
$sqlClientes = "SELECT COUNT(*) as cantidad_clientes FROM clientes";
$resultadoClientes = $conex->query($sqlClientes);

if ($resultadoClientes) {
    $filaClientes = $resultadoClientes->fetch_assoc();
    $totalClientes = $filaClientes ['cantidad_clientes'];
} else {
    echo "Error en la consulta de clientes: " . $conex->error;
}

// Consulta para obtener la cantidad de ordenes
$sqlOrdenes = "SELECT COUNT(*) as cantidad_ordenes FROM orden";
$resultadoOrdenes = $conex->query($sqlOrdenes);

if ($resultadoOrdenes) {
    $filaOrdenes = $resultadoOrdenes->fetch_assoc();
    $totalOrdenes = $filaOrdenes ['cantidad_ordenes'];
} else {
    echo "Error en la consulta de ordenes: " . $conex->error;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../imagenes/Logo.png">
        <title>Dashboard - Doña Hilda Tapas and Grill</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="css/dashboard.css">
        <script type="text/javascript" src="js/dashboard.js"></script>
    </head>

    <body id="body-pd">

        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div style="color:white"> <?php echo $_SESSION['correo']; ?></div>
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
            <br>
            <h4 class="text-center"> Panel Administrativo </h4>
            <br>

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