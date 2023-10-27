<?php
require_once ("../includes/_db.php");
session_start();
error_reporting(0);

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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <!-- Custom fonts for this template -->
<!--        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="../startbootstrap-sb-admin-2-gh-pages/css/dashboard.css" rel="stylesheet">
        <link href="../assets/css/veamos.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/css-cart/style.css">

        <!-- MDB - Nav -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>

    </head>

    <body>

    <style>
        @media (max-width: 576px) {
            .nav-items-responsive{
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }
        }

        @media (min-width: 992px) {
            .nav-height{
                height: 100px;
            }
        }
    </style>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-black nav-height">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2" href="../index.php">
                    <img src="../assets/Imagenes/Logo-Hilda.png" height="40"style="margin-top: -1px;"/>
                </a>

                <!-- Toggle button -->
                <button class="navbar-toggler" 
                    type="button" 
                    data-mdb-toggle="collapse" 
                    data-mdb-target="#navbarButtonsExample"
                    aria-controls="navbarButtonsExample"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars" style="color:white"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarButtonsExample">
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link" href="../index.php" style= "color: white">Doña Hilda Tapas and Grill</a>
                        </li>
                    </ul>
                    <!-- Left links -->

                    <div class="d-flex align-items-center justify-content-center w-auto nav-items-responsive">
                        <a class="nav-link p-2" href="../Index.php">Inicio</a>
                        <a class="nav-link p-2" href="Nosotros.php">Nosotros</a>
                        <a class="nav-link p-2" href="Menu.php">Menu</a>
                        <a class="nav-link p-2" href="Reservas.php">Reserva</a>
                        <a class="nav-link p-2" href="Contacto.php">Contacto</a>

                        <a type="button" href="login.php" style="background-color:#ffffff; color: black; border-radius: 30px; padding: 08px 10px;"> Iniciar Sesión </a>

                        <a
                            href="#"
                            type="button"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight"
                            id="open-cart-button"
                        >
                            <img
                                src="../assets/Imagenes/Menu/cart-check-fill-white.svg"
                                alt=""
                                style="width: 40px; height: 40px;"
                                class="ml-2"
                            >
                        </a>
                    </div>
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>

        <!-- Toast Message Add Cart -->
        <div class="toast-cart-success toast alert-success" role="alert" aria-atomic="true" aria-live="assertive" style="position: fixed; bottom: 50px; right: 50px; z-index: 39">
            <div class="toast-header toast-header-success">
                <strong class="me-auto header-toast"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body toast-body-success">
                <p></p>
            </div>
        </div>

    <div class="toast toast-cart-danger alert-danger" role="alert" aria-atomic="true" aria-live="assertive" style="position: fixed; bottom: 50px; right: 50px; z-index: 39">
        <div class="toast-header toast-header-danger">
            <strong class="me-auto header-toast"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body toast-body-danger">
            <p></p>
        </div>
    </div>

        <!-- OffCanvas Cart of Shopping -->
        <div>
            <div class="offcanvas offcanvas-end" style="width: 500px" tabindex="1000" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">Carrito de Compra</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div id="shopping-cart" class="">
                        <table id="cart-content">
                            <thead>
                            <tr class="p-2 align-items-center justify-content-center">
                                <th class="pl-5">Imagen</th>
                                <th class="pl-4">Nombre</th>
                                <th class="pl-2">Precio</th>
                                <th class="pl-2">Cantidad</th>
                                <th></th>
                                <hr />
                            </tr>
                            </thead>
                            <tbody class="cart-tbody"></tbody>
                        </table>
                        <p class="total-container" id="total-price"></p>
                       <div class="d-flex flex-column align-items-center">
                           <a href="#" type="button" id="checkout-btn" class="btn btn-primary mt-2 mb-2 w-100">Comprar</a>
                           <a href="#" type="button" id="clear-cart" class="btn btn-primary w-100">Limpiar Carrito</a>
                       </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar -->
        <br>
        <article> 

            <div class="container-lg my-15">

                <!-- cards de servicios-->

                <div style =" scroll-margin-top: 90px;">
                    <p class="css-label text-center"> Menu </p>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php
                    $conexion=$GLOBALS['conex'];
                    $fila = null;
                    $SQL=mysqli_query($conexion,"SELECT productos.Id, productos.Nombre, productos.Descripcion, productos.Categoria, productos.Precio, productos.Imagen FROM productos");

                    while($fila=mysqli_fetch_assoc($SQL)):
                        ?>
                            <div class="col">
                                <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 20rem; height:26rem">
                                    <div class="card-body bg-white border-white">
                                        <img
                                            src="data:image/jpg;base64, <?php echo base64_encode($fila['Imagen'])?>"
                                            class="card-img-top img-fluid img-fluid"
                                            id="imagen<?php echo $fila['Id']?>"
                                            style="width: 100%;"
                                        >
                                        <h5 class="card-title css-label text-center mt-2" id="nombre<?php echo $fila['Id']?>"><?php echo $fila['Nombre']?></h5>
                                        <p class="card-text text-center" id="precio<?php echo $fila['Id']?>">$<?php echo $fila['Precio']?></p>
                                    </div>

                                    <div class="d-flex justify-content-center align-items-center p-1">
                                        <button
                                            class="button-count btn"
                                            style="background-color: #f1e645; color: black;"
                                            type="button"
                                            id="button_sum"
                                            >
                                            +
                                        </button>

                                        <input
                                            type="number"
                                            id="valor<?php echo $fila['Id']?>"
                                            value="1"
                                            name="Cantidad"
                                            class="css-input ml-2 mr-2"
                                            required
                                            style="width: 80px"
                                        />

                                        <button
                                            class="button-count btn btn-primary"
                                            style="background-color: #f1e645; color: black;"
                                            type="button"
                                            id="boton_restar"
                                            >
                                            -
                                        </button>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="#">
                                                <img
                                                    src="../assets/Imagenes/Menu/eye.svg"
                                                    alt="eye"
                                                    style="width: 40px; height: 40px;"
                                                    class="ml-2"
                                                >
                                            </a>
                                            <a
                                                href="#"
                                                id="carrito-add"
                                                type="button"
                                            >
                                                <img
                                                    src="../assets/Imagenes/Menu/cart-check-fill.svg"
                                                    style="width: 40px; height: 40px;"
                                                    alt="cart"
                                                    id="<?php echo $fila['Id'] ?>"
                                                >
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endwhile;?>
                    </div>
              
            </div>

            <!-- ======= Footer ======= -->
            <br>
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
                                <a href=" https://www.facebook.com/DonaHildaBani?mibextid=ZbWKwL" class="facebook"><i class="bi bi-facebook" ></i></a>
                                <a href="https://instagram.com/donahildabani?igshid=MmU2YjMzNjRlOQ==" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href=" https://api.whatsapp.com/message/XV75XSG4HTO2J1?autoload=1&app_absent=0" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="container">
                    <div class="copyright">
                        &copy; Copyright <strong><span>Doña Hilda Tapas and Grill</span></strong>. All Rights Reserved
                    </div>
                </div>

            </footer>
            <!-- End Footer -->     
        </article>

        <!-- My Js -->

        <script type="text/javascript">

            const button_rest = document.getElementById("boton_restar");
            const button_sum = document.getElementById("button_sum");
            const buttons = document.querySelectorAll(".button-count");
            const buttonAddCart = document.querySelectorAll("#carrito-add")
            const tbody = document.getElementsByClassName("cart-tbody");
            let removeButtons = [];
            const openCartButton = document.getElementById("open-cart-button");

            window.onload = function() {
                displayProducts();
            };

            buttons.forEach(function(button) {
                button.addEventListener("click", function(event) {
                    if (event.target.id === "boton_restar") {
                        disminuirValor(event);
                    } else if (event.target.id === "button_sum") {
                        aumentarValor(event);
                    }
                });
            });

            function aumentarValor(event) {
                const input = document.getElementById(event?.target?.nextElementSibling?.id);
                let valorActual = parseInt(input.value);
                valorActual++;
                input.value = valorActual;
            }

            function disminuirValor(event) {
                const input = document.getElementById(event?.target?.previousElementSibling?.id);
                let valorActual = parseInt(input.value);
                if (valorActual === 1) return
                valorActual-=1;
                input.value = valorActual;
            }


            //Shopping Cart
            buttonAddCart.forEach(function(button) {
                button.addEventListener("click", function(event) {
                    event.preventDefault()
                    addProductoToCart(event)
                })
            });

            //Add product to cart
            function addProductoToCart(event){
                let price = document.getElementById(`precio${event.target.id}`).textContent
                let name = document.getElementById(`nombre${event.target.id}`).textContent
                let quantity = document.getElementById(`valor${event.target.id}`).value
                let image = document.getElementById(`imagen${event.target.id}`).src

                price = parseInt(price.replace("$", ""))
                quantity = parseInt(quantity)

                let product = {
                    id: event.target.id,
                    name: name,
                    price: price,
                    quantity: quantity,
                    image: image
                }

                let lsContent = getLSContent();
                if (lsContent === null) {
                    lsContent = [];
                }

                if (lsContent.some(product => product.id === event.target.id)) {
                    lsContent?.forEach(prod => {
                        if(prod.id === event.target.id){
                            console.log('dentro')
                            prod.quantity += product.quantity

                        }
                    })
                    setLSContent(lsContent)
                    displayProducts()
                    toastMessageSuccess(product)
                    return
                }

                lsContent.push(product);
                setLSContent(lsContent);
                displayProducts();
                toastMessageSuccess(product);
            }

            //Update products
            function setLSContent(lsContent) {
                localStorage.setItem("products", JSON.stringify(lsContent));
            }

            //Get products
            function getLSContent() {
                return JSON.parse(localStorage.getItem("products"));
            }

            //Clear cart
            function clearCart() {
                localStorage.removeItem("products");
            }

            //Display products
            function displayProducts() {
                const lsContent = getLSContent();
                let productMarkup = "";

                if (lsContent !== null){
                    for (let product of lsContent) {
                        productMarkup += `
                            <tr class="">
                                <td class="">
                                    <img
                                        src="${product.image}"
                                        alt=""
                                        class="card-img"
                                        style="width: 120px; height: 90px;"
                                    >
                                </td>
                                <td class="pl-4">
                                    ${product.name}
                                </td>
                                <td class="p-2 ml-5 justify-content-center align-items-center">
                                    $${product.price}
                                </td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <td class="pl-4">
                                        ${product.quantity}
                                    </td>
                                </div>
                                <td class="pl-3">
                                    <a href="#" id="${product.id}" class="remove" type="">X</a>
                                </td>
                            </tr>
                        `
                    }
                }

                tbody[0].innerHTML = productMarkup;
                removeButtons = document.querySelectorAll(".remove")
                removeButtons.forEach(function(button) {
                    button.addEventListener("click", function(event) {
                        deleteProduct(event.target.id);
                    })
                });
            }

            //Delete product
            function deleteProduct(id) {
                let lsContent = getLSContent();
                lsContent = lsContent.filter(function(product) {
                    return product.id !== id;
                });

                setLSContent(lsContent);
                displayProducts();
            }

            //Clear cart EventListener
            document.getElementById('clear-cart').addEventListener('click', function (event){
                clearCart()
                displayProducts()
            })

            //Display offCanvas
            openCartButton.addEventListener('click', function (event){
                displayProducts()
            })

            //Toast Message
            function toastMessageSuccess(product) {

                const toastHeader = document.querySelector('.toast-header-success')
                const toastBody = document.querySelector('.toast-body-success').children
                const toastElList = [].slice.call(document.querySelectorAll('.toast-cart-success'))

                toastHeader.textContent = product.name
                toastBody[0].textContent = 'Se añadio correctamente al carrito'

                const toastList = toastElList.map(function(toastEl) {
                    return new bootstrap.Toast(toastEl)
                })

                toastList.forEach(toast => toast.show())
            }

            function toastMessageDanger(product) {

                const toastHeader = document.querySelector('.toast-header-danger')
                const toastBody = document.querySelector('.toast-body-danger').children
                const toastElList = [].slice.call(document.querySelectorAll('.toast-cart-danger'))

                toastHeader.textContent = product.name
                toastBody[0].textContent = 'Este producto ya esta en el carrito'

                const toastList = toastElList.map(function(toastEl) {
                    return new bootstrap.Toast(toastEl)
                })

                toastList.forEach(toast => toast.show())
            }

        </script>

        <!-- Vendor JS Files -->
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/aos/aos.js"></script>
        <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

        <!-- Template Main JS File -->
        <script src="../assets/js/main.js"></script>

  </body>
</html>