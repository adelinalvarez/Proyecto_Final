<?php
    require_once ("../../includes/_db.php");
    $Id= $_GET['id'];
    $conexion=$GLOBALS['conex']; 
    $consulta= mysqli_query($conexion,"DELETE FROM contactos WHERE Id= '$Id'");

    header('Location: ../contactos.php');