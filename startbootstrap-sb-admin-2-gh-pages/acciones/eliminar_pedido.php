<?php
    require_once ("../../includes/_db.php");
    $IdCliente= $_GET['idCliente'];
    $conexion=$GLOBALS['conex']; 
    $consulta= mysqli_query($conexion,"DELETE FROM pedidos WHERE IdCliente= '$IdCliente'");

    header('Location: ../pedidos.php');