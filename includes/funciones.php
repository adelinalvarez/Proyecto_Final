<?php
   
require_once ("_db.php");

if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

            case 'eliminar_registro';
            eliminar_registro();
    
            break;

            case 'editar_reservas';
            editar_reservas();
    
            break;

            case 'eliminar_participantes';
            eliminar_registro();
    
            break;

            case 'acceso_user';
            acceso_user();
            break;

		}

	}

function editar_registro() {
    $conexion=$GLOBALS['conex']; 
    extract($_POST);
    $consulta="UPDATE user SET nombre = '$nombre', correo = '$correo',
    password ='$password', rol = '$rol', recinto = '$recinto' WHERE id = '$id' ";

    mysqli_query($conexion, $consulta);


    header('Location: ../Views/user.php');

}

function eliminar_registro() {
    $conexion=$GLOBALS['conex']; 
    extract($_POST);
    $id= $_POST['id'];
    $consulta= "DELETE FROM user WHERE id= $id";

    mysqli_query($conexion, $consulta);


    header('Location: ../Views/user.php');

}
function editar_reservas() {
    $conexion=$GLOBALS['conex']; 
    extract($_POST);
    $consulta="UPDATE reservas SET Nombre = '$Nombre',Correo = '$Correo', Celular = '$Celular', Evento = '$Evento',
    Cantidad ='$Cantidad', Fecha = '$Fecha', Hora = '$Hora', Area = '$Area', Descripcion = '$Descripcion', Confirmacion = '$Confirmacion' WHERE Id = '$Id' ";
    mysqli_query($conexion, $consulta);


    header('Location: ../startbootstrap-sb-admin-2-gh-pages/reservas.php');

}

function eliminar_participantes() {
$conexion=$GLOBALS['conex']; 
extract($_POST);
$id= $_POST['id'];
$consulta= "DELETE FROM participantes WHERE id= $id";

mysqli_query($conexion, $consulta);


header('Location: ../Views/user.php');

}



function acceso_user() {
    $Correo = $_POST['Correo'];
    $Contraseña = $_POST['Contraseña'];

    session_start();
    $_SESSION['Correo'] = $Correo;

    $conexion = $GLOBALS['conex']; 
    $consulta = "SELECT * FROM users WHERE Correo='$Correo' AND Contraseña='$Contraseña'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $filas = mysqli_fetch_array($resultado);
        $Cargo = $filas['Cargo'];

        $_SESSION['Cargo'] = $Cargo;

        if($filas['Cargo'] == "Chef"){ //admin

            header('Location: ../startbootstrap-sb-admin-2-gh-pages/index.php');
    
        }else{
            header("location: ../index.php?fallo=true");
            session_destroy();
    
        }
    } else {
        header("location: ../index.php?fallo=true");
        session_destroy();
    }
}