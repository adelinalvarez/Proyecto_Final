<?php
require_once ("../_db.php");
session_start();
error_reporting(0);

$validarusuario = $_SESSION['Correo'];

if( $validarusuario == null || $validarusuario = ''){

  header("Location: ../../index.php");
  die();
  
}

$Id= $_GET['Id'];
$conexion = $GLOBALS['conex']; 
$consulta= "SELECT * FROM reservas WHERE Id = $Id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Doña Hilda Tapas and Grill</title>
        <link rel="icon" href="../assets/Imagenes/Logo.png">

        <!-- Custom fonts for this template -->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
        <link href="../css/dashboard.css" rel="stylesheet">



        <!-- Custom styles for this page -->
        <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <a class="nav-link" href="../index.php">
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
                    <a class="nav-link" href="../pedidos.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Pedidos</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="../productos.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Productos</span>
                    </a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="../reservas.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Reservas</span>
                    </a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="../contactos.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Contactos</span>
                    </a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="../usuarios.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Usuarios</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

                

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
                                        src="../img/undraw_profile.svg">
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
                        <div class="card  shadow-custom  mb-5 bg-white rounded">
                            <div class="card-body"> 
                                <p class="text-center fw-bold mx-3 mb-0 TColor" style="text-size:50px"> Detalles de la Reservas </p>
                                <br>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <div class="d-flex flex-column ">
                                                <h3 style= "font-family: Arial; font-size: 15px;"> <b> Nombre completo: </b> <?php echo $usuario['Nombre'];?></h3>
                                                <br>
                                                <h3 style= "font-family: Arial; font-size: 15px;"> <b> Tipo de Evento: </b> <?php echo $usuario['Evento'];?></h3>
                                                <br>
                                                <h3 style= "font-family: Arial; font-size: 15px;"> <b> Hora: </b> <?php echo $usuario['Hora'];?></h3>
                                                <br>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="d-flex flex-column ">
                                                <h3 style= "font-family: Arial; font-size: 15px;"> <b> Correo: </b> <?php echo $usuario['Correo'];?></h3>
                                                <br>
                                                <h3 style= "font-family: Arial; font-size: 15px;"> <b> Cantidad de Personas: </b> <?php echo $usuario['Cantidad'];?></h3>
                                                <br>
                                                <h3 style= "font-family: Arial; font-size: 15px;"> <b> Área: </b> <?php echo $usuario['Area'];?></h3>
                                                <br>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="d-flex flex-column ">
                                                <h3 style= "font-family: Arial; font-size: 15px;"> <b> Celular: </b> <?php echo $usuario['Celular'];?></h3>
                                                <br>
                                                <h3 style= "font-family: Arial; font-size: 15px;"> <b> Fecha: </b> <?php echo $usuario['Fecha'];?></h3>
                                                <br>
                                                <h3 style= "font-family: Arial; font-size: 15px;"> <b> Descripción: </b> <?php echo $usuario['Descripcion'];?></h3>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <h3 style= "font-family: Arial; font-size: 15px;"> <b> Confirmacion: </b> <?php echo $usuario['Confirmacion'];?></h3>
                                            <br>
                                            
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="d-flex flex-column ">
                                                <br>
                                                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
                                                <button type="button" class="btn-guardar" data-mdb-ripple-color="#000000">Anterior</button>
                                                </a>
                                            </div>
                                        </div>
                                                                                                                                    
                                    </div>
                                </div>
                            </div>              
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- ======= Footer ======= -->
                <footer id="footer" class="footer">

                <div class="container">

                <div class="row gy-3">
                    <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    
                    <div>
                        <h4>Direccion</h4>
                        <p>
                        Santome #49 <br>
                        Esq. 16 de Agosto, Baní Peravia<br>
                        </p>
                    </div>

                    </div>

                    <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Reservaciones</h4>
                        <p>
                        <strong>Telefono:</strong> +1 809-522-5146<br>
                        <strong>Email:</strong> Donahildabani@gmail.com<br>
                        </p>
                    </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Horarios</h4>
                        <p>
                        <strong>Lunes-Domingos: 8AM - 11PM<br></strong>
                        
                        </p>
                    </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Siguenos</h4>
                    <div class="social-links d-flex">
                        <a href=" https://www.facebook.com/DonaHildaBani?mibextid=ZbWKwL" class="facebook"><i class="fa fa-facebook" ></i></a>
                        <a href="https://instagram.com/donahildabani?igshid=MmU2YjMzNjRlOQ==" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href=" https://api.whatsapp.com/message/XV75XSG4HTO2J1?autoload=1&app_absent=0" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
                


                    </div>
                    </div>

                </div>
                </div>

                <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>Doña Hilda Tapas and Grill</span></strong>. All Rights Reserved
                </div>

                </div>

                </footer><!-- End Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/datatables-demo.js"></script>

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
    <script src="../../package/dist/sweetalert2.all.js"></script>
  <script src="../../package/dist/sweetalert2.all.min.js"></script>

</html>