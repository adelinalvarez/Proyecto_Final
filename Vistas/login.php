<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<div class="login-container">

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
            <img src="../assets/Imagenes/Logo.png" width="100px" alt="">
            <h2>Iniciar Sesión</h2>
            <form>

                <div class="align-items-start d-flex">
                    <label for="usuario"> <b> Usuario: <b> </label>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese su usuario" required>
                <div class="align-items-start d-flex">
                    <label for="password"> <b> Contraseña: <b> </label>
                </div>

                <input type="password" class= "form-control" placeholder="Ingrese su contraseña" required>
                <button type="submit" class="btn-login mb-2">Ingresar</button>
                <button type="submit" class="btn-login w-50">Regresar</button>

            </form>
        </div>
    </div>
</body>
</html>