<?php

// conexion DESARROLLO 
$host = "localhost";
$user = "root";
$password = "";
$database = "hilda";

//conexion PRODUCCION
#$host = "localhost";
#$user = "root";
#$password = "";
#$database = "hilda";

$conex = mysqli_connect($host, $user, $password, $database) or die  (mysqli_connect_error());

return $conex;

 
?>