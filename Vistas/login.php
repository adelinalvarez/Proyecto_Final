<?php
require_once ("../funciones/_db.php");
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width">
        <link rel="icon" href="../imagenes/Logo.png">

        <link href="../css/style.css" rel="stylesheet">
        <title>Login - Doña Hilda Tapas and Grill</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="login">
        <div class="contenedor container-fluid d-flex justify-content-center">
            <div class="login-container">
                <a href="../index.php">
                    <h4 class="logo me-auto"><a href="../index.php"> <img src="../assets/Imagenes/Logo.png" width="100px" alt=""> </a> </h4>
                </a>
                <h2>Iniciar Sesión</h2>
                <form action="../funciones/funciones.php" method="POST" >

                    <div class="align-items-start d-flex">
                        <label for="correo"> <b> Usuario: <b> </label>
                    </div>
                    <input type="email" id="Correo" class="form-control" name="Correo" required placeholder="Ingrese su usuario" />
                    
                    <div class="align-items-start d-flex">
                        <label for="contraseña"> <b> Contraseña: <b> </label>
                    </div>
                    <input type="password" name="Contraseña" id="Contraseña" class="form-control" required placeholder="Ingrese su contraseña">
                    <input type="hidden" name="accion" value="acceso_user"> 

                    <button type="submit" class="btn-login mb-2">Ingresar</button>

                    <?php
                        if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
                        {
                        echo "<div style='color:red'> Usuario o contraseña incorrecta </div>";
                        }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>