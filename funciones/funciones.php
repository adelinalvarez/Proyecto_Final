<?php
   
require_once ("_db.php");

if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'acceso_user';
            acceso_user();
        break;

	}

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

            header('Location: ../dashboard/index.php');
    
        }else{
            header("location: ../index.php?fallo=true");
            session_destroy();
    
        }
    } else {
        header("location: ../index.php?fallo=true");
        session_destroy();
    }
}