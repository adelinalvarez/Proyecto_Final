<?php
require_once ("../_db.php");
  $conexion=$GLOBALS['conex']; 
  if(isset($_POST)){
    if (strlen($_POST['Nombre']) >= 1 
        && strlen($_POST['Correo']) >= 1 
        && strlen($_POST['Celular']) >= 1 
        && strlen($_POST['Cantidad']) >= 1
        && strlen($_POST['Fecha']) >= 1
        && strlen($_POST['Hora']) >= 1
        && strlen($_POST['Evento']) >= 1
        && strlen($_POST['Area']) >= 1
        && strlen($_POST['Descripcion']) >= 1 ) {
        $Nombre = trim($_POST['Nombre']);
        $Correo = trim($_POST['Correo']);
        $Celular = trim($_POST['Celular']);
        $Cantidad= trim($_POST['Cantidad']);
        $Fecha= trim($_POST['Fecha']);
        $Hora= trim($_POST['Hora']);
        $Evento= trim($_POST['Evento']);
        $Area= trim($_POST['Area']);
        $Descripcion= trim($_POST['Descripcion']);
  
      $consulta = "INSERT INTO reservas (Nombre, Correo, Celular, Cantidad, Fecha, Hora, Evento, Area, Descripcion)
      VALUES ('$Nombre', '$Correo', '$Celular', '$Cantidad', '$Fecha', '$Hora', '$Evento', '$Area', '$Descripcion')";
        $resultado=mysqli_query($conexion, $consulta);
  
      if($resultado){
        header('Location: ../../vistas/reservas.php'); 

      }else{
        echo 'Ocurrio un error al guardar los datos';
      }
  }else{
    echo 'No data';
  }
  }

?>