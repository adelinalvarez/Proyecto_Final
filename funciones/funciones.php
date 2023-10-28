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

        case 'validar_productos';
            validar_productos();
        break;

        case 'eliminar_productos';
            eliminar_productos();
        break;

        case 'editar_productos';
            editar_productos();
        break;

        case 'mostrar_productos';
            mostrar_productos();
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


//casos de RESERVAS FUNCIONAN

function validar_reservas(){
    $idCliente = $_POST['IdCliente'];
    $cantidadPersonas = $_POST['cantidadPersonas'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $evento = $_POST['evento'];
    $area = $_POST['area'];
    $descripcion = $_POST['descripcion'];

    $conexion = $GLOBALS['conex'];

    $consulta = "SELECT * FROM clientes WHERE IdCliente = $idCliente";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // El IdCliente existe, guardar en la tabla de contactos
        $consultaContacto = "INSERT INTO reservas (IdCliente, cantidadPersonas, fecha, hora, evento, area, descripcion) 
                            VALUES ($idCliente, '$cantidadPersonas', '$fecha', '$hora', '$evento', '$area', '$descripcion')";
        $resultadoContacto = mysqli_query($conexion, $consultaContacto);

        if ($resultadoContacto) {
            header('Location: ../dashboard/reservas.php');
        } else {
            echo "Error al guardar los datos de contacto: " . mysqli_error($conexion);
        }
    } else {
        // El IdCliente no existe, primero guardar en la tabla de clientes
        $nombreCliente = $_POST['nombreCliente'];
        $correoCliente = $_POST['correoCliente'];
        $celularCliente = $_POST['celularCliente'];
        $direccionCliente = $_POST['direccionCliente'];

        $consultaCliente = "INSERT INTO clientes (IdCliente, nombre, correo, celular, direccion) 
                           VALUES ($idCliente, '$nombreCliente', '$correoCliente', '$celularCliente', '$direccionCliente')";
        $resultadoCliente = mysqli_query($conexion, $consultaCliente);

        if ($resultadoCliente) {
            // Luego, guardar en la tabla de contactos
            $consultaContacto = "INSERT INTO contactos (IdCliente, asunto, mensaje) 
                                VALUES ($idCliente, '$asunto', '$mensaje')";
            $resultadoContacto = mysqli_query($conexion, $consultaContacto);

            if ($resultadoContacto) {
                header('Location: ../dashboard/reservas.php');
            } else {
                echo "Error al guardar los datos de contacto: " . mysqli_error($conexion);
            }
        } else {
            echo "Error al guardar los datos del cliente: " . mysqli_error($conexion);
        }
    }
}

function eliminar_reservas() {
    if (isset($_POST['id'])) {
        $IdReservas = $_POST['id'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "DELETE FROM reservas WHERE IdReservas = '$IdReservas'");
        
        if ($consulta) {
            header('Location: ../dashboard/reservas.php');
        } else {
            echo "Error al eliminar la reserva";
        }
    } else {
        echo "ID de la reserva no proporcionado";
    }
}

function editar_reservas() {
    if (isset($_POST['idReservas'])) {
        $IdReservas = $_POST['idReservas'];
        $cantidadPersonas = $_POST['cantidadPersonas'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $evento = $_POST['evento'];
        $area = $_POST['area'];
        $descripcion = $_POST['descripcion'];

        $conexion = $GLOBALS['conex'];

        // Realiza la actualización en la tabla de reservas
        $actualizacion = "UPDATE reservas 
                         SET cantidadPersonas = '$cantidadPersonas', fecha = '$fecha', hora = '$hora', evento = '$evento', area = '$area', descripcion = '$descripcion'
                         WHERE IdReservas = '$IdReservas'";

        $resultado_actualizacion = mysqli_query($conexion, $actualizacion);

        if ($resultado_actualizacion) {
            echo "Reserva actualizada con éxito.";
        } else {
            echo "Error al actualizar la reserva.";
        }
    } else {
        echo "Datos de reserva no proporcionados.";
    }
}

function mostrar_reservas() {
    if (isset($_POST['idReservas'])) {
        $IdReservas = $_POST['idReservas'];
        $conexion = $GLOBALS['conex'];

        // Consulta para obtener los datos de la reserva
        $consulta = mysqli_query($conexion, "
            SELECT r.IdReservas, r.IdCliente, r.cantidadPersonas, r.fecha, r.hora, r.evento, r.area, r.descripcion, c.nombre, c.correo, c.celular, c.direccion
            FROM reservas r
            JOIN clientes c ON r.IdCliente = c.IdCliente
            WHERE r.IdReservas = '$IdReservas'
        ");

        if ($consulta) {
            $datosReserva = mysqli_fetch_assoc($consulta);

            // Convertir el resultado a JSON y enviarlo como respuesta
            echo json_encode($datosReserva);
        } else {
            echo "Error al obtener los datos de la reserva";
        }
    } else {
        echo "ID de reserva no proporcionado";
    }
}



//casos de CONTACTOS FUNCIONAN

function validar_contactos(){
    $idCliente = $_POST['IdCliente'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $conexion = $GLOBALS['conex'];

    $consulta = "SELECT * FROM clientes WHERE IdCliente = $idCliente";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // El IdCliente existe, guardar en la tabla de contactos
        $consultaContacto = "INSERT INTO contactos (IdCliente, asunto, mensaje) 
                            VALUES ($idCliente, '$asunto', '$mensaje')";
        $resultadoContacto = mysqli_query($conexion, $consultaContacto);

        if ($resultadoContacto) {
            header('Location: ../dashboard/contactos.php');
        } else {
            echo "Error al guardar los datos de contacto: " . mysqli_error($conexion);
        }
    } else {
        // El IdCliente no existe, primero guardar en la tabla de clientes
        $nombreCliente = $_POST['nombreCliente'];
        $correoCliente = $_POST['correoCliente'];
        $celularCliente = $_POST['celularCliente'];
        $direccionCliente = $_POST['direccionCliente'];

        $consultaCliente = "INSERT INTO clientes (IdCliente, nombre, correo, celular, direccion) 
                           VALUES ($idCliente, '$nombreCliente', '$correoCliente', '$celularCliente', '$direccionCliente')";
        $resultadoCliente = mysqli_query($conexion, $consultaCliente);

        if ($resultadoCliente) {
            // Luego, guardar en la tabla de contactos
            $consultaContacto = "INSERT INTO contactos (IdCliente, asunto, mensaje) 
                                VALUES ($idCliente, '$asunto', '$mensaje')";
            $resultadoContacto = mysqli_query($conexion, $consultaContacto);

            if ($resultadoContacto) {
                header('Location: ../dashboard/contactos.php');
            } else {
                echo "Error al guardar los datos de contacto: " . mysqli_error($conexion);
            }
        } else {
            echo "Error al guardar los datos del cliente: " . mysqli_error($conexion);
        }
    }
}

function eliminar_contactos() {
    if (isset($_POST['id'])) {
        $IdContacto = $_POST['id'];
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
    $IdContacto = $_POST['idContacto'];
    $IdCliente = $_POST['IdCliente'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $conexion = $GLOBALS['conex'];
    $actualizacion = "UPDATE contactos SET IdCliente = '$IdCliente', asunto = '$asunto', mensaje = '$mensaje' WHERE IdContacto = '$IdContacto'";
    $resultado_actualizacion = mysqli_query($conexion, $actualizacion);

    if ($resultado_actualizacion) {
        header('Location: ../dashboard/contactos.php');
    } else {
        echo "Error al editar el usuario.";
    }
}


function mostrar_contactos() {
    if (isset($_POST['idContacto'])) {
        $IdContacto = $_POST['idContacto'];
        $conexion = $GLOBALS['conex'];

        // Consulta para obtener los datos del contacto y su cliente correspondiente
        $consulta = mysqli_query($conexion, "
            SELECT c.IdContacto, c.IdCliente, c.asunto, c.mensaje, cl.nombre, cl.correo, cl.celular, cl.direccion
            FROM contactos c
            JOIN clientes cl ON c.IdCliente = cl.IdCliente
            WHERE c.IdContacto = '$IdContacto'
        ");

        if ($consulta) {
            $datosContacto = mysqli_fetch_assoc($consulta);

            // Convertir el resultado a JSON y enviarlo como respuesta
            echo json_encode($datosContacto);
        } else {
            echo "Error al obtener los datos del contacto";
        }
    } else {
        echo "ID de contacto no proporcionado";
    }
}



//casos de CLIENTES FUNCIONAN

function validar_clientes(){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $direccion = $_POST['direccion'];

    $conexion = $GLOBALS['conex']; 
    $consulta = "SELECT * FROM clientes WHERE correo = '$correo'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // El correo ya existe en la tabla de clientes
        header('Location: ../dashboard/clientes.php');
    } else {
        // El correo no existe en la tabla de clientes, insertar el nuevo cliente
        $consulta = "INSERT INTO clientes (nombre, correo, celular, direccion)
        VALUES ('$nombre', '$correo', '$celular', '$direccion')";
        $resultado = mysqli_query($conexion, $consulta);
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


//casos de USUARIOS FUNCIONAN

function validar_usuarios(){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $conexion = $GLOBALS['conex']; 
    $consulta = "SELECT * FROM usuarios WHERE correo ='$correo'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $filas = mysqli_fetch_array($resultado);
        $correo = $filas['correo'];
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

function validar_productos(){
    $imagen = $_POST['imagen'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $imagen= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));


    $conexion = $GLOBALS['conex']; 
    $consulta = "SELECT * FROM productos WHERE nombre ='$nombre'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $filas = mysqli_fetch_array($resultado);
        $nombre = $filas['nombre'];

        if($filas['nombre'] == $correo){ //admin

            header('Location: ../dashboard/productos.php'); 
    
        }else{

            $consulta = "INSERT INTO productos (nombre, descripcion, categoria, precio, imagen)
            VALUES ('$nombre', '$descripcion', '$categoria', '$precio','$imagen')";
            $resultado=mysqli_query($conexion, $consulta);
            header('Location: ../dashboard/productos.php');
    
        }
    } else {
        $consulta = "INSERT INTO productos (nombre, descripcion, categoria, precio, imagen)
        VALUES ('$nombre', '$descripcion', '$categoria', '$precio','$imagen')";
        $resultado=mysqli_query($conexion, $consulta);
        header('Location: ../dashboard/productos.php');
    }
}

function eliminar_productos() {
    if (isset($_POST['id'])) {
        $IdProducto = $_POST['id'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "DELETE FROM productos WHERE IdProducto = '$IdProducto'");
        
        if ($consulta) {
            echo "Producto eliminado correctamente.";
        } else {
            echo "Error al eliminar el producto";
        }
    } else {
        echo "ID de producto no proporcionado";
    }
}


function editar_productos(){
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

function mostrar_productos() {
    if (isset($_POST['id'])) {
        $IdProducto = $_POST['id'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "SELECT IdProducto, nombre, descripcion, categoria, precio FROM productos WHERE IdProducto = '$IdProducto'");

        if ($consulta) {
            $producto = mysqli_fetch_assoc($consulta);
            echo json_encode($producto);
        } else {
            echo "Error en la consulta SQL";
        }
    } else {
        echo "ID del producto no proporcionado";
    }
}

