<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../imagenes/Logo.webp">

        <!-- Bootstrap 4 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link href="../css/style.css" rel="stylesheet">
        <title>Doña Hilda Tapas and Grill</title>
        
        <style>
            .custom-card {
                border: 5px solid black;
                border-radius: 15px;
                transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
            }

            .custom-card:hover {
                transform: scale(1.05);
                box-shadow: 0 10px 20px rgba(255, 223, 186, 0.3);
                border-color: yellow;
            }

            .custom-card img {
                border-radius: 10px;
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-black nav-height">
            <div class="container">
                <a class="navbar-brand me-2" href="../Index.php">
                    <img src="../imagenes/Logo-Hilda.webp" height="40" style="margin-top: -1px;">
                    <a class="nav-link" href="../Index.php" style="color: white">Doña Hilda Tapas and Grill</a>
                </a>
                <button class="navbar-toggler" 
                    type="button" 
                    data-toggle="collapse" 
                    data-target="#navbarButtonsExample"
                    aria-controls="navbarButtonsExample"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars" style="color:white"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarButtonsExample">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        </li>
                    </ul>
                    <div class="d-flex align-items-center justify-content-center w-auto nav-items-responsive">
                        <a class="nav-link p-2 EfectoSombra" href="../Index.php">Inicio</a>
                        <a class="nav-link p-2 EfectoSombra" href="Nosotros.php">Nosotros</a>
                        <a class="nav-link p-2 EfectoSombra" href="Menu.php">Menú</a>
                        <a class="nav-link p-2 EfectoSombra" href="Reservas.php">Reserva</a>
                        <a class="nav-link p-2 EfectoSombra" href="Contacto.php">Contacto</a>
                        <a class="BotonIniciar" type="button" href="login.php">Iniciar Sesión</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <br>
                    <h1 class="focus-in-expand text-center color-white">¡Conoce nuestra historia!</h1>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-7 col-12" style="font-size: 20px; text-align: justify">
                    <!-- Contenido de texto -->
                    Somos Doña Hilda Tapas and Grill, un rincón culinario situado en el corazón de la Ciudad de Baní, República Dominicana, donde 
                    convergen los sabores auténticos de la cocina dominicana con influencias españolas. Nuestra historia es una fusión 
                    de tradición y pasión por la gastronomía, inspirada por las enseñanzas culinarias de la inolvidable "Doña Hilda". 
                    <br> <br> Enclavados en un espacio que ha sido testigo de glorias culinarias pasadas, buscamos revivir y elevar esa 
                    tradición. Aquí, no solo ofrecemos deliciosos platillos, sino que brindamos un ambiente cálido y acogedor, donde la 
                    comunidad se reúne para compartir, celebrar y disfrutar la herencia culinaria que nos define. Bienvenidos a Doña Hilda, 
                    donde la comida se convierte en una experiencia que honra nuestras raíces y crea nuevos recuerdos.
                </div>
                <div class="col-md-5 col-12">
                    <!-- Imagen -->
                    <img src="../imagenes/Logo.webp" height="500" class="animated-image img-fluid" alt="Logo">
                </div>
            </div>
        </div>


        <div style="background-color: black; color:white">
            <br>
            <div class="container">
                <h1 class="focus-in-expand text-center">¡Conoce nuestra local!</h1>
                <br>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="custom-card">
                            <img src="../imagenes/Local/Privado2.webp" class="card-img-top" alt="Imagen 1">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="custom-card">
                            <img src="../imagenes/Local/Salon_Vip3.webp" class="card-img-top" alt="Imagen 2">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="custom-card">
                            <img src="../imagenes/Local/Hilda_Express12.webp" class="card-img-top" alt="Imagen 3">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="custom-card">
                            <img src="../imagenes/Local/Terraza_Mural1.webp" class="card-img-top" alt="Imagen 5">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="custom-card">
                            <img src="../imagenes/Local/Terraza4.webp" class="card-img-top" alt="Imagen 6">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="custom-card">
                            <img src="../imagenes/Local/Bar3.webp" class="card-img-top" alt="Imagen 4">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="custom-card">
                            <img src="../imagenes/Local/Terraza3.webp" class="card-img-top" alt="Imagen 7">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="custom-card">
                            <img src="../imagenes/Local/Local2.webp" class="card-img-top" alt="Imagen 8">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="custom-card">
                            <img src="../imagenes/Local/Local_por_fuera.webp" class="card-img-top" alt="Imagen 9">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Frequently Asked Questions Section -->
        <div class="faq">
            <div class="container" data-aos="fade-up">
                <br>
                <h1 class="focus-in-expand text-center color-white">Preguntas Frecuentes</h1>
                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bi bi-info-circle-fill icon-help"></i> 
                            <a data-toggle="collapse" href="#faq-list-1" class="collapsed">¿De dónde viene el nombre “Doña Hilda”?<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse" > 
                                <p>El nombre de doña Hilda fue elegido para honrar el legado culinario de la señora Hilda, madre de la dueña del restaurante.</p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bi bi-info-circle-fill icon-help"></i> 
                            <a data-toggle="collapse" href="#faq-list-2" class="collapsed">¿Cuándo fue fundado el restaurante? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse">
                                <p>Fue fundado el 26 de septiembre de 2021, en Bani, provincia, Peravia. </p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bi bi-info-circle-fill icon-help"></i> 
                            <a data-toggle="collapse" href="#faq-list-3" class="collapsed">¿Dónde está ubicado el restaurante? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse">
                                <p>Está ubicado en la calle 16 de agosto, esquina Santomé, Ciudad de Baní, provincia, Peravia, República Dominicana.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- End Frequently Asked Questions Section -->

            <!-- Footer -->
            <footer class="text-center text-lg-start bg-black text-muted p-1"  >         

                <!-- Section: Links  -->
                <section class="">
                    <div class="container text-center text-md-start mt-5" style="color:white">
                        <!-- Grid row -->
                        <div class="row mt-3">
                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4" >
                                <!-- Content -->
                                <h6 class="text-uppercase fw-bold mb-4" >
                                    <i class="bi bi-geo-alt icon me-1 text-secondary"></i>Dirección
                                </h6>
                                <p>
                                    Santome #49 
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
                                    Telefono +1 809-522-5146 <br>
                                    Email: Donahildabani@gmail.com                            
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
                                Lunes a Domingos: 8:00AM - 11:00PM
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 text-center">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">Siguenos</h6>
                                <a href="https://www.facebook.com/DonaHildaBani?mibextid=ZbWKwL" class="facebook mb-2"><i class="bi bi-facebook text-white"></i></a>
                                <a href="https://instagram.com/donahildabani?igshid=MmU2YjMzNjRlOQ==" class="instagram mb-2"><i class="bi bi-instagram text-white"></i></a>
                                <a href="https://api.whatsapp.com/message/XV75XSG4HTO2J1?autoload=1&app_absent=0" class="whatsapp"><i class="bi bi-whatsapp text-white"></i></a>
                            </div>
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row -->
                    </div>
                </section>
                <!-- Section: Links  -->

                <!-- Copyright -->
                <div class="text-center p-4"  style="color:white">
                    &copy; Copyright <strong><span>Doña Hilda Tapas and Grill</span></strong>. All Rights Reserved
                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer --> 

        <!-- Add Bootstrap script at the end of your page just before closing the body -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
