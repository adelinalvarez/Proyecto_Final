<?php
   
require_once ("_db.php");

if (isset($_POST['accion'])) { 
    switch ($_POST['accion']) {
        //casos de registros
        case 'acceso_user':
            acceso_user();
            break;

        case 'mostrar_productos':
            mostrar_productos();
            break;
    }
}

function acceso_user() {
    session_start();
    
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $_SESSION['correo'] = $correo;

    $conexion = $GLOBALS['conex']; 
    $consulta = "SELECT * FROM usuarios WHERE correo='$correo' AND contraseña='$contraseña'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $filas = mysqli_fetch_array($resultado);
        $correo = $filas['correo'];
        $contraseña = $filas['contraseña'];
        $nombre = $filas['nombre'];

        $_SESSION['correo'] = $correo;

        if ($filas['correo'] == $correo && $filas['contraseña'] == $contraseña) { //admin
            header('Location: ../dashboard/index.php');
            exit;
        } else {
            header("location: ../vistas/login.php?fallo=true");
            session_destroy();
            exit;
        }
    } else {
        header("location: ../vistas/login.php?fallo=true");
        session_destroy();
        exit;
    }
}

function mostrar_productos() {
    header('Content-Type: application/json'); // Asegurarse de que el contenido se interprete como JSON

    if (isset($_POST['id'])) {
        $IdProducto = $_POST['id'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "SELECT IdProducto, nombre, descripcion, categoria, precio FROM productos WHERE IdProducto = '$IdProducto'");

        if ($consulta) {
            $producto = mysqli_fetch_assoc($consulta);
            if ($producto) {
                echo json_encode($producto);
            } else {
                echo json_encode(["error" => "No se encontraron datos para el ID del producto proporcionado."]);
            }
        } else {
            echo json_encode(["error" => "Error en la consulta SQL: " . mysqli_error($conexion)]);
        }
    } else {
        echo json_encode(["error" => "ID del producto no proporcionado"]);
    }
}

// Llamar a la función si se está haciendo una solicitud POST para mostrar los detalles del producto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    mostrar_productos();
    exit; // Asegurarse de que no haya más salida después de la respuesta JSON
}
?>
