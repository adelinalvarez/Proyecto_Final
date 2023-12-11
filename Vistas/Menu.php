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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link href="../css/style.css" rel="stylesheet">
        <title>Doña Hilda Tapas and Grill</title>
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
        <style>
            #cart-content thead tr th {
                padding: 20px;
                text-align: center;
            }
            .button-count {
                border: none;
                padding: 10px;
                width: 35px;
                height: 35px;
                border-radius: 100%;
            }
        </style>

    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-black nav-height">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2" href="Index.php">
                    <img src="../imagenes/Logo-Hilda.png" height="40"style="margin-top: -1px;"/>
                    <a class="nav-link" href="../Index.php" style= "color: white">Doña Hilda Tapas and Grill</a>
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
                <div class="collapse navbar-collapse" id="navbarButtonsExample" >
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        </li>
                    </ul>
                    <!-- Left links -->

                    <div class="d-flex align-items-center justify-content-center w-auto nav-items-responsive">
                        <a class="nav-link p-2 EfectoSombra" href="../Index.php">Inicio</a>
                        <a class="nav-link p-2 EfectoSombra" href="Nosotros.php">Nosotros</a>
                        <a class="nav-link p-2 EfectoSombra" href="Menu.php">Menu</a>
                        <a class="nav-link p-2 EfectoSombra" href="Reservas.php">Reserva</a>
                        <a class="nav-link p-2 EfectoSombra" href="Contacto.php">Contacto</a>
                        <a class="BotonIniciar" type="button" href="login.php"> Iniciar Sesión </a>
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
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->

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
                                <th class="pl-4" >Nombre</th>
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
                                id="boton_comprar"
                                onclick="prepararCompra()" 
                            >
                                Comprar
                            </button>
                            <br>
                           <a href="#" type="button" id="clear-cart" class="btn btn-primary w-100">Limpiar Carrito</a>
                       </div>
                    </div>
                </div>
            </div>
        </div>

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
                            <a href="#" class="mostrar-producto" data-bs-toggle="modal" data-bs-target="#detalleProductoModal" data-producto-id="<?php echo $fila['IdProducto']; ?>">
                                <img src="../imagenes/Menu/eye.svg" style="width: 40px; height: 40px;" alt="cart">
                            </a>
                            <button class="button-count btn" style="background-color: #f1e645; color: black;" type="button" id="button_sum">+</button>
                            <input type="number" id="valor<?php echo $fila['IdProducto'] ?>" value="1" name="Cantidad" class="ml-2 mr-2" required style="width: 40px" disabled>
                            <button class="button-count btn btn-primary" style="background-color: #f1e645; color: black;" type="button" id="boton_restar">-</button>
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
        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 15px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);">
                    <div class="modal-header" style="background-color: #f8f673; border-radius: 15px 15px 0 0;">
                        <h5 class="modal-title text-center text-dark" id="exampleModalLabel" style="font-size: 24px;">Confirmar Compra</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="canva-modal"></div>
                        <form action="../funciones/funciones.php" method="POST" id="validar_compras" onsubmit="return validar_compras()">
                            <div class="row">
                                <div class="col-12 text-center mb-3">
                                    <label for="fecha" class="css-label">Fecha:
                                        <?php
                                            date_default_timezone_set('America/Santo_Domingo');
                                            $currentDateTime = new DateTime('now');
                                            $currentDate = $currentDateTime->format('d-m-Y h:i:s');
                                            echo $currentDate;
                                        ?>
                                    </label>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-8">
                                        <!-- Labels e Inputs -->
                                        <label for="nombre" class="css-label">Nombre:</label>
                                        <input type="text" class="form-control border border-dark" style="border-radius: 0.1;" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" title="Ingrese solo letras y espacios" placeholder="Ingrese su nombre completo" id="nombre" name="nombre" required>

                                        <label for="correo" class="css-label">Correo:</label>
                                        <input type="email" class="form-control border border-dark" style="border-radius: 0.1;" placeholder="Ingrese su correo" id="correo" name="correo" required>

                                        <label for="celular" class="css-label">Celular:</label>
                                        <input type="tel" class="form-control border border-dark" style="border-radius: 0.1;" pattern="[0-9]+" title="Ingrese solo números" placeholder="Ingrese su Celular" id="celular" name="celular" required>

                                        <label for="DireccionEnvio" class="css-label">Direccion de Envio:</label>
                                        <textarea class="form-control border border-dark" style="border-radius: 0.1;" placeholder="Dirección de Envío" id="DireccionEnvio" name="DireccionEnvio" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="accion" value="validar_compras">
                        </form>
                    </div>
                    <div class="modal-footer d-flex justify-content-center" style="border-radius: 0 0 15px 15px;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #f8f673; color: #000;">Ver Carrito</button>
                        <button type="submit" class="btn btn-primary" form="validar_compras" style="background-color: #f8f673; color: #000;">Confirmar Compra</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="detalleProductoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalles del Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body" id="detalleProductoBody">
                        <img id="imagenProducto" src="" alt="Imagen del producto" style="max-width: 100%; height: auto;">
                        <p><strong>ID:</strong> <span id="idProducto"></span></p>
                        <p><strong>Nombre:</strong> <span id="nombreProducto"></span></p>
                        <p><strong>Descripción:</strong> <span id="descripcionProducto"></span></p>
                        <p><strong>Categoría:</strong> <span id="categoriaProducto"></span></p>
                        <p><strong>Precio:</strong> <span id="precioProducto"></span></p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var myModal = new bootstrap.Modal(document.getElementById('detalleProductoModal'));

                document.querySelectorAll('.mostrar-producto').forEach(function (boton) {
                    boton.addEventListener('click', function () {
                        var idProducto = this.getAttribute('data-producto-id');

                        fetch('../funciones/funciones.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: new URLSearchParams({
                                'id': idProducto
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                console.error('Error en la respuesta del servidor:', data.error);
                            } else {
                                document.getElementById('idProducto').innerText = data.IdProducto;
                                document.getElementById('nombreProducto').innerText = data.nombre;
                                document.getElementById('descripcionProducto').innerText = data.descripcion;
                                document.getElementById('categoriaProducto').innerText = data.categoria;
                                document.getElementById('precioProducto').innerText = data.precio;

                                document.getElementById('imagenProducto').src = data.imagen;
                                myModal.show();
                            }
                        })
                        .catch(error => console.error('Error en la solicitud:', error));
                    });
                });
            });
        </script>


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
        <!-- End Footer -->  
        
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

            function prepararCompra() {

                const productosParaCompra = obtenerInformacionProductos();
                
                llenarModal(productosParaCompra);
            }

            function obtenerInformacionProductos() {
                const lsContent = getLSContent();
                let productosParaCompra = [];

                if (lsContent !== null) {
                    for (let product of lsContent) {
                        productosParaCompra.push({
                            id: product.id,
                            quantity: product.quantity,
                            price: product.price
                        });
                    }
                }

                return productosParaCompra;
            }

            function llenarModal(productosParaCompra) {
                const canvaModal = document.getElementById('canva-modal');
                let canvaMarkup = "";

                for (let product of productosParaCompra) {
                    canvaMarkup += `
                        
                    `;
                }

                canvaModal.innerHTML = canvaMarkup;

                const carritoInput = document.createElement('input');
                carritoInput.type = 'hidden';
                carritoInput.name = 'compra';
                carritoInput.value = JSON.stringify(productosParaCompra);
                document.getElementById('validar_compras').appendChild(carritoInput);
            }

        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script>
            function openModal(id) {
            var modal = document.getElementById('mostrar');
            modal.style.display = 'block';
            // Puedes personalizar el contenido del modal según el ID pasado
            }

            function closeModal() {
            var modal = document.getElementById('mostrar');
            modal.style.display = 'none';
            }

            document.querySelector('.open-modal').addEventListener('click', function(e) {
            e.preventDefault();
            var productId = this.getAttribute('data-id');
            openModal(productId);
            });
        </script>
        
    </body>

    <script>
        $(document).ready(function () {
            $('.btn-view').on('click', function () {
                const IdProducto = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: "../funciones/funciones.php", // Cambia esto a la ruta correcta
                    data: {
                        id: IdProducto,
                        accion: 'mostrar_productos'
                    },
                    success: function (response) {
                        const productosData = JSON.parse(response);

                        if (productosData) {
                            Swal.fire({
                                title: 'Datos del producto:',
                                html: `<p class="css-label">nombre: </p> <p>${productosData.nombre}</p>
                                       <p class="css-label">descripcion: </p> <p>${productosData.descripcion}</p>
                                       <p class="css-label">categoria: </p> <p>${productosData.NombreCategoria}</p>
                                       <p class="css-label">precio: </p> <p>${productosData.precio}</p>`,
                            });
                        } else {
                            Swal.fire('Error', 'No se pudo cargar los datos del producto', 'error');
                        }
                    },
                    error: function () {
                        Swal.fire('Error', 'Hubo un error en la solicitud', 'error');
                    }
                });
            });
        });
    </script>

<style>
        .column {
            width: 40%;
            display: inline-block;
            vertical-align: top;
            border-right: 1px solid #ccc; /* Línea divisoria entre las columnas */
            padding-right: 10px; /* Espacio a la derecha de la línea divisoria */
        }

        .divider {
            width: 4%;
            display: inline-block;
        }

        /* Establece un ancho personalizado para el modal */
        .swal2-popup {
            width: 80%; /* Ancho personalizado */
        }
    </style>

</html>

