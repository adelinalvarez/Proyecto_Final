<?php
require_once ("_db.php");
  $conexion=$GLOBALS['conex']; 
  if(isset($_POST)){
    if (strlen($_POST['Nombre']) >= 1 
        && strlen($_POST['Descripcion']) >= 1 
        && strlen($_POST['Categoria']) >= 1 
        && strlen($_POST['Precio']) >= 1
        && strlen($_POST['Imagen']) >= 1 ) {
        $Nombre = trim($_POST['Nombre']);
        $Descripcion = trim($_POST['Descripcion']);
        $Categoria = trim($_POST['Categoria']);
        $Precio= trim($_POST['Precio']);
        $Imagen= trim($_POST['Imagen']);


  
      $consulta = "INSERT INTO productos (Nombre, Descripcion, Categoria, Precio, Imagen)
      VALUES ('$Nombre', '$Descripcion', '$Categoria', '$Precio','$Imagen')";
        $resultado=mysqli_query($conexion, $consulta);
  
      if($resultado){
        header('Location: ../startbootstrap-sb-admin-2-gh-pages/productos.php'); 

      }else{
        echo 'Ocurrio un error al guardar los datos';
      }
  }else{
    echo 'No data';
  }
  }

?>