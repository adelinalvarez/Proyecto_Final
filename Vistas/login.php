<?php
require_once ("../includes/_db.php");
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width">

        <title>Login</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .login-container {
                background: #fff;
                border-radius: 10px;
                padding: 30px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
                text-align: center;
                width: 400px; /* Aumentamos el ancho del contenedor */
            }
            .login-container h2 {
                color: #000;
            }
            .form-control {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: none;
                border-radius: 30px;
            }
            .btn-login {
                background-color: #000;
                color: #fff;
                border: 2px solid #000;
                border-radius: 30px;
                padding: 10px 20px;
                cursor: pointer;
                width: 100%;
            }
            
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body style="background-color: #000000;">
        <div class="contenedor container-fluid d-flex justify-content-center">
            <div class="login-container">
                <a href="../index.php">
                    <h4 class="logo me-auto"><a href="../index.php"> <img src="../assets/Imagenes/Logo.png" width="100px" alt=""> </a> </h4>
                </a>
                <h2>Iniciar Sesión</h2>
                <form action="../includes/funciones.php" method="POST" >

                    <div class="align-items-start d-flex">
                        <label for="correo"> <b> Usuario: <b> </label>
                    </div>
                    <input type="text" class="form-control" placeholder="Ingrese su usuario" required>
                    <div class="align-items-start d-flex">
                        <label for="contraseña"> <b> Contraseña: <b> </label>
                    </div>

                    <input type="password" class= "form-control" name="accion" value="acceso_user">
                    <button type="submit" class="btn-login mb-2">Ingresar</button>
                </form>
            </div>
        </div>
    </body>
</html>