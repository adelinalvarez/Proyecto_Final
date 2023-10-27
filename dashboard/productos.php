<?php
require_once ("../includes/_db.php");
session_start();
error_reporting(0);

$validarusuario = $_SESSION['Correo'];

if ($validarusuario == null || $validarusuario == '') {

  header("Location: ../index.php");
  die();
  
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <title>Doña Hilda Tapas and Grill</title>
        <link rel="icon" href="../assets/Imagenes/Logo.png">

        <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: black;">

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Administrar
                </div>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="pedidos.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Pedidos</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="productos.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Productos</span>
                    </a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="reservas.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Reservas</span>
                    </a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="contactos.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Contactos</span>
                    </a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Usuarios</span></a>
                </li>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light nav-dashboard topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <form class="form-inline">
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-white-600 small"> <?php echo $_SESSION['Correo']; ?> </span>
                                    <img class="img-profile rounded-circle"
                                        src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Perfil
                                    </a>
                                
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Informe
                                    </a>
                                    <a class="dropdown-item" href="acciones/cerrarSesion.php">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Cerrar Sesión
                                    </a>
                                    
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Incorpora nuevos platos al menu</h1>
                        <p class="mb-4"> Administra el menu e incorora nuevo etc etc</p>

                        <!-- DataTales Example -->
                        <?php
                            $conexion=$GLOBALS['conex'];  
                            $where="";
                            if(isset($_GET['enviar'])){
                                $busqueda = $_GET['busqueda'];
                                if (isset($_GET['busqueda'])) {
                                    $where="WHERE productos.Correo LIKE'%".$busqueda."%' OR nombre  LIKE'%".$busqueda."%'";
                                }
                            }
                        ?>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800"></h1>
                            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-agregar shadow-sm" data-toggle="modal" data-target="#createproductos">
                                <span class="glyphicon glyphicon-plus"></span> Agregar algo nuevo &nbsp <i class="fa fa-plus"></i> </a>
                            </button>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-black">Tabla de productos</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead  style="color: white; text-align: center; background-color:black">
                                            <tr>
                                                <th>ID</th>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Categoria</th>
                                                <th>Precio</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody style="color: black;">
                                            
                                            <?php
                                                $conexion=$GLOBALS['conex'];                
                                                $SQL=mysqli_query($conexion,"SELECT productos.Id, productos.Imagen, productos.Nombre, productos.Descripcion, productos.Categoria, productos.Precio FROM productos");
                                                while($fila=mysqli_fetch_assoc($SQL)):
                                            ?>
                                            <tr>
                                                <td><?php echo $fila['Id']; ?></td>
                                                <td> <img src="data:image/jpg;base64, <?php echo base64_encode($fila['Imagen'])?>" alt="Imagen del producto" style="max-width: 100px;"></td>                                            <td><?php echo $fila['Nombre']; ?></td>
                                                <td><?php echo $fila['Descripcion']; ?></td>
                                                <td><?php echo $fila['Categoria']; ?></td>
                                                <td><?php echo $fila['Precio']; ?></td>
                                                <td>
                                                    <a class="btn" href="acciones/mostrar_productos.php?id=<?php echo $fila['id']?> "> <i class="fa fa-eye"  style="color: black"> </i></a> 
                                                    <a class="btn" href="acciones/editar_productos.php?id=<?php echo $fila['id']?> "> <i class="fa fa-edit"  style="color: black"></i></a>
                                                    <a class="btn btn-del" href="acciones/eliminar_productos.php?id=<?php echo $fila['Id']?> "> <i class="fa fa-trash"  style="color: black"></i></a>
                                                </td>
                                            </tr>
                                            <?php endwhile;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="text-center text-lg-start bg-black color-white text-muted p-1">            
                    <!-- Section: Links  -->
                    <section class="">
                        <div class="container text-center text-md-start mt-5">
                            <!-- Grid row -->
                            <div class="row mt-3">
                                <!-- Grid column -->
                                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                                    <!-- Content -->
                                    <h6 class="text-uppercase fw-bold mb-4">
                                        <i class="bi bi-geo-alt icon me-3 text-secondary"></i>Dirección
                                    </h6>
                                    <p>
                                        Santome #49 
                                    </p>
                                    <p>
                                        Esq. 16 de Agosto, Baní Peravia
                                    </p>
                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                                    <!-- Links -->
                                    
                                    <h6 class="text-uppercase fw-bold mb-4">
                                        <i class="bi bi-telephone icon me-3 text-secondary"></i>Reservaciones
                                    </h6>
                                    <p>
                                        <strong>Telefono:</strong> +1 809-522-5146
                                    </p>
                                    <p>
                                        <strong>Email:</strong> Donahildabani@gmail.com                            
                                    </p>
                                </div>
                                <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    <i class="bi bi-clock icon me-3 text-secondary"></i>Horarios
                                </h6>
                                <p>
                                    <strong>Lunes a Domingos: 8:00AM - 11:00PM</strong>
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">Siguenos</h6>
                                <a href=" https://www.facebook.com/DonaHildaBani?mibextid=ZbWKwL" class="facebook"><i class="bi bi-facebook" ></i></a>
                                <a href="https://instagram.com/donahildabani?igshid=MmU2YjMzNjRlOQ==" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href=" https://api.whatsapp.com/message/XV75XSG4HTO2J1?autoload=1&app_absent=0" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                        </div>
                    </section>
                    <!-- Section: Links  -->

                    <!-- Copyright -->
                    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
                        &copy; Copyright <strong><span>Doña Hilda Tapas and Grill</span></strong>. All Rights Reserved
                    </div>
                    <!-- Copyright -->
                </footer>
                <!-- Footer -->  

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Crear Modal-->
        <div class="modal fade" id="createproductos" tabindex="-1" role="dialog" aria-labelledby="createproductosLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createproductosLabel">Añadir nuevo producto</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form  action="../includes/validarproductos.php" method="POST" enctype="multipart/form-data">
                            <div>
                                <label class="css-label" for="customFile">Agregar Imagen</label>
                                <input type="file" name="Imagen" id="Imagen" class="css-input" style= "display: block; width: 100%;"/>
                            </div>
                            
                            <div>
                                <label for="Nombre" class="css-label"> Nombre: </label>
                                <input type="text" id="Nombre" name="Nombre" class="css-input" style= "display: block; width: 100%;" required >
                            </div>
                            
                            <div>
                                <label for="Descripcion" class="css-label"> Descripcion:</label>
                                <input type="text" id="Descripcion" name="Descripcion" class="css-input" style= " display: block; width: 100%;" required >
                            </div>

                                                
                            <div>
                                <label for="Categoria" class="css-label">Categoria:</label>
                                <select name="Categoria" id="Categoria" class="css-input" style= " display: block; width: 100%;" required> 
                                    <option value="Tapas">Tapas</option>
                                    <option value="Paella">Paella</option>
                                    <option value="Pa Compartir">Pa Compartir</option>
                                    <option value="Hamburger">Hamburger </option>
                                    <option value="Mofongos">Mofongos</option>
                                    <option value="Mar">Mar</option>
                                    <option value="Pasta">Pasta</option>
                                    <option value="Pa Compaña">Pa Compaña</option>
                                    <option value="Pa Los Chiquitines ">Pa Los Chiquitines </option>
                                    <option value="Pa que te Endulces ">Pa que te Endulces </option>
                                    <option value="Brunch">Brunch</option>

                                </select>
                            </div>

                            <div>
                                <label for="Precio" class="css-label">Precio:</label>
                                <input type="number" id="Precio" name="Precio" class="css-input" style= " display: block; width: 100%;" required >
                            </div>
                            <br>

                            <input type="submit" value="Guardar" id="register" class="btn-guardar" name="registrar">
                        </form> 

                    </div>
                    
                </div>
            </div>
        </div>
        
                            
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

    </body>

<script>
    $('.btn-del').on('click', function(e){
      e.preventDefault();
      const href = $(this).attr('href')
      Swal.fire({
        title: '¿Estas seguro de eliminar este usuario?',
        text: "¡No podrás revertir esto!!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!', 
        cancelButtonText: 'Cancelar!', 
      }).then((result)=>{
        if(result.value){
          if (result.isConfirmed) {
            Swal.fire(
              'Eliminado!',
              'El usuario fue eliminado.',
              'success'
            )
          }
          document.location.href= href;
        }   
      })
    })
  </script>

    <!-- <div id="paginador" class=""></div>-->
    <script src="../package/dist/sweetalert2.all.js"></script>
  <script src="../package/dist/sweetalert2.all.min.js"></script>

</html>