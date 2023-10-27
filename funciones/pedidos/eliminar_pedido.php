<?php
    require_once ("../_db.php");
    $IdCliente= $_GET['IdCliente'];
    $conexion=$GLOBALS['conex']; 
    $consulta= mysqli_query($conexion,"DELETE FROM pedidos WHERE IdCliente= '$IdCliente'");

    header('Location: ../../dashboard/pedidos.php');