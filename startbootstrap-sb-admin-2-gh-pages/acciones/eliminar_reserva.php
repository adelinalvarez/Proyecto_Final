<?php
    require_once ("../../includes/_db.php");
    $Id= $_GET['id'];
    $conexion=$GLOBALS['conex']; 
    $consulta= mysqli_query($conexion,"DELETE FROM reservas WHERE Id= '$Id'");

    header('Location: ../reservas.php');

