<?php
require_once ("_db.php");
  $conexion=$GLOBALS['conex']; 
  if(isset($_POST)){
    if (strlen($_POST['Nombre']) >= 1 
        && strlen($_POST['Direccion']) >= 1 
        && strlen($_POST['Celular']) >= 1 
        && strlen($_POST['Pago']) >= 1
        && strlen($_POST['Especificaciones']) >= 1 ){
        $Nombre = trim($_POST['Nombre']);
        $Direccion = trim($_POST['Direccion']);
        $Celular = trim($_POST['Celular']);
        $Pago = trim($_POST['Pago']);
        $Especificaciones = trim($_POST['Especificaciones']);

  
      $consulta = "INSERT INTO pedidos (Nombre, Direccion, Celular, Pago, Especificaciones)
      VALUES ('$Nombre', '$Direccion', '$Celular', '$Pago', '$Especificaciones')";
        $resultado=mysqli_query($conexion, $consulta);
  
      if($resultado){
        header('Location: ../../dashboard/pedidos.php'); 

      }else{
        echo 'Ocurrio un error al guardar los datos';
      }
  }else{
    echo 'No data';
  }
  }

?>