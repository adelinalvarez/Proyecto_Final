<?php
require_once ("_db.php");
  $conexion=$GLOBALS['conex']; 
  if(isset($_POST)){
    if (strlen($_POST['Nombres']) >= 1 
        && strlen($_POST['Correo']) >= 1 
        && strlen($_POST['Contraseña']) >= 1 
        && strlen($_POST['Cargo']) >= 1 ) {
        $Nombres = trim($_POST['Nombres']);
        $Correo = trim($_POST['Correo']);
        $Contraseña = trim($_POST['Contraseña']);
        $Cargo= trim($_POST['Cargo']);

  
      $consulta = "INSERT INTO users (Nombres, Correo, Contraseña, Cargo)
      VALUES ('$Nombres', '$Correo', '$Contraseña', '$Cargo')";
        $resultado=mysqli_query($conexion, $consulta);
  
      if($resultado){
        header('Location: ../startbootstrap-sb-admin-2-gh-pages/usuarios.php'); 

      }else{
        echo 'Ocurrio un error al guardar los datos';
      }
  }else{
    echo 'No data';
  }
  }

?>