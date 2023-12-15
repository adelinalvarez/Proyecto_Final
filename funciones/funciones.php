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

        case 'validar_reservas_normal';
            validar_reservas_normal();
        break;

        case 'insertar_contacto';
            insertar_contacto(
                $_POST['nombre'],
                $_POST['correo'],
                $_POST['asunto'],
                $_POST['mensaje']
            );
        break;

        case 'eliminar_categorias';
            eliminar_categorias();
        break;

        case 'mostrar_categorias';
            mostrar_categorias();
        break;

        case 'editar_categorias';
            editar_categorias();
        break;

        case 'validar_categorias';
            validar_categorias();
        break;

        case 'validar_compras';
            validar_compras();
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

//casos de CATEGORIAS FUNCIONAN

function eliminar_categorias(){
    if (isset($_POST['id'])) {
        $IdCategoria = $_POST['id'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "DELETE FROM categorias WHERE IdCategoria = '$IdCategoria'");
        
        if ($consulta) {
            header('Location: ../dashboard/categorias.php');
        } else {
            echo "Error al eliminar la categoria";
        }
    } else {
        echo "ID de la categoria no proporcionado";
    }
}

function mostrar_categorias() {
    if (isset($_POST['id'])) {
        $IdCategoria = $_POST['id'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "SELECT IdCategoria, NombreCategoria FROM categorias WHERE IdCategoria = '$IdCategoria'");

        if ($consulta) {
            $usuario = mysqli_fetch_assoc($consulta);
            // Convertir el resultado a JSON y enviarlo como respuesta
            echo json_encode($usuario);
        } else {
            echo "Error al obtener los datos de la categoria";
        }
    } else {
        echo "ID de la categoria no proporcionado";
    }
}

function editar_categorias(){
    $IdCategoria = $_POST['id'];
    $NombreCategoria = $_POST['NombreCategoria'];


    $conexion = $GLOBALS['conex'];
    $actualizacion = "UPDATE categorias SET NombreCategoria = '$NombreCategoria' WHERE IdCategoria = '$IdCategoria'";
    $resultado_actualizacion = mysqli_query($conexion, $actualizacion);

    if ($resultado_actualizacion) {
        header('Location: ../dashboard/categorias.php');
    } else {
        echo "Error al editar la categoria.";
    }
}

function validar_categorias(){
    $NombreCategoria = $_POST['NombreCategoria'];

    $conexion = $GLOBALS['conex']; 
    $consulta = "SELECT * FROM categorias WHERE NombreCategoria ='$NombreCategoria'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $filas = mysqli_fetch_array($resultado);
        $NombreCategoria = $filas['NombreCategoria'];

        if($filas['NombreCategoria'] == $NombreCategoria){ //admin

            header('Location: ../dashboard/categorias.php'); 
    
        }else{

            $consulta = "INSERT INTO categorias (NombreCategoria)
            VALUES ('$NombreCategoria')";
            $resultado=mysqli_query($conexion, $consulta);
            header('Location: ../dashboard/categorias.php');
    
        }
    } else {
        $consulta = "INSERT INTO categorias (NombreCategoria)
        VALUES ('$NombreCategoria')";
        $resultado=mysqli_query($conexion, $consulta);
        header('Location: ../dashboard/categorias.php');
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
    } elseif ($resultado && mysqli_num_rows($resultado) < 0) {
        # code...
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
    }else{

        $consulta = "INSERT INTO clientes (nombre, correo, celular)
        VALUES ('$nombre', '$correo', '$celular')";
        $resultado = mysqli_query($conexion, $consulta);
        $consulta = "INSERT INTO reservas (cantidadPersonas, fecha, hora, evento, area, descripcion)
        VALUES ('$cantidadPersonas', '$fecha', '$hora'', '$evento', '$area'', '$descripcion')";
        $resultado = mysqli_query($conexion, $consulta);
        header('Location: ../vistas/reservas.php');
    }
}

function validar_reservas_normal(){
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

    // Comprueba si el cliente ya existe en la tabla "clientes" basado en el correo.
    $consulta_cliente_existente = "SELECT IdCliente FROM clientes WHERE correo = ?";
    $stmt_cliente_existente = mysqli_prepare($conexion, $consulta_cliente_existente);
    mysqli_stmt_bind_param($stmt_cliente_existente, "s", $correo);
    mysqli_stmt_execute($stmt_cliente_existente);
    $resultado_cliente_existente = mysqli_stmt_get_result($stmt_cliente_existente);

    if ($fila = mysqli_fetch_assoc($resultado_cliente_existente)) {
        // El cliente ya existe en la base de datos, obtenemos su IdCliente.
        $idCliente = $fila['IdCliente'];
    } else {
        // El cliente no existe, lo insertamos en la tabla "clientes".
        $consulta_insertar_cliente = "INSERT INTO clientes (nombre, correo, celular) VALUES (?, ?, ?)";
        $stmt_insertar_cliente = mysqli_prepare($conexion, $consulta_insertar_cliente);
        mysqli_stmt_bind_param($stmt_insertar_cliente, "sss", $nombre, $correo, $celular);
        mysqli_stmt_execute($stmt_insertar_cliente);

        // Obtenemos el IdCliente recién insertado.
        $idCliente = mysqli_insert_id($conexion);
    }

    // Insertamos la información de la reserva en la tabla "reservas" junto con el IdCliente.
    $consulta_insertar_reserva = "INSERT INTO reservas (IdCliente, cantidadPersonas, fecha, hora, evento, area, descripcion) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_insertar_reserva = mysqli_prepare($conexion, $consulta_insertar_reserva);
    mysqli_stmt_bind_param($stmt_insertar_reserva, "iississ", $idCliente, $cantidadPersonas, $fecha, $hora, $evento, $area, $descripcion);
    $resultado_insertar_reserva = mysqli_stmt_execute($stmt_insertar_reserva);

    if ($resultado_insertar_reserva) {
        header('Location: ../vistas/reservas.php');
    } else {
        // Manejar el error, redirigir a una página de error, etc.
        echo "Error al guardar los datos de la reserva.";
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

function insertar_contacto($nombre, $correo, $asunto, $mensaje) {
    $conexion = $GLOBALS['conex'];

    // Verificar si el cliente ya existe en la tabla "clientes" basado en el correo.
    $consulta_cliente_existente = "SELECT IdCliente FROM clientes WHERE correo = ?";
    $stmt_cliente_existente = mysqli_prepare($conexion, $consulta_cliente_existente);
    mysqli_stmt_bind_param($stmt_cliente_existente, "s", $correo);
    mysqli_stmt_execute($stmt_cliente_existente);
    $resultado_cliente_existente = mysqli_stmt_get_result($stmt_cliente_existente);

    if ($fila = mysqli_fetch_assoc($resultado_cliente_existente)) {
        // El cliente ya existe en la base de datos, obtenemos su IdCliente.
        $idCliente = $fila['IdCliente'];
    } else {
        // El cliente no existe, lo insertamos en la tabla "clientes".
        $consulta_insertar_cliente = "INSERT INTO clientes (nombre, correo) VALUES (?, ?)";
        $stmt_insertar_cliente = mysqli_prepare($conexion, $consulta_insertar_cliente);
        mysqli_stmt_bind_param($stmt_insertar_cliente, "ss", $nombre, $correo);
        mysqli_stmt_execute($stmt_insertar_cliente);

        // Obtenemos el IdCliente recién insertado.
        $idCliente = mysqli_insert_id($conexion);
    }

    // Insertar la información del contacto en la tabla "contactos" junto con el IdCliente.
    $consulta_insertar_contacto = "INSERT INTO contactos (IdCliente, asunto, mensaje) VALUES (?, ?, ?)";
    $stmt_insertar_contacto = mysqli_prepare($conexion, $consulta_insertar_contacto);
    mysqli_stmt_bind_param($stmt_insertar_contacto, "iss", $idCliente, $asunto, $mensaje);

    if (mysqli_stmt_execute($stmt_insertar_contacto)) {
        header('Location: ../vistas/contacto.php'); // Redirige aquí después de guardar los datos
        exit; 

    } else {
        return false; // Devuelve falso si hubo un error
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == "validar_contactos_normal") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    // Llama a la función insertar_contacto con los datos del formulario
    if (insertar_contacto($nombre, $correo, $asunto, $mensaje)) {
        header('Location: ../vistas/contacto.php');
    } else {
        echo "Error al guardar los datos del contacto.";
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

//casos de PRODUCTOS FUNCIONAN

function validar_productos(){
    $imagen = $_POST['imagen'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $NombreCategoria = $_POST['NombreCategoria'];
    $precio = $_POST['precio'];

    $typeImage = exif_imagetype($_FILES["imagen"]["tmp_name"]);

    $name_generated =  generateNameImage($typeImage);
    move_uploaded_file($_FILES["imagen"]["tmp_name"], '../product_images/' . $name_generated);
    $imagen = $name_generated;

    $conexion = $GLOBALS['conex'];
    $consulta = "SELECT * FROM productos WHERE nombre ='$nombre'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $filas = mysqli_fetch_array($resultado);
        $nombre = $filas['nombre'];

        if($filas['nombre'] == $nombre){ //admin

            header('Location: ../dashboard/productos.php'); 
    
        }else{

            $consulta = "INSERT INTO productos (nombre, descripcion, categoria, precio, imagen)
            VALUES ('$nombre', '$descripcion', '$NombreCategoria', '$precio','$imagen')";
            $resultado=mysqli_query($conexion, $consulta);
            header('Location: ../dashboard/productos.php');
    
        }
    } else {
        $consulta = "INSERT INTO productos (nombre, descripcion, categoria, precio, imagen)
        VALUES ('$nombre', '$descripcion', '$NombreCategoria', '$precio','$imagen')";
        $resultado=mysqli_query($conexion, $consulta);
        header('Location: ../dashboard/productos.php');
    }
}

function generateNameImage($typeImage): string
{
    $extensiones = [
        IMAGETYPE_GIF => '.gif',
        IMAGETYPE_JPEG => '.jpeg',
        IMAGETYPE_PNG => '.png',
        IMAGETYPE_BMP => '.bmp',
        IMAGETYPE_PSD => '.psd',
        IMAGETYPE_JPC => '.jpc',
        IMAGETYPE_JP2 => '.jp2',
        IMAGETYPE_JPX => '.jpx',
        IMAGETYPE_JB2 => '.jb2',
        IMAGETYPE_SWC => '.swc',
        IMAGETYPE_WBMP => '.wbmp',
    ];

    $extension = '';

    if (array_key_exists($typeImage, $extensiones)) {
        $extension = $extensiones[$typeImage];
    } else {
       echo 'Extension no soportada';
    }

    $random_string = bin2hex(random_bytes(8));
    $current_timestamp = time();
    $unique_name = $current_timestamp . "_" . $random_string;
    $unique_name .= $extension;
    return $unique_name;
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

function editar_productos() {
    if (isset($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['NombreCategoria'], $_POST['precio'])) {
        $IdProducto = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $NombreCategoria = $_POST['NombreCategoria'];
        $precio = $_POST['precio'];

        $imagen = null;

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){
            $typeImage = exif_imagetype($_FILES["imagen"]["tmp_name"]);
            $name_generated =  generateNameImage($typeImage);
            move_uploaded_file($_FILES["imagen"]["tmp_name"], '../product_images/' . $name_generated);
            $imagen = $name_generated;
        }

        // Validación de datos (puedes personalizar esto según tus requerimientos)
        if (empty($nombre) || empty($descripcion) || empty($NombreCategoria) || empty($precio)) {
            echo "Por favor, completa todos los campos.";

            return;
        }

        // Conexión a la base de datos (asegúrate de tener una conexión válida aquí)
        $conexion = $GLOBALS['conex'];

        // Consulta preparada para evitar SQL injection
        $actualizacion = "UPDATE productos SET nombre = ?, descripcion = ?, categoria = ?, precio = ? WHERE IdProducto = ?";

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){
            $actualizacion = "UPDATE productos SET nombre = ?, descripcion = ?, categoria = ?, precio = ?, imagen = ? WHERE IdProducto = ?";
        }

        if ($stmt = mysqli_prepare($conexion, $actualizacion)) {
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){
                mysqli_stmt_bind_param($stmt, "sssssi", $nombre, $descripcion, $NombreCategoria, $precio, $imagen, $IdProducto);
            }else{
                mysqli_stmt_bind_param($stmt, "ssssi", $nombre, $descripcion, $NombreCategoria, $precio, $IdProducto);
            }
            // Ejecutar la consulta
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                header('Location: ../dashboard/productos.php');
            } else {
                echo "Error al editar el producto: " . mysqli_error($conexion);
            }
        } else {
            echo "Error en la consulta SQL: " . mysqli_error($conexion);
        }
    } else {
        echo "Faltan datos necesarios para la edición.";
    }
}

function mostrar_productos() {
    if (isset($_POST['id'])) {
        $IdProducto = $_POST['id'];
        $conexion = $GLOBALS['conex'];
        $consulta = mysqli_query($conexion, "SELECT IdProducto, nombre, descripcion, categoria, precio, imagen FROM productos WHERE IdProducto = '$IdProducto'");

        if ($consulta) {
            $producto = mysqli_fetch_assoc($consulta);
            // Convertir el resultado a JSON y enviarlo como respuesta
            echo json_encode($producto);
        } else {
            echo "Error al obtener los datos del producto";
        }
    } else {
        echo "ID del producto no proporcionado";
    }
}

//casos de ORDENES

function validar_compras() {
    $conexion = $GLOBALS['conex'];

    $compra = json_decode($_POST['compra'], true);

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $direccionEnvio = $_POST['DireccionEnvio'];
    $fecha = date('Y-m-d H:i:s');

    $stmt = mysqli_prepare($conexion, "SELECT IdCliente FROM clientes WHERE Correo = ?");
    mysqli_stmt_bind_param($stmt, 's', $correo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {

        mysqli_stmt_bind_result($stmt, $idCliente);
        mysqli_stmt_fetch($stmt);
        error_log("Cliente existente, IdCliente: $idCliente");

    } else {

        $stmt = mysqli_prepare($conexion, "INSERT INTO clientes (Nombre, Correo, Celular) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sss', $nombre, $correo, $celular);

        if (!mysqli_stmt_execute($stmt)) {
            error_log("Error al insertar nuevo cliente: " . mysqli_error($conexion));

        } else {

            $idCliente = mysqli_insert_id($conexion);
            error_log("Nuevo cliente creado, IdCliente: $idCliente");
        }
    }

    $stmt = mysqli_prepare($conexion, "INSERT INTO orden (IdCliente, DireccionEnvio, Fecha) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'iss', $idCliente, $direccionEnvio, $fecha);

    if (!mysqli_stmt_execute($stmt)) {
        error_log("Error al insertar nueva orden: " . mysqli_error($conexion));

    } else {
        
        $idOrden = mysqli_insert_id($conexion);
        error_log("Nueva orden creada, IdOrden: $idOrden");

        foreach ($compra as $producto) {
            $idProducto = $producto['id'];
            $cantidad = $producto['quantity'];
            $precio = $producto['price'];
        
            $stmtDetalle = mysqli_prepare($conexion, "INSERT INTO ordendetalle (IdOrden, IdProducto, Cantidad, Precio) VALUES (?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmtDetalle, 'iiid', $idOrden, $idProducto, $cantidad, $precio);
        
            if (!mysqli_stmt_execute($stmtDetalle)) {
                error_log("Error en la consulta preparada de ordendetalle: " . mysqli_error($conexion));
            }
        
            mysqli_stmt_close($stmtDetalle);
        }        

        unset($_SESSION['carrito']);
    }

    header("Location: ../vistas/Menu.php");
    exit();
}
