<?php
require_once ("_db.php");
  $conexion=$GLOBALS['conex']; 
  if(isset($_POST)){
    if (strlen($_POST['Nombre']) >= 1 
        && strlen($_POST['Correo']) >= 1 
        && strlen($_POST['Asunto']) >= 1 
        && strlen($_POST['Mensaje']) >= 1 ) {
        $Nombre = trim($_POST['Nombre']);
        $Correo = trim($_POST['Correo']);
        $Asunto = trim($_POST['Asunto']);
        $Mensaje= trim($_POST['Mensaje']);

  
      $consulta = "INSERT INTO contactos (Nombre, Correo, Asunto, Mensaje)
      VALUES ('$Nombre', '$Correo', '$Asunto', '$Mensaje')";
        $resultado=mysqli_query($conexion, $consulta);
  
      if($resultado){
        header('Location: ../Vistas/Contacto.php'); 

      }else{
        echo 'Ocurrio un error al guardar los datos';
      }
  }else{
    echo 'No data';
  }
  }

?>