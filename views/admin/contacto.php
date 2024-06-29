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
    <h1 class="mt-2 mt-md-4 mb-3 pt-5">CONTACTOS</h1>
    <div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
        <p class="text-muted">Este módulo lista todos los contactosde la tienda</p>
        <p class="font-size-sm font-weight-medium pl-md-4"><a class="text-nowrap" href="#" rel="noopener">Contactos<i class="cxi-angle-right font-size-base align-middle ml-1"></i></a></p>
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
                ¿Estás seguro de que deseas eliminar este contacto?
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
        <h5 style="margin-bottom: 0px;">Filtro de Contactos</h5>
    </div>

    <div class="card-body">
        <form class="form-inline pt-2" id="searchForm">
            <div class="input-group">
                <input class="form-control mb-3 mr-sm-2" type="text" id="inline-form-input-name" placeholder="Buscar por nombre" onkeyup="buscarContacto()">
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
                        <th>apellido</th>
                        <th>email</th>
                        <th>telefono</th>
                        <th>mensaje</th>
                    </tr>
                </thead>
                <tbody id="ProductosTableBody">
                    <?php
                    // Consultar todos los productos con la información necesaria
                    // Consultar todas las subcategorías con el nombre de la categoría a la que pertenecen
                    $query = "SELECT * FROM contacto";

                    // Variable para contar el número de productos
                    $contadorProductos = 0;

                    // Verificar si se ha enviado el formulario de búsqueda
                    if (isset($_POST['buscar_contacto'])) {
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
                            echo '<td>' . $row['nombre'] . '</td>';
                      

                            echo '<td>' . $row['apellido'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                            echo '<td>' . $row['telefono'] . '</td>';
                            echo '<td>' . $row['mensaje'] . '</td>';
                            echo '<td>';

                            //echo '<button class="btn btn-outline-secondary btn-sm editar-producto" data-id="' . $row['id_contacto'] . '">Editar</button>';
                            //echo '<form method="post" style="display: inline-block;">';
                            //echo '<input type="hidden" name="producto_id" value="' . $row['id_contacto'] . '">';

                            // Mostrar la ventana emergente personalizada al hacer clic en el botón "Eliminar"
                            echo '<button type="button" class="btn btn-outline-danger btn-sm" onclick="showConfirmationDialog(' . $row['id_contacto'] . ')">Eliminar</button>';

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


<!-- Main theme script-->
<script src="../../Assets/js/theme.min.js"></script>
<!-- Funciones contacto-->
<script src="../../Assets/js/contacto_admin.js"></script>


</body>

</html>