<?php
include '../template/navbar_admin.php'; // Incluir el archivo de conexión a la base de datos

?>

<style>
    /* Estilos para el contenedor de la ventana emergente */
    #confirmationDialog {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1050;
        display: none;
        width: 100%;
        height: 100%;
        overflow: hidden;
        outline: 0;
    }

    /* Estilos para el botón "Eliminar" */
    #deleteButton {
        margin-left: 10px;
    }
</style>

<!-- Page title-->
<div class="border-bottom pt-5 mt-2 mb-5">
    <h1 class="mt-2 mt-md-4 mb-3 pt-5">PRODUCTOS</h1>
    <div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
        <p class="text-muted">Este módulo lista todos los productos de la tienda</p>
        <p class="font-size-sm font-weight-medium pl-md-4"><a class="text-nowrap" href="./agregar_productos.php" rel="noopener">Registrar nuevo producto<i class="cxi-angle-right font-size-base align-middle ml-1"></i></a></p>
    </div>
</div>

<div id="confirmationDialog" class="modal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeConfirmationDialog()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este producto?
            </div>
            <div class="modal-footer">
                <button id="cancelButton" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button id="deleteButton" type="button" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<div class="card box-shadow-sm">
    <div class="card-header">
        <h5 style="margin-bottom: 0px;">Filtro de Productos</h5>
    </div>

    <div class="card-body">
        <form class="form-inline pt-2" id="searchForm">
            <div class="input-group">
                <input class="form-control mb-3 mr-sm-2" type="text" id="inline-form-input-name" placeholder="Buscar por nombre " onkeyup="buscarproductos()">
                <div class="input-group-append">
                    <span class="input-group-text" style="background-color: transparent; border: none; padding: 0;">
                        <i class="cxi-search font-size-sm" style="
                            padding-left: 10px;
                            padding-bottom: 15px;
                        "></i>
                    </span>
                </div>
            </div>
        </form>


        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Categoría</th>
                        <th>Subcategoría</th>
                        <th>Marca</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="ProductosTableBody">
                    <?php
                    // Consultar todos los productos con la información necesaria
                    // Consultar todas las subcategorías con el nombre de la categoría a la que pertenecen
                    include '../../config/conexion.php';
                    $query = "SELECT p.id, p.nombre AS producto, COALESCE(c.nombre, 'Sin definir') AS categoria, s.nombre AS subcategoria, m.nombre AS marca, p.imagenes FROM producto p 
                    LEFT JOIN subcategoria s ON p.subcategoria_id = s.id 
                    LEFT JOIN marca m ON p.marca_id = m.id 
                    LEFT JOIN categoria c ON s.categoria_id = c.id";

                    // Variable para contar el número de productos
                    $contadorProductos = 0;

                    // Verificar si se ha enviado el formulario de búsqueda
                    if (isset($_POST['buscar_producto'])) {
                        $nombre = $_POST['nombre'];
                        $nombre = mysqli_real_escape_string($conn, $nombre);
                        $query .= " WHERE p.nombre LIKE '%$nombre%'";
                    }

                    $result = mysqli_query($conn, $query);

                    // Verificar si hay productos
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Incrementar el contador de productos
                            $contadorProductos++;
                            echo '<tr>';
                            echo '<th scope="row">' . $contadorProductos . '</th>';
                            echo '<td>' . $row['producto'] . '</td>';

                            $imagen_url = str_replace(' ', '_', $row['producto']);
                            $imagen_path = '../../Assets/img/productos_img/' . $imagen_url . '/' . $imagen_url . '_' . '1' . '.png';

                            // Verificar si la imagen existe en el directorio
                            if (file_exists($imagen_path)) {
                                echo '<td><img src="' . $imagen_path . '" width="50" height="50" alt="' . $row['producto'] . '"></td>';
                            } else {
                                // Si la imagen no existe, mostrar la imagen predeterminada
                                echo '<td><img src="../../Assets/img/productos_img/default.png" width="50" height="50" alt="' . $row['producto'] . '"></td>';
                            }

                            echo '<td>' . $row['categoria'] . '</td>';
                            echo '<td>' . $row['subcategoria'] . '</td>';
                            echo '<td>' . $row['marca'] . '</td>';
                            echo '<td>';

                            echo '<button class="btn btn-outline-secondary btn-sm editar-producto" data-id="' . $row['id'] . '">Editar</button>';
                            echo '<form method="post" style="display: inline-block;">';
                            echo '<input type="hidden" name="producto_id" value="' . $row['id'] . '">';

                            // Mostrar la ventana emergente personalizada al hacer clic en el botón "Eliminar"
                            echo '<button type="button" class="btn btn-outline-danger btn-sm" onclick="showConfirmationDialog(' . $row['id'] . ')">Eliminar</button>';

                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="7">No se encontraron productos.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a href="#" class="page-link">
                        <<< </a>
                </li>
                <li class="page-item d-none d-sm-block">
                    <a href="#" class="page-link">1</a>
                </li>
                <li class="page-item">
                    <a href="#" class="page-link">>>></a>
                </li>
            </ul>
        </nav>
    </div>
</div>

</div>
</section>
</main>

<!-- Back to top button-->
<a class="btn-scroll-top" href="#top" data-scroll data-fixed-element>
    <span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span>
    <i class="btn-scroll-top-icon cxi-angle-up"></i>
</a>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../Assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../Assets/vendor/simplebar/dist/simplebar.min.js"></script>
<script src="../../Assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

<script>
    function showConfirmationDialog(productoid) {
        var confirmationDialog = document.getElementById("confirmationDialog");
        confirmationDialog.style.display = "block";

        var deleteButton = document.getElementById("deleteButton");
        deleteButton.onclick = function() {
            eliminarproducto(productoid);
        };

        var cancelButton = document.getElementById("cancelButton");
        cancelButton.onclick = function() {
            confirmationDialog.style.display = "none";
        };
    }

    function closeConfirmationDialog() {
        var confirmationDialog = document.getElementById("confirmationDialog");
        confirmationDialog.style.display = "none";
    }

    function eliminarproducto(productoid) {
        var form = document.createElement("form");
        form.setAttribute("method", "post");
        form.style.display = "none";

        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "producto_id");
        input.setAttribute("value", productoid);

        var inputEliminar = document.createElement("input");
        inputEliminar.setAttribute("type", "hidden");
        inputEliminar.setAttribute("name", "eliminar_producto");
        inputEliminar.setAttribute("value", "eliminar");

        form.appendChild(input);
        form.appendChild(inputEliminar);
        document.body.appendChild(form);
        form.submit();
    }
</script>

<script>
    

    // Evento para realizar la búsqueda al escribir en el campo de búsqueda
    document.getElementById("inline-form-input-name").addEventListener("input", function() {
        searchProductos();
    });

    // Capturar el evento de clic en los botones "Editar"
    document.addEventListener("click", function(event) {
        if (event.target.classList.contains("editar-producto")) {
            // Obtener el ID del producto desde el atributo "data-id"
            var productoId = event.target.getAttribute("data-id");

            // Redirigir al usuario a la página de edición correspondiente
            window.location.href = "editar_producto.php?id=" + productoId;
        }
    });
</script>


<!-- Main theme script-->
<script src="../../Assets/js/theme.min.js"></script>
<script src="../../Assets/js/buscartabla.js" ></script>

</body>

</html>