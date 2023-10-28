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

        case 'eliminar_reservas';
            eliminar_reservas();
        break;

        case 'editar_reservas';
            editar_reservas();
        break;

        case 'mostrar_reservas';
            mostrar_reservas();
        break;

        case 'validar_contactos';
            validar_contactos();
        break;
        case 'eliminar_contactos';
             eliminar_contactos();
        break;

        case 'editar_contactos';
            editar_contactos();
        break;

        case 'mostrar_contactos';
            mostrar_contactos();
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
            editar_clientes();
        break;

        case 'mostrar_clientes';
            mostrar_clientes();
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
    $IdCliente = $_POST['IdCliente'];
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
    if (isset($_POST['id'])) {
    $IdReservas = $_POST['id'];  
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
    $IdCliente = $_POST['IdCliente'];
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
        $IdReservas = $_POST['IdReservas'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "SELECT IdReservas, IdCliente, cantidadPersonas, fecha, hora, evento, area, descripcion  FROM reservas WHERE IdReservas = '$IdReservas'");

        if ($consulta) {
            $usuario = mysqli_fetch_assoc($consulta);
            // Convertir el resultado a JSON y enviarlo como respuesta
            echo json_encode($usuario);
        } else {
            echo "Error al obtener los datos de las reservas";
        }
    } else {
        echo "ID de reserva no proporcionado";
    }
}



//casos de CONTACTOS


function validar_contactos(){
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $conexion = $GLOBALS['conex']; 
    $consulta = "SELECT * FROM clientes WHERE correo ='$correo'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $filas = mysqli_fetch_array($resultado);
        $correo= $filas['correo'];

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
        header('Location: ../vistas/contacto.php');
    }
}

function eliminar_contactos() {
    if (isset($_POST['IdContacto'])) {
        $IdContacto = $_POST['IdContacto'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "DELETE FROM contactos WHERE IdContacto = '$IdContacto'");
        
        if ($consulta) {
            header('Location: ../dashboard/contactos.php');
        } else {
            echo "Error al eliminar el contacto";
        }
    } else {
        echo "ID de contacto no proporcionado";
    }
}

function editar_contactos(){
    $IdContacto = $_POST['IdContacto'];
    $IdCliente = $_POST['IdCliente'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $conexion = $GLOBALS['conex'];
    $actualizacion = "UPDATE contactos SET asunto = '$asunto', mensaje = '$mensaje' WHERE IdContacto = '$IdContacto'";
    $resultado_actualizacion = mysqli_query($conexion, $actualizacion);

    if ($resultado_actualizacion) {
        header('Location: ../dashboard/contactos.php');
    } else {
        echo "Error al editar el contacto.";
    }
}

function mostrar_contactos() {
    if (isset($_POST['IdContacto'])) {
        $IdContacto = $_POST['IdContacto'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "SELECT IdContacto, IdCliente,  asunto, mensaje  FROM contactos WHERE IdContacto = '$IdContacto'");

        if ($consulta) {
            $usuario = mysqli_fetch_assoc($consulta);
            // Convertir el resultado a JSON y enviarlo como respuesta
            echo json_encode($usuario);
        } else {
            echo "Error al obtener los datos del contacto";
        }
    } else {
        echo "ID de contacto no proporcionado";
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


