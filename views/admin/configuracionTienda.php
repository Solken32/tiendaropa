<?php include '../template/navbar_admin.php'; ?>
<?php include 'configuraciones.php'; ?>


<div class="container">
    <div class="border-bottom pt-1 mt-2 mb-5">
        <h1 class="mt-2 mt-md-4 mb-3 pt-5">Configuraciones</h1>
        <div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
            <p class="text-muted">Este módulo se establece las configuraciones de la tienda</p>

        </div>
    </div>

    <div class="card box-shadow-sm">
        <div class="card-header">
            <h5 style="margin-bottom: 0px;">Configuraciones</h5>
        </div>

        <div class="card-body">
            <div style="max-width: 100rem;">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <!-- Sección para el Nombre de la tienda -->
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium" for="nombre-input">Nombre de la tienda</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="nombre" id="nombre-input" placeholder="Ingresa el nombre de la tienda" value="<?php echo $nombre; ?>">
                        </div>
                    </div> <br><br>

                    <!-- Sección para el Logo de navegación -->
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium" for="logo-navegacion-input">Logo de navegación (.png)</label>
                        <div class="col-md-9">
                            <input class="form-control" type="file" id="logo-navegacion-input" name="logonav" accept=".png" onchange="previewImage('logo-navegacion-input', 'logo-navegacion-preview')">
                            <?php $logonavSrc = $logonav . '?' . time(); // Agregar el parámetro de consulta 
                            ?>
                            <img id="logo-navegacion-preview" src="<?php echo $logonavSrc; ?>" alt="Vista previa del logo de navegación" style="max-width: 100px; max-height: 100px; display: <?php echo empty($logonav) ? 'none' : 'block'; ?>;">
                        </div>
                    </div> <br><br>

                    <!-- Sección para el Logo de tienda -->
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium" for="logo-tienda-input">Logo de tienda (.png)</label>
                        <div class="col-md-9">
                            <input class="form-control" type="file" id="logo-tienda-input" name="logo" accept=".png" onchange="previewImage('logo-tienda-input', 'logo-tienda-preview')">
                            <?php $logoSrc = $logo . '?' . time(); // Agregar el parámetro de consulta 
                            ?>
                            <img id="logo-tienda-preview" src="<?php echo $logoSrc; ?>" alt="Vista previa del logo de tienda" style="max-width: 100px; max-height: 100px; display: <?php echo empty($logo) ? 'none' : 'block'; ?>;">
                        </div>
                    </div> <br><br>

                    <!-- Sección para el Icono -->
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium" for="icon-input">Icono (.png)</label>
                        <div class="col-md-9">
                            <input class="form-control" type="file" id="icon-input" name="icon" accept=".png" onchange="previewImage('icon-input', 'icon-preview')">
                            <?php $iconSrc = $icon . '?' . time(); // Agregar el parámetro de consulta 
                            ?>
                            <img id="icon-preview" src="<?php echo $iconSrc; ?>" alt="Vista previa del icono" style="max-width: 100px; max-height: 100px; display: <?php echo empty($icon) ? 'none' : 'block'; ?>;">
                        </div>
                    </div><br><br>

                    <!-- Sección para el enlace de Facebook -->
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium">Facebook</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fab fa-facebook"></i></div>
                                </div>
                                <input type="text" class="form-control" name="facebook" placeholder="Enlace de Facebook" value="<?php echo $facebook; ?>">
                            </div>
                        </div>
                    </div><br><br>

                    <!-- Sección para el enlace de Instagram -->
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium">Instagram</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fab fa-instagram"></i></div>
                                </div>
                                <input type="text" class="form-control" name="instagram" placeholder="Enlace de Instagram" value="<?php echo $instagram; ?>">
                            </div>
                        </div>
                    </div><br><br>

                    <!-- Sección para el número de WhatsApp -->
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium">WhatsApp</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fab fa-whatsapp"></i></div>
                                </div>
                                <input type="text" class="form-control" name="whatsapp" placeholder="Número o link del grupo de WhatsApp" value="<?php echo $whatsapp; ?>">
                            </div>
                        </div>
                    </div> <br><br>

                    <!-- Sección para el número de teléfono -->
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium">Teléfono</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone-square"></i></div>
                                </div>
                                <input type="text" class="form-control" name="numero" placeholder="Número de Teléfono" value="<?php echo $numero; ?>">
                            </div>
                        </div>
                    </div> <br><br>

                    <!-- Sección para el correo electrónico -->
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium" for="email-input">Correo Electrónico</label>
                        <div class="col-md-9">
                            <input class="form-control" type="email" name="email" id="email-input" placeholder="Ingresa el correo electrónico" value="<?php echo $email; ?>">
                        </div>
                    </div><br><br>

                    <!-- Sección para la dirección de la tienda -->
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium" for="direccion-input">Dirección de Tienda</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="dirección" id="direccion-input" placeholder="Ingresa la dirección de la tienda" value="<?php echo $direccion; ?>">
                        </div>
                    </div> <br><br>

                    <!-- Sección para el link del mapa -->
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium" for="mapa-input">Link del Mapa</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="googlemaps" id="mapa-input" placeholder="Ingresa el link del mapa" value="<?php echo $gmap; ?>">
                        </div>
                    </div> <br><br>

                    <!-- Sección para el Logo de tienda -->
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium" for="logo-tienda-input">Logo de tienda (.png)</label>
                        <div class="col-md-9">
                            <input class="form-control" type="file" id="logo-tienda-input" name="logo" accept=".png" onchange="previewImage('logo-tienda-input', 'logo-tienda-preview')">
                            <?php $logoSrc = $logo . '?' . time(); // Agregar el parámetro de consulta 
                            ?>
                            <img id="logo-tienda-preview" src="<?php echo $logoSrc; ?>" alt="Vista previa del logo de tienda" style="max-width: 100px; max-height: 100px; display: <?php echo empty($logo) ? 'none' : 'block'; ?>;">
                        </div>
                    </div><br><br>

                    <!-- Sección para los banners -->
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium" for="banner1-tienda-input">Banner 1 (.jpg)</label>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="banner1" id="banner1-tienda-input" accept=".jpg" onchange="previewImage('banner1-tienda-input', 'banner1-tienda-preview')">
                            <?php $banner1Src = $banner1 . '?' . time(); // Agregar el parámetro de consulta 
                            ?>
                            <img id="banner1-tienda-preview" src="<?php echo $banner1Src; ?>" alt="Vista previa del Banner 1" style="max-width: 100px; max-height: 100px; display: <?php echo empty($banner1) ? 'none' : 'block'; ?>;">
                        </div>
                    </div><br><br>


                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium" for="banner2-tienda-input">Banner 2 (.jpg)</label>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="banner2" id="banner2-tienda-input" accept=".jpg" onchange="previewImage('banner2-tienda-input', 'banner2-tienda-preview')">
                            <?php $banner2Src = $banner2 . '?' . time(); // Agregar el parámetro de consulta 
                            ?>
                            <img id="banner2-tienda-preview" src="<?php echo $banner2Src; ?>" alt="Vista previa del Banner 2" style="max-width: 100px; max-height: 100px; display: <?php echo empty($banner2) ? 'none' : 'block'; ?>;">
                        </div>
                    </div><br><br>


                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium" for="banner3-tienda-input">Banner 3 (.jpg)</label>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="banner3" id="banner3-tienda-input" accept=".jpg" onchange="previewImage('banner3-tienda-input', 'banner3-tienda-preview')">
                            <?php $banner3Src = $banner3 . '?' . time(); // Agregar el parámetro de consulta 
                            ?>
                            <img id="banner3-tienda-preview" src="<?php echo $banner3Src; ?>" alt="Vista previa del Banner 3" style="max-width: 100px; max-height: 100px; display: <?php echo empty($banner3) ? 'none' : 'block'; ?>;">
                        </div>
                    </div><br><br>


                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label font-weight-medium" for="banner4-tienda-input">Banner 4 (.jpg)</label>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="banner4" id="banner4-tienda-input" accept=".jpg" onchange="previewImage('banner4-tienda-input', 'banner4-tienda-preview')">
                            <?php $banner4Src = $banner4 . '?' . time(); // Agregar el parámetro de consulta 
                            ?>
                            <img id="banner4-tienda-preview" src="<?php echo $banner4Src; ?>" alt="Vista previa del Banner 4" style="max-width: 100px; max-height: 100px; display: <?php echo empty($banner4) ? 'none' : 'block'; ?>;">
                        </div>
                    </div><br><br>

                    <div class="form-group   text-center">
                        <button type="submit" class="btn btn-primary mr-3">Guardar cambios</button>
                    </div> <br>
                </form>

                <!-- Mostrar mensaje de éxito si existe -->
                <?php if (isset($success)) : ?>
                    <script src="../../Assets/js/iziToast.min.js"></script>
                    <link rel="stylesheet" href="../../Assets/css/iziToast.min.css">
                    <script>
                        window.onload = function() {
                            iziToast.success({
                                timeout: 3000,
                                title: "Éxito",
                                message: "<?php echo $success; ?>",
                                position: "topRight"
                            });
                        };
                    </script>
                <?php endif; ?>

                <!-- Mostrar mensaje de error si existe -->
                <?php if (isset($error)) : ?>
                    <script src="<?php echo BASE_URL; ?>Assets/js/iziToast.min.js"></script>
                    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/iziToast.min.css">
                    <script>
                        window.onload = function() {
                            iziToast.error({
                                title: "Error",
                                message: "<?php echo $error; ?>",
                                position: "topRight"
                            });
                        };
                    </script>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div> <br><br><br><br>


<script src="../../Assets/js/configuraciontienda.js"></script>
<?php include '../template/footer_admin.php'; ?>