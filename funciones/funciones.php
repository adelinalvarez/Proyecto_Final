<?php
   
require_once ("_db.php");

if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'acceso_user';
            acceso_user();
        break;

        case 'validar_reservas';
            validar_reservas();
        break;

        case 'validar_contacto';
            validar_contacto();
        break;

        case 'validar_usuarios';
            validar_usuarios();
        break;

        case 'eliminar_usuario';
            eliminar_usuario();
        break;

        case 'editar_usuario';
            editar_usuario();
        break;

        case 'mostrar_usuario';
            mostrar_usuario();
        break;

        case 'validar_clientes';
            validar_clientes();
        break;

        case 'eliminar_clientes';
            eliminar_clientes();
        break;

        case 'editar_clientes';
            editar_usuario();
        break;

        case 'mostrar_clientes';
            mostrar_usuario();
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

        $_SESSION['correo'] = $correo;

        if($filas['correo'] == $correo && $filas['contraseña'] == $contraseña){ //admin

            header('Location: ../dashboard/index.php');
    
        }else{
            header("location: ../vistas/login.php?fallo=true");
            session_destroy();
    
        }
    } else {
        header("location: ../vistas/login.php?fallo=true");
        session_destroy();
    }
}


//casos de RESERVAS

function validar_reservas(){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $cantidadPersonas = $_POST['cantidadPersonas'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $evento = $_POST['evento'];
    $area = $_POST['area'];
    $descripcion = $_POST['descripcion'];

    $conexion = $GLOBALS['conex']; 
    $consulta = "SELECT * FROM clientes WHERE correo ='$correo' AND celular = '$celular'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $filas = mysqli_fetch_array($resultado);
        $correo = $filas['correo'];
        $celular = $filas['celular'];
        $IdCliente = $filas['IdCliente'];

        if($filas['correo'] == $correo){ //admin

            $consulta = "INSERT INTO reservas (IdCliente, cantidadPersonas, fecha, hora, evento, area, descripcion)
            VALUES ('$IdCliente','$cantidadPersonas', '$fecha', '$hora', '$evento', '$area', '$descripcion')";
            $resultado=mysqli_query($conexion, $consulta);
            header('Location: ../vistas/reservas.php'); 
    
        }else{

            $consulta = "INSERT INTO clientes (nombre, correo, celular)
            VALUES ('$nombre', '$correo', '$celular')";
            $resultado=mysqli_query($conexion, $consulta);
            $filas = mysqli_fetch_array($resultado);
            $IdCliente = $filas['IdCliente'];
            $consulta = "INSERT INTO reservas (IdCliente, cantidadPersonas, fecha, hora, evento, area, descripcion)
            VALUES ('$IdCliente','$cantidadPersonas', '$fecha', '$hora', '$evento', '$area', '$descripcion')";
            $resultado=mysqli_query($conexion, $consulta);
            header('Location: ../vistas/reservas.php');
    
        }
    } else {
        $consulta = "INSERT INTO clientes (nombre, correo, celular)
        VALUES ('$nombre', '$correo', '$celular')";
        $resultado=mysqli_query($conexion, $consulta);
    }
}

function eliminar_reservas() {
    if (isset($_POST['idReservas'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $cantidadPersonas = $_POST['cantidadPersonas'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $evento = $_POST['evento'];
    $area = $_POST['area'];
    $descripcion = $_POST['descripcion'];


        $consulta = mysqli_query($conexion, "DELETE FROM reservas WHERE IdReservas = '$IdReservas'");
        
        if ($consulta) {
            header('Location: ../dashboard/reservas.php');
        } else {
            echo "Error al eliminar la reserva";
        }
    } else {
        echo "ID de reserva no proporcionado";
    }
}

function editar_reservas(){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $cantidadPersonas = $_POST['cantidadPersonas'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $evento = $_POST['evento'];
    $area = $_POST['area'];
    $descripcion = $_POST['descripcion'];
    
    $conexion = $GLOBALS['conex'];
    $actualizacion = " UPDATE reservas SET cantidadPersonas = '$cantidadPersonas', fecha = '$fecha', hora = '$hora', evento = '$evento', area = '$area', descripcion = '$descripcion' WHERE idReserva = '$idReservas' "; 
    $resultado_actualizacion = mysqli_query($conexion, $actualizacion);
    
    header('Location: ../vistas/reservas.php'); 

    if ($resultado_actualizacion) {
        header('Location: ../dashboard/reservas.php');
    } else {
        echo "Error al editar la reserva.";
    }
}

function mostrar_reservas() {
    if (isset($_POST['id'])) {
        $IdUsuario = $_POST['id'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "SELECT IdUsuario, nombre, correo, contraseña FROM usuarios WHERE IdUsuario = '$IdUsuario'");

        if ($consulta) {
            $usuario = mysqli_fetch_assoc($consulta);
            // Convertir el resultado a JSON y enviarlo como respuesta
            echo json_encode($usuario);
        } else {
            echo "Error al obtener los datos del usuario";
        }
    } else {
        echo "ID de usuario no proporcionado";
    }
}



//casos de CONTACTOS


function validar_contacto(){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $conexion = $GLOBALS['conex']; 
    $consulta = "SELECT * FROM clientes WHERE correo ='$correo'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $filas = mysqli_fetch_array($resultado);
        $correo = $filas['correo'];
        $IdCliente = $filas['IdCliente'];

        if($filas['correo'] == $correo){ //admin

            $consulta = "INSERT INTO contactos (IdCliente, asunto, mensaje)
            VALUES ('$IdCliente','$asunto', '$mensaje')";
            $resultado=mysqli_query($conexion, $consulta);
            header('Location: ../vistas/contacto.php'); 
    
        }else{

            $consulta = "INSERT INTO clientes (nombre, correo)
            VALUES ('$nombre', '$correo')";
            $resultado=mysqli_query($conexion, $consulta);
            $filas = mysqli_fetch_array($resultado);
            $IdCliente = $filas['IdCliente'];
            $consulta = "INSERT INTO contactos (IdCliente, asunto, mensaje)
            VALUES ('$IdCliente','$asunto', '$mensaje')";
            $resultado=mysqli_query($conexion, $consulta);
            header('Location: ../vistas/contacto.php');
    
        }
    } else {
        $consulta = "INSERT INTO clientes (nombre, correo)
        VALUES ('$nombre', '$correo')";
        $resultado=mysqli_query($conexion, $consulta);
    }
}


//casos de CLIENTES

function validar_clientes(){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $direccion = $_POST['direccion'];

    $conexion = $GLOBALS['conex']; 
    $consulta = "SELECT * FROM clientes WHERE correo ='$correo'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $filas = mysqli_fetch_array($resultado);
        $correo = $filas['coreo'];

        if($filas['correo'] == $correo){ //admin

            header('Location: ../dashboard/clientes.php'); 
    
        }else{

            $consulta = "INSERT INTO clientes (nombre, correo, celular, direccion)
            VALUES ('$nombre','$correo', '$celular', '$direccion')";
            $resultado=mysqli_query($conexion, $consulta);
            header('Location: ../dashboard/clientes.php');
    
        }
    } else {
        $consulta = "INSERT INTO clientes (nombre, correo, celular, direccion)
        VALUES ('$nombre','$correo', '$celular', '$direccion')";
        $resultado=mysqli_query($conexion, $consulta);
        header('Location: ../dashboard/clientes.php');
    }
}


function eliminar_clientes() {
    if (isset($_POST['id'])) {
        $IdCliente = $_POST['id'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "DELETE FROM clientes WHERE IdCliente = '$IdCliente'");
        
        if ($consulta) {
            header('Location: ../dashboard/clientes.php');
        } else {
            echo "Error al eliminar el usuario";
        }
    } else {
        echo "ID de usuario no proporcionado";
    }
}

function editar_clientes(){
    $IdCliente = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $direccion = $_POST['direccion'];

    $conexion = $GLOBALS['conex'];
    $actualizacion = "UPDATE clientes SET nombre = '$nombre', correo = '$correo', celular = '$celular', direccion = '$direccion' WHERE IdCliente = '$IdCliente'";
    $resultado_actualizacion = mysqli_query($conexion, $actualizacion);

    if ($resultado_actualizacion) {
        header('Location: ../dashboard/clientes.php');
    } else {
        echo "Error al editar el usuario.";
    }
}

function mostrar_clientes() {
    if (isset($_POST['id'])) {
        $IdCliente = $_POST['id'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "SELECT IdCliente, nombre, correo, celular, direccion FROM clientes WHERE IdCliente = '$IdCliente'");

        if ($consulta) {
            $usuario = mysqli_fetch_assoc($consulta);
            // Convertir el resultado a JSON y enviarlo como respuesta
            echo json_encode($usuario);
        } else {
            echo "Error al obtener los datos del usuario";
        }
    } else {
        echo "ID de usuario no proporcionado";
    }
}


//casos de USUARIOS

function validar_usuarios(){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $conexion = $GLOBALS['conex']; 
    $consulta = "SELECT * FROM usuarios WHERE correo ='$correo'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $filas = mysqli_fetch_array($resultado);
        $correo = $filas['coreo'];
        $contraseña = $filas['contraseña'];

        if($filas['correo'] == $correo){ //admin

            header('Location: ../dashboard/usuarios.php'); 
    
        }else{

            $consulta = "INSERT INTO usuarios (nombre, correo, contraseña)
            VALUES ('$nombre','$correo', '$contraseña')";
            $resultado=mysqli_query($conexion, $consulta);
            header('Location: ../dashboard/usuarios.php');
    
        }
    } else {
        $consulta = "INSERT INTO usuarios (nombre, correo, contraseña)
        VALUES ('$nombre','$correo', '$contraseña')";
        $resultado=mysqli_query($conexion, $consulta);
        header('Location: ../dashboard/usuarios.php');
    }
}


function eliminar_usuario() {
    if (isset($_POST['id'])) {
        $IdUsuario = $_POST['id'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "DELETE FROM usuarios WHERE IdUsuario = '$IdUsuario'");
        
        if ($consulta) {
            header('Location: ../dashboard/usuarios.php');
        } else {
            echo "Error al eliminar el usuario";
        }
    } else {
        echo "ID de usuario no proporcionado";
    }
}

function editar_usuario(){
    $IdUsuario = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $conexion = $GLOBALS['conex'];
    $actualizacion = "UPDATE usuarios SET nombre = '$nombre', correo = '$correo', contraseña = '$contraseña' WHERE IdUsuario = '$IdUsuario'";
    $resultado_actualizacion = mysqli_query($conexion, $actualizacion);

    if ($resultado_actualizacion) {
        header('Location: ../dashboard/usuarios.php');
    } else {
        echo "Error al editar el usuario.";
    }
}

function mostrar_usuario() {
    if (isset($_POST['id'])) {
        $IdUsuario = $_POST['id'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "SELECT IdUsuario, nombre, correo, contraseña FROM usuarios WHERE IdUsuario = '$IdUsuario'");

        if ($consulta) {
            $usuario = mysqli_fetch_assoc($consulta);
            // Convertir el resultado a JSON y enviarlo como respuesta
            echo json_encode($usuario);
        } else {
            echo "Error al obtener los datos del usuario";
        }
    } else {
        echo "ID de usuario no proporcionado";
    }
}

//casos de PRODUCTOS


