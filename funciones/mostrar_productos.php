<?php
require_once ("_db.php");

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        //casos de registros
        case 'acceso_user':
            acceso_user();
            break;

        case 'mostrar_producto':
            mostrar_producto();
            break;
    }
}

function acceso_user() {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    session_start();
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
        } else {
            header("location: ../vistas/login.php?fallo=true");
            session_destroy();
        }
    } else {
        header("location: ../vistas/login.php?fallo=true");
        session_destroy();
    }
}

function mostrar_producto() {
    if (isset($_POST['id'])) {
        $IdProducto = $_POST['id'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "SELECT IdProducto, nombre, descripcion, categoria, precio FROM productos WHERE IdProducto = '$IdProducto'");

        if ($consulta) {
            $producto = mysqli_fetch_assoc($consulta);
            
            // Convertir el resultado a JSON y enviarlo como respuesta
            header('Content-Type: application/json'); // Establecer el tipo de contenido como JSON
            echo json_encode($producto);
        } else {
            echo json_encode(["error" => "Error al obtener los datos del producto"]);
        }
    } else {
        echo json_encode(["error" => "ID del producto no proporcionado"]);
    }
}

?>
