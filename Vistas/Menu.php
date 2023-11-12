<?php
require_once ("../funciones/_db.php");
session_start();
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../imagenes/Logo.png">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- MDB - Nav -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link href="../css/style.css" rel="stylesheet">

        <title>Doña Hilda Tapas and Grill</title>
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

            .table {
                border-collapse: separate;
                border-spacing: 20px 10px; 
            }
            .nav-link.active {
                border-bottom: 2px solid yellow;
                color: black;
            }
            .img-container {
                height: 165px;
                overflow: hidden; 
            }
            .img-container img {
                width: 100%;
                height: 100%;
            }
        </style>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-black nav-height">
            <div class="container">
                <a class="navbar-brand me-2" href="../Index.php">
                    <img src="../imagenes/Logo-Hilda.png" height="40" style="margin-top: -1px;">
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
                            <a class="nav-link" href="../Index.php" style="color: white">Doña Hilda Tapas and Grill</a>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center justify-content-center w-auto nav-items-responsive">
                        <a class="nav-link p-2 EfectoSombra" href="../Index.php">Inicio</a>
                        <a class="nav-link p-2 EfectoSombra" href="Nosotros.php">Nosotros</a>
                        <a class="nav-link p-2 EfectoSombra" href="Menu.php">Menu</a>
                        <a class="nav-link p-2 EfectoSombra" href="Reservas.php">Reserva</a>
                        <a class="nav-link p-2 EfectoSombra" href="Contacto.php">Contacto</a>
                        <a class="BotonIniciar" type="button" href="login.php">Iniciar Sesión</a>
                        <a
                            href="#"
                            type="button"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight"
                            id="open-cart-button"
                        >
                            <img
                                src="../imagenes/Menu/cart-check-fill-white.svg"
                                alt=""
                                style="width: 40px; height: 40px;"
                                class="ml-2"
                            >
                        </a>

                    </div>
                </div>
            </div>
        </nav>

        <!-- Toast Message Add Cart -->
        <div class="toast-cart-success toast alert-success" role="alert" aria-atomic="true" aria-live="assertive" style="position: fixed; bottom: 50px; right: 50px; z-index: 39">
            <div class="toast-header toast-header-success">
                <strong class="me-auto header-toast"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body toast-body-success alert-success">
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
            <div class="offcanvas offcanvas-end" style="width: 550px" tabindex="1000" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">Carrito de Compra</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div id="shopping-cart" class="">
                        <table id="cart-content">
                            <thead>
                            <tr class="p-2 align-items-center justify-content-center">
                                <th class="pl-5 ml-">Imagen</th>
                                <th class="pl-4">Nombre</th>
                                <th class="pl-2">Precio</th>
                                <th class="pl-2">Cantidad</th>
                                <th class="pl-2">Total</th>
                                <th></th>
                                <hr />
                            </tr>
                            </thead>
                            <tbody class="cart-tbody"></tbody>
                        </table>
                        <div class="d-flex justify-content-center align-items-center">
                            <p class="total-container mr-1">Total: </p>
                            <p id="total-price"></p>
                        </div>
                       <div class="d-flex flex-column align-items-center">
                            <button
                                class="btn btn-primary w-100"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                data-bs-whatever="@fat"
                                type="button"
                                id="boton_comprar" >
                                Comprar
                            </button>
                            <br>
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
                <h1 class="focus-in-expand text-center color-white">Menu</h1>
                <ul class="nav justify-content-center" id="categorias">
                    <?php
                    $conexion = $GLOBALS['conex'];
                    $categorias = array();

                    $SQL = mysqli_query($conexion, "SELECT DISTINCT categoria FROM productos");
                    while ($fila = mysqli_fetch_assoc($SQL)) {
                        $categoria = $fila['categoria'];
                        $categorias[] = $categoria;
                        echo '<li class="nav-item"> <a class="nav-link focus-in-expand" style="color: black; font-weight: bold; font-size: 18px;"  href="#" data-categoria="' . $categoria . '">' . $categoria . '</a></li>';
                    }
                    ?>
                </ul>
                <br>

                <div class="row row-cols-1 row-cols-md-3 g-4" id="productos-container">
                    <?php
                    $SQL = mysqli_query($conexion, "SELECT productos.IdProducto, productos.nombre, productos.descripcion, productos.categoria, productos.precio, productos.imagen FROM productos");
                    while ($fila = mysqli_fetch_assoc($SQL)):
                    ?>
                    <div class="col producto" data-categoria="<?php echo $fila['categoria'] ?>">
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <div class="card-body bg-white border-white" style="height: auto;">
                                <div class="img-container">
                                    <img src="../product_images/<?php echo $fila['imagen'] ?>" class="card-img-top img-fluid" id="imagen<?php echo $fila['IdProducto'] ?>">
                                </div>
                            </div>
                            <div class="text-center">
                                <h5 class="card-title css-label mt-2" id="nombre<?php echo $fila['IdProducto'] ?>"><?php echo $fila['nombre'] ?></h5>
                                <p class="card-text" id="precio<?php echo $fila['IdProducto'] ?>">$<?php echo $fila['precio'] ?></p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="button-count btn" style="background-color: #f1e645; color: black;" type="button" id="button_sum">+</button>
                                <input type="number" id="valor<?php echo $fila['IdProducto'] ?>" value="1" name="Cantidad" class="ml-2 mr-2" required style="width: 40px" disabled>
                                <button class="button-count btn btn-primary" style="background-color: #f1e645; color: black;" type="button" id="boton_restar">-</button>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="#" class="ml-2">
                                    <img src="../imagenes/Menu/eye.svg" alt="eye" style="width: 40px; height: 40px;">
                                </a>
                                <a href="#" id="carrito-add">
                                    <img src="../imagenes/Menu/cart-check-fill.svg" style="width: 40px; height: 40px;" alt="cart" id="<?php echo $fila['IdProducto'] ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            
            <script>
                function cambiarCategoria(event) {
                    const links = document.querySelectorAll("#categorias .nav-link");
                    links.forEach((link) => link.classList.remove("active"));

                    event.target.classList.add("active");

                    const nuevaCategoria = event.target.dataset.categoria;
                }

                const links = document.querySelectorAll("#categorias .nav-link");
                links.forEach((link) => link.addEventListener("click", cambiarCategoria));
            </script>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const categorias = document.querySelectorAll("#categorias a");
                    const productos = document.querySelectorAll(".producto");

                    categorias.forEach((categoria) => {
                        categoria.addEventListener("click", () => {
                            const categoriaSeleccionada = categoria.getAttribute("data-categoria");

                            productos.forEach((producto) => {
                                const categoriaProducto = producto.getAttribute("data-categoria");
                                if (categoriaProducto === categoriaSeleccionada || categoriaSeleccionada === "Todas") {
                                    producto.style.display = "block";
                                } else {
                                    producto.style.display = "none";
                                }
                            });
                        });
                    });
                });
            </script>

            <!-- ======= Modal ======= -->
            <div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Compra</h5>
                            </div>
                            <div class="modal-body">
                                <form action="../funciones/funciones.php" method="POST">
                                    <div>
                                        <label for="Nombre" class="css-label">Nombre:</label>
                                        <br>
                                        <input type="text" class="css-input" id="nombre">
                                    </div>
                                    <div>
                                        <label for="correo" class="css-label">Correo:</label>
                                        <br>
                                        <input type="text" class="css-input" id="correo">
                                    </div>
                                    <div>
                                        <label for="celular" class="css-label">Celular:</label>
                                        <br>
                                        <input type="text" class="css-input" id="celular">
                                    </div>
                                    <div>
                                        <label for="DireccionEnvio" class="css-label">Dirección de Envio:</label>
                                        <br>
                                        <input type="text" class="css-input" id="DireccionEnvio">
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ver Carrito</button>
                                <input type="submit" class="btn btn-primary" value="Confirmar" value="validar_compras">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">Siguenos</h6>
                                <a href=" https://www.facebook.com/DonaHildaBani?mibextid=ZbWKwL" class="facebook"><i class="bi bi-facebook" ></i></a>
                                <a href="https://instagram.com/donahildabani?igshid=MmU2YjMzNjRlOQ==" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href=" https://api.whatsapp.com/message/XV75XSG4HTO2J1?autoload=1&app_absent=0" class="whatsapp"><i class="bi bi-whatsapp "></i></a>
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
                
                if (valorActual < 15) {
                    valorActual++;
                    input.value = valorActual;
                }
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
                    image: image.replace("http://localhost/Proyecto_Final", "..")
                }

                let lsContent = getLSContent();
                if (lsContent === null) {
                    lsContent = [];
                }

                if (lsContent.some(product => product.id === event.target.id)) {
                    lsContent?.forEach(prod => {
                        if(prod.id === event.target.id){
                            prod.quantity += product.quantity

                        }
                    })
                    setLSContent(lsContent)
                    displayProducts()
                    toastMessageSuccess(product)
                    return
                }

                lsContent.push(product);
                setTotal(lsContent)
                setLSContent(lsContent);
                displayProducts();
                toastMessageSuccess(product);
            }

            function setTotal(lsContent){
                let totalPrice = document.getElementById('total-price')

                if (lsContent){
                    let total = 0;

                    lsContent.forEach(prod => {
                        total += prod.quantity * prod.price
                        totalPrice.textContent = `$${total}`
                    })
                }
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
                document.getElementById('total-price').textContent = `${0}`
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
                                        style="width: 90px; height: 80px;"
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
                                <div class="d-flex justify-content-center align-items-center">
                                    <td class="pl-4">
                                        ${product.quantity * product.price}
                                    </td>
                                </div>
                                <td class="pl-3">
                                    <a href="#" id="${product.id}" style="text-decoration: none;" class="remove" type="">X</a>
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

                setTotal(lsContent)
            }

            //Delete product
            function deleteProduct(id) {
                let lsContent = getLSContent();
                lsContent = lsContent.filter(function(product) {
                    return product.id !== id;
                });

                setLSContent(lsContent);
                displayProducts();
                if (lsContent.length === 0)
                    document.getElementById('total-price').textContent = `${0}`
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    </body>
</html>