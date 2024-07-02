      <!-- HTML + navbar -->
      
      <?php 
      
      include 'config/config.php';
      include BASE_PATH . 'config/conexion.php';
      include TEMPLATE_PATH . 'navbar_tienda.php';
      
      
      //include TEMPLATE_PATH. 'navbar_tienda.php';
      
      ?>
      

      <?php 

  // Consultar los datos de la tabla "tiendaconfig"
      $sql = "SELECT * FROM tiendaconfig";
      $result = $conn->query($sql);

      // Inicializar variables para almacenar los datos de la tabla
      $nombre_tienda = "";
      $facebook = "";
      $instagram = "";
      $whatsapp = "";
      $numero = "";
      $email = "";

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre_tienda = $row['nombre'];
        $facebook = $row['facebook'];
        $instagram = $row['instagram'];
        $whatsapp = $row['whatsapp'];
        $numero = $row['numero'];
        $email = $row['email'];
      }

      // Extraer el nombre de usuario de la URL
      $instagram = $row['instagram']; // Asignar el valor de la URL completa de Instagram a la variable $instagram

      // Extraer el nombre de usuario de la URL utilizando una expresión regular
      preg_match('/^https:\/\/(?:www\.)?instagram\.com\/([a-zA-Z0-9._]+)/', $instagram, $matches);
      $nombreUsuario = isset($matches[1]) ? $matches[1] : '';

      // Verificar que el nombre de usuario no esté vacío
      if (!empty($nombreUsuario)) {
        // Mostrar el nombre de usuario con el prefijo "@"
        $instagram_usuario = '@' . $nombreUsuario;
      } else {
        // Si no se encontró el nombre de usuario
        $instagram_usuario = 'Nombre de usuario no encontrado.';
      }

      // Consultar las 6 primeras categorías desde la base de datos
      $query = "SELECT id, nombre, imagen FROM categoria ORDER BY id LIMIT 6";
      $result = mysqli_query($conn, $query);

      // Crear un array para almacenar las categorías
      $categorias = array();

      // Verificar si hay categorías
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          // Agregar cada categoría al array
          $categorias[] = $row;
        }
      }


      // Consultar la categoría con el primer created_at desde la base de datos
      $queryFirstCategory = "SELECT c.nombre AS categoria_nombre, c.imagen AS categoria_imagen
                      FROM producto p
                      LEFT JOIN categoria c ON p.categoria_id = c.id
                      ORDER BY p.created_at ASC
                      LIMIT 1";

      $resultFirstCategory = mysqli_query($conn, $queryFirstCategory);
      $firstCategory = mysqli_fetch_assoc($resultFirstCategory);


      // Realizar la consulta SQL para obtener las rutas de las imágenes de marca
      $query = "SELECT imagen FROM marca";
      $result = mysqli_query($conn, $query);

      // Verificar si se obtuvieron resultados
      if ($result) {
        // Crear un arreglo para almacenar las rutas de las imágenes
        $rutasImagenes = array();

        // Recorrer los resultados y almacenar las rutas de las imágenes en el arreglo
        while ($row = mysqli_fetch_assoc($result)) {
          $rutaImagen = $row['imagen'];
          $rutasImagenes[] = './Assets/' . $rutaImagen;
        }
      } else {
        // Mostrar mensaje de error si la consulta falla
        echo "Error al obtener las rutas de las imágenes de marca: " . mysqli_error($conn);
      }

      // Hacer la consulta SQL para obtener los productos
      $query = "SELECT id, nombre, precio FROM producto LIMIT 8";
      $result = mysqli_query($conn, $query);

      // Inicializar un array para almacenar los datos de los productos
      $productos = array();

      // Recorrer los resultados y guardar los datos de los productos en el array
      while ($row = mysqli_fetch_assoc($result)) {
        $productos[] = $row;
      }


      ?>
      <!-- end navbar -->

      <!-- Hero slider -->
      <section class="cs-carousel cs-controls-onhover">
        <div class="cs-carousel-inner" data-carousel-options='{
          "mode": "gallery",
          "navContainer": "#pager",
          "responsive": {
            "0": { "controls": false },
            "991": { "controls": true }
          }
        }'>

          <!-- Slide 1 -->
          <div class="bg-size-cover py-xl-6" style="background-image: url(<?php echo BASE_URL;?>assets_tienda/img/ecommerce/home/hero-slider/banner1.jpg);">
            <div class="container pt-5 pb-6">
              <div class="row pb-lg-6">
                <div class="col-lg-6 offset-lg-1 offset-xl-0 pb-4 pb-md-6">
                  <h3 class="font-size-lg text-uppercase cs-from-left cs-delay-1" style="color:white; text-shadow: 4px 0px 3px rgba(0, 0, 0, 0.85);">Bienvenido a</h3>
                  <h2 class="display-2 mb-lg-5 pb-3 cs-from-left" style="color:white; text-shadow: 4px 0px 3px rgba(0, 0, 0, 0.85);"><?php echo $nombre_tienda; ?></h2>
                  <div class="mb-4 cs-scale-up cs-delay-2">
                    <a href="<?php echo VIEWSTIENDA_PATH; ?>catalogo.php" class="btn btn-primary btn-lg">Ver Catálogo</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="bg-size-cover py-xl-6" style="background-image: url(assets/img/ecommerce/home/hero-slider/banner2.jpg);">
            <div class="container pt-5 pb-6">
              <div class="row pb-lg-6">
                <div class="col-lg-6 offset-lg-1 offset-xl-0 pb-4 pb-md-6">
                  <h3 class="font-size-lg text-uppercase cs-from-top cs-delay-1" style="color:white; text-shadow: 4px 0px 3px rgba(0, 0, 0, 0.85);">Nuevos productos</h3>
                  <?php
                  // Establecer la configuración regional en español
                  setlocale(LC_TIME, 'es_ES.utf8', 'es_ES', 'Spanish_Spain.utf8', 'Spanish_Spain');

                  // Obtener el nombre del mes en español
                  $currentMonth = strftime('%B'); // strftime convierte el formato de fecha/hora según la configuración regional

                  // Obtener el año actual
                  $currentYear = date('Y');
                  ?>
                  <h2 class="display-2 mb-lg-5 pb-3 cs-scale-down" style="color:white; text-shadow: 4px 0px 3px rgba(0, 0, 0, 0.85);"><?php echo ucfirst($currentMonth) . ' ' . $currentYear; ?></h2>
                  <div class="mb-4 cs-scale-down cs-delay-2">
                    <a href="catalogo.php#Nuevos" class="btn btn-primary btn-lg">Ver Catálogo</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="bg-size-cover py-xl-6" style="background-image: url(assets/img/ecommerce/home/hero-slider/banner3.jpg);">
            <div class="container pt-5 pb-6">
              <div class="row pb-lg-6">
                <div class="col-lg-6 offset-lg-1 offset-xl-0 pb-4 pb-md-6">
                  <h3 class="font-size-lg text-uppercase cs-from-left cs-delay-1"></h3>
                  <h2 class="display-2 mb-lg-5 pb-3 cs-from-left" style="color:white; text-shadow: 4px 0px 3px rgba(0, 0, 0, 0.85);">Lo Mejor De La Calle</h2>
                  <div class="mb-4 cs-scale-up cs-delay-2">
                    <a href="catalogo.php#Popularidad" class="btn btn-primary btn-lg">Ver Catálogo</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 4 -->
          <div class="bg-size-cover py-xl-6" style="background-image: url(assets/img/ecommerce/home/hero-slider/banner4.jpg);">
            <div class="container pt-5 pb-6">
              <div class="row pb-lg-6">
                <div class="col-lg-6 offset-lg-1 offset-xl-0 pb-4 pb-md-6">
                  <h3 class="font-size-lg text-uppercase cs-from-top cs-delay-1" style="color:white; text-shadow: 4px 0px 3px rgba(0, 0, 0, 0.85);">Los mejores precios</h3>
                  <h2 class="display-2 mb-lg-5 pb-3 cs-scale-down" style="color:white; text-shadow: 4px 0px 3px rgba(0, 0, 0, 0.85);">Encuentralos Aquí</h2>
                  <div class="mb-4 cs-scale-down cs-delay-2">
                    <a href="catalogo.php#Precio%20bajo%20-%20alto" class="btn btn-primary btn-lg">Ver Catálogo</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pager -->
        <div class="container position-relative">
          <div class="row mt-lg-n5">
            <div class="col-lg-7 col-md-8 col-sm-10 offset-lg-1 offset-xl-0">
              <div class="position-relative">
                <div id="pager" class="cs-pager cs-pager-inverse mb-xl-5 pb-5 pb-md-6">
                  <button type="button" data-nav="0" style="color:white; text-shadow: 4px 0px 3px rgba(0, 0, 0, 0.85);">01</button>
                  <button type="button" data-nav="1" style="color:white; text-shadow: 4px 0px 3px rgba(0, 0, 0, 0.85);">02</button>
                  <button type="button" data-nav="2" style="color:white; text-shadow: 4px 0px 3px rgba(0, 0, 0, 0.85);">03</button>
                  <button type="button" data-nav="3" style="color:white; text-shadow: 4px 0px 3px rgba(0, 0, 0, 0.85);">04</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Recientemente -->
      <section class="container-fluid px-xl-grid-gutter mt-5 mb-3 mb-sm-4 mt-md-0 mb-lg-5 py-5 py-lg-6">
        <div class="text-center mb-5 pb-2">
          <h2 class="h1">Nuevos productos</h2>
          <p class="font-size-lg text-muted mb-1">Hecha un vistazo a nuestras últimas novedades de esta temporada</p>
          <a href="<?php echo VIEWSTIENDA_PATH; ?>catalogo.php" class="font-size-lg">Ver la colección aqui</a>
        </div>

        <!-- Product carousel -->
        <div class="cs-carousel cs-nav-outside">
          <div class="cs-carousel-inner" data-carousel-options='{
    "controls": false,
    "responsive": {
      "0": {
        "items": 1,
        "gutter": 20
      },
      "420": {
        "items": 2,
        "gutter": 20
      },
      "600": {
        "items": 3,
        "gutter": 20
      },
      "700": {
        "items": 3,
        "gutter": 30
      },
      "900": {
        "items": 4,
        "gutter": 30
      },
      "1200": {
        "items": 5,
        "gutter": 30
      },
      "1400": {
        "items": 6,
        "gutter": 30
      }
    }
  }'>
            <?php if (!empty($productos)) : ?>
              <?php foreach ($productos as $producto) : ?>
                <!-- Item -->
                <div>
                  <div class="card card-product">
                    <div class="card-product-img">
                      <?php
                      // Obtener la carpeta del producto y el nombre de la imagen con el formato correcto
                      $nombreCarpeta = str_replace(' ', '_', $producto['nombre']);
                      $nombreImagen = $nombreCarpeta . '_1.png';
                      $rutaImagen = "<?php echo BASE_URL; ?>Assets/img/productos_img/$nombreCarpeta/$nombreImagen";
                      $rutaImagenDefault = "<?php echo BASE_URL; ?>Assets/img/productos_img/default.png";

                      // Verificar si la imagen en la ruta existe
                      if (file_exists($rutaImagen)) {
                        $imagenMostrar = $rutaImagen;
                      } else {
                        $imagenMostrar = $rutaImagenDefault;
                      }
                      ?>
                      <a href="<?php echo BASE_URL;?>views/tienda/detalle-producto.php?id=<?php echo $producto['id']; ?>" class="card-img-top">
                        <img src="<?php echo $rutaImagen; ?>" alt="Product image">
                      </a>
                      <div class="card-product-widgets-top">
                        <div class="star-rating">
                          <i class="sr-star cxi-star-filled active"></i>
                          <i class="sr-star cxi-star-filled active"></i>
                          <i class="sr-star cxi-star-filled active"></i>
                          <i class="sr-star cxi-star-filled active"></i>
                          <i class="sr-star cxi-star-filled active"></i>
                        </div>
                      </div>
                      <?php
                      // Verificar si el usuario tiene la sesión iniciada
                      if (isset($_SESSION["user_token"])) {
                        $user_token = $_SESSION["user_token"];
                      ?>
                        <div class="card-product-widgets-bottom">
                          <a href="#" class="btn-wishlist ml-auto" data-toggle="tooltip" data-placement="left" title="Añadir a favoritos"></a>
                        </div>
                      <?php
                      } else {
                        // Aquí puedes agregar el contenido que deseas mostrar cuando el usuario no tiene sesión iniciada
                      }
                      ?>
                    </div>
                    <div class="card-body">
                      <h3 class="card-product-title text-truncate mb-2">
                        <a href="<?php echo BASE_URL; ?>views/tienda/detalle-producto.php?id=<?php echo $producto['id']; ?>" class="nav-link"><?php echo $producto['nombre']; ?></a>
                      </h3>
                      <div class="d-flex align-items-center">
                        <span class="h5 d-inline-block mb-0 precio-span">
                          <?php echo 'S/.' . $producto['precio']; ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
          </div>
        <?php else : ?>
          <p>No hay productos disponibles.</p>
        <?php endif; ?>
        </div>

      </section>

      <!-- Promo banners -->
      <section class="container-fluid px-xl-grid-gutter">
        <div class="row mx-n2">

          <!-- Banner -->
          <div class="col-lg-5 px-2 mb-3">
            <div class="d-flex flex-column h-100 bg-size-cover bg-position-center-y rounded py-5 px-md-5 px-4" style="background-image: url(./assets/img/ecommerce/home/banners/01.jpg);">
              <div class="mt-md-3 mb-md-6 pb-6 px-md-2">
                <h3 class="mb-2 pb-1 fs-sm text-uppercase">Summer Collections</h3>
                <h2 class="pb-3">Sale Up to 70%</h2>
                <a href="catalogo.php#Nuevos" class="btn btn-outline-primary">Explorar nuevos productos</a>
              </div>
            </div>
          </div>

          <!-- Banner -->
          <div class="col-lg-7 px-2 mb-3">
            <div class="d-flex flex-column h-100 bg-size-cover bg-position-center-y rounded py-5 px-md-5 px-4" style="background-image: url(./assets/img/ecommerce/home/banners/02.jpg);">
              <div class="mt-md-3 mb-md-5 pb-5 px-md-2" style="max-width: 22rem;">
                <h3 class="mb-2 pb-1 fs-sm text-uppercase">Deal of the Week</h3>
                <h2 class="pb-3">Stay Warm With Our New Sweaters</h2>
                <a href="#" class="btn btn-outline-primary">Shop now</a>
              </div>
              <div class="mb-md-3 px-md-2">
                <h3 class="mb-2 pb-1 fs-sm text-uppercase">Limited time offer</h3>
                <div class="countdown h3 mb-0" data-countdown="01/30/2024 07:00:00 PM">
                  <div class="countdown-days mb-0">
                    <span class="countdown-value">0</span>
                    <span class="countdown-label mt-1 fs-sm text-body">Days</span>
                  </div>
                  <div class="countdown-hours mb-0">
                    <span class="countdown-value">0</span>
                    <span class="countdown-label mt-1 fs-sm text-body">Hours</span>
                  </div>
                  <div class="countdown-minutes mb-0">
                    <span class="countdown-value">0</span>
                    <span class="countdown-label mt-1 fs-sm text-body">Mins</span>
                  </div>
                  <div class="countdown-seconds mb-0">
                    <span class="countdown-value">0</span>
                    <span class="countdown-label mt-1 fs-sm text-body">Secs</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mx-n2">

          <!-- Banner -->
          <div class="col-lg-12 px-2 mb-3">
            <?php
            // Generar la ruta completa de la imagen
            $rutaImagen = '<?php echo BASE_URL; ?>Assets/img/categoria_img/' . $firstCategory['categoria_imagen'];
            ?>
            <div class="d-flex flex-column h-100 bg-size-cover bg-position-center-y rounded py-5 px-md-5 px-4" style="background-image: url(<?php echo $rutaImagen; ?>);">
              <div class="mt-md-3 mb-md-6 pb-6 px-md-2" style="max-width: 22rem;">
                <h3 class="mb-2 pb-1 fs-sm text-uppercase" style="color:red; text-shadow: 2px 0px 3px rgba(0, 0, 0, 12);">Nueva colección</h3>
                <h2 class="pb-3" style="color:white; text-shadow: 4px 0px 3px rgba(0, 0, 0, 0.85);"><?php echo $firstCategory['categoria_nombre']; ?><br><?php echo ucfirst($currentMonth) . ' ' . $currentYear; ?></h2>
                <a href="catalogo.php#<?php echo $firstCategory['categoria_nombre']; ?>" class="btn btn-outline-primary">Ver Catálogo</a>
              </div>
            </div>
          </div>

        </div>
      </section>


      <!-- categorias -->
      <section class="container mt-1 mb-3 my-sm-4 py-5 py-lg-6">
        <h2 class="h1 mb-5 pb-3 text-center">Categorías</h2>
        <div class="cs-carousel cs-nav-outside">
          <div class="cs-carousel-inner" data-carousel-options='{
                  "controls": false,
                  "gutter": 30,
                  "responsive": {
                      "0": { "items": 1 },
                      "380": { "items": 2 },
                      "550": { "items": 3 },
                      "750": { "items": 4 },
                      "1000": { "items": 5 },
                      "1250": { "items": 6 }
                  }
              }'>

            <?php foreach ($categorias as $categoria) : ?>
              <!-- Category -->
              <div class="pb-2">
                <a href="catalogo.php#<?php echo $categoria['nombre']; ?>" class="d-block cs-image-scale cs-heading-highlight text-center">
                  <div class="cs-image-inner rounded-circle mx-auto mb-4" style="max-width: 180px;">
                    <?php
                    // Generar la ruta completa de la imagen
                    $rutaImagen = '<?php echo BASE_URL; ?>Assets/img/categoria_img/' . $categoria['imagen'];
                    ?>
                    <img src="<?php echo $rutaImagen; ?>" alt="<?php echo $categoria['nombre']; ?> image" draggable="false">
                  </div>
                  <h3 class="h5 mb-3"><?php echo $categoria['nombre']; ?></h3>
                </a>
              </div>
            <?php endforeach; ?>

          </div>
        </div>
      </section>


      <!-- Trending products (carousel) -->
      <section class="py-5" style="background-color: #e5e8ed;">
        <div class="container my-lg-2 py-2 py-md-4">
          <div class="d-flex align-items-center justify-content-between pb-sm-1 mb-5">
            <h2 class="h1 mb-0">Trending now</h2>
            <div class="tns-custom-controls cs-controls-inverse" id="custom-controls-trending" tabindex="0">
              <button type="button" data-controls="prev" tabindex="-1">
                <i class="cxi-arrow-left"></i>
              </button>
              <button type="button" data-controls="next" tabindex="-1">
                <i class="cxi-arrow-right"></i>
              </button>
            </div>
          </div>
          <div class="cs-carousel pb-2">
            <div class="cs-carousel-inner" data-carousel-options='{
              "nav": false,
              "controlsContainer": "#custom-controls-trending",
              "responsive": {
                "0": {
                  "items": 1,
                  "gutter": 20
                },
                "480": {
                  "items": 2,
                  "gutter": 24
                },
                "700": {
                  "items": 3,
                  "gutter": 24
                },
                "1100": {
                  "items": 4,
                  "gutter": 30
                }
              }
            }'>

              <!-- Item -->
              <div>
                <div class="card card-product mx-auto">
                  <div class="card-product-img">
                    <a href="shop-single.php" class="card-img-top">
                      <img src="assets_tienda/img/ecommerce/shop/01.jpg" alt="Product image" draggable="false">
                    </a>
                    <div class="card-product-widgets-top">
                      <div class="star-rating ml-auto">
                        <i class="sr-star cxi-star-filled active"></i>
                        <i class="sr-star cxi-star-filled active"></i>
                        <i class="sr-star cxi-star-filled active"></i>
                        <i class="sr-star cxi-star-filled active"></i>
                        <i class="sr-star cxi-star-filled active"></i>
                      </div>
                    </div>
                    <div class="card-product-widgets-bottom">
                      <a href="#" class="btn-wishlist ml-auto" data-toggle="tooltip" data-placement="left" title="Añadir a favoritos"></a>
                    </div>
                  </div>
                  <div class="card-body bg-0 pb-2">
                    <h3 class="card-product-title text-truncate mb-2">
                      <a href="shop-single.php" class="nav-link">Shirt with insertion lace trims</a>
                    </h3>
                    <div class="d-flex align-items-center">
                      <span class="h5 d-inline-block mb-0">$49.95</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Item -->
              <div>
                <div class="card card-product mx-auto">
                  <div class="card-product-img">
                    <a href="shop-single.php" class="card-img-top">
                      <img src="assets_tienda/img/ecommerce/shop/07.jpg" alt="Product image" draggable="false">
                    </a>
                    <div class="card-product-widgets-top">
                      <div class="star-rating ml-auto">
                        <i class="sr-star cxi-star-filled active"></i>
                        <i class="sr-star cxi-star-filled active"></i>
                        <i class="sr-star cxi-star-filled active"></i>
                        <i class="sr-star cxi-star-filled active"></i>
                        <i class="sr-star cxi-star"></i>
                      </div>
                    </div>
                    <div class="card-product-widgets-bottom">
                      <a href="#" class="btn-wishlist ml-auto" data-toggle="tooltip" data-placement="left" title="Añadir a favoritos"></a>
                    </div>
                  </div>
                  <div class="card-body bg-0 pb-2">
                    <h3 class="card-product-title text-truncate mb-2">
                      <a href="shop-single.php" class="nav-link">Chrono watch with gold rim and blue strap</a>
                    </h3>
                    <div class="d-flex align-items-center">
                      <span class="h5 d-inline-block mb-0">$120.60</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Item -->
              <div>
                <div class="card card-product mx-auto">
                  <div class="card-product-img">
                    <a href="shop-single.php" class="card-img-top">
                      <img src="assets_tienda/img/ecommerce/shop/05.jpg" alt="Product image">
                    </a>
                    <div class="card-product-widgets-bottom">
                      <a href="#" class="btn-wishlist ml-auto" data-toggle="tooltip" data-placement="left" title="Añadir a favoritos"></a>
                    </div>
                  </div>
                  <div class="card-body bg-0 pb-2">
                    <h3 class="card-product-title text-truncate mb-2">
                      <a href="shop-single.php" class="nav-link">Check coat with color contrast</a>
                    </h3>
                    <div class="d-flex align-items-center">
                      <span class="h5 d-inline-block mb-0">$183.45</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Item -->
              <div>
                <div class="card card-product mx-auto">
                  <div class="card-product-img">
                    <a href="shop-single.php" class="card-img-top">
                      <img src="<?php echo BASE_URL; ?>assets_tienda/img/ecommerce/shop/12.jpg" alt="Product image">
                    </a>
                    <div class="card-product-widgets-bottom">
                      <a href="#" class="btn-wishlist ml-auto" data-toggle="tooltip" data-placement="left" title="Añadir a favoritos"></a>
                    </div>
                  </div>
                  <div class="card-body bg-0 pb-2">
                    <h3 class="card-product-title text-truncate mb-2">
                      <a href="shop-single.php" class="nav-link">Men fashion gray shoes</a>
                    </h3>
                    <div class="d-flex align-items-center">
                      <span class="h5 d-inline-block mb-0">$85.00</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Item -->
              <div>
                <div class="card card-product mx-auto">
                  <div class="card-product-img">
                    <a href="shop-single.php" class="card-img-top">
                      <img src="assets_tienda/img/ecommerce/shop/06.jpg" alt="Product image" draggable="false">
                    </a>
                    <div class="card-product-widgets-top">
                      <div class="star-rating ml-auto">
                        <i class="sr-star cxi-star-filled active"></i>
                        <i class="sr-star cxi-star-filled active"></i>
                        <i class="sr-star cxi-star-filled active"></i>
                        <i class="sr-star cxi-star"></i>
                        <i class="sr-star cxi-star"></i>
                      </div>
                    </div>
                    <div class="card-product-widgets-bottom">
                      <a href="#" class="btn-wishlist ml-auto" data-toggle="tooltip" data-placement="left" title="Añadir a favoritos"></a>
                    </div>
                  </div>
                  <div class="card-body bg-0 pb-2">
                    <h3 class="card-product-title text-truncate mb-2">
                      <a href="shop-single.php" class="nav-link">Red dangle earrings</a>
                    </h3>
                    <div class="d-flex align-items-center">
                      <span class="h5 d-inline-block mb-0">$29.95</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center pt-4 pt-md-5">
            <a href="catalogo.php" class="btn btn-outline-primary btn-lg">Explore top sellers</a>
          </div>
        </div>
      </section>


      <!-- Sale products (carousel) -->
      <section class="container my-2 my-md-3 py-5 py-lg-6">
        <div class="d-flex align-items-center justify-content-between pb-sm-1 mb-5">
          <h2 class="h1 mb-0">Sale up to 70%</h2>
          <div class="tns-custom-controls cs-controls-inverse" id="custom-controls-sale" tabindex="0">
            <button type="button" data-controls="prev" tabindex="-1">
              <i class="cxi-arrow-left"></i>
            </button>
            <button type="button" data-controls="next" tabindex="-1">
              <i class="cxi-arrow-right"></i>
            </button>
          </div>
        </div>
        <div class="cs-carousel pb-2">
          <div class="cs-carousel-inner" data-carousel-options='{
            "nav": false,
            "controlsContainer": "#custom-controls-sale",
            "responsive": {
              "0": {
                "items": 1,
                "gutter": 20
              },
              "480": {
                "items": 2,
                "gutter": 24
              },
              "700": {
                "items": 3,
                "gutter": 24
              },
              "1100": {
                "items": 4,
                "gutter": 30
              }
            }
          }'>

            <!-- Item -->
            <div>
              <div class="card card-product mx-auto">
                <div class="card-product-img">
                  <a href="shop-single.php" class="card-img-top">
                    <img src="assets_tienda/img/ecommerce/shop/11.jpg" alt="Product image" draggable="false">
                  </a>
                  <div class="card-product-widgets-top">
                    <span class="badge product-badge badge-danger">-50%</span>
                    <div class="star-rating ml-auto">
                      <i class="sr-star cxi-star-filled active"></i>
                      <i class="sr-star cxi-star-filled active"></i>
                      <i class="sr-star cxi-star-filled active"></i>
                      <i class="sr-star cxi-star-filled active"></i>
                      <i class="sr-star cxi-star-filled active"></i>
                    </div>
                  </div>
                  <div class="card-product-widgets-bottom">
                    <a href="#" class="btn-wishlist ml-auto" data-toggle="tooltip" data-placement="left" title="Añadir a favoritos"></a>
                  </div>
                </div>
                <div class="card-body pb-2">
                  <h3 class="card-product-title text-truncate mb-2">
                    <a href="shop-single.php" class="nav-link">Leather crossbody bag with chain lace</a>
                  </h3>
                  <div class="d-flex align-items-center">
                    <span class="h5 d-inline-block text-danger mb-0">$89.50</span>
                    <del class="d-inline-block ml-2 pl-1 text-muted">$179.00</del>
                  </div>
                </div>
              </div>
            </div>

            <!-- Item -->
            <div>
              <div class="card card-product mx-auto">
                <div class="card-product-img">
                  <a href="shop-single.php" class="card-img-top">
                    <img src="assets_tienda/img/ecommerce/shop/10.jpg" alt="Product image">
                  </a>
                  <div class="card-product-widgets-top">
                    <span class="badge product-badge badge-danger">-33%</span>
                  </div>
                  <div class="card-product-widgets-bottom">
                    <a href="#" class="btn-wishlist ml-auto" data-toggle="tooltip" data-placement="left" title="Añadir a favoritos"></a>
                  </div>
                </div>
                <div class="card-body pb-2">
                  <h3 class="card-product-title text-truncate mb-2">
                    <a href="shop-single.php" class="nav-link">Skinny push-up jeans</a>
                  </h3>
                  <div class="d-flex align-items-center">
                    <span class="h5 d-inline-block text-danger mb-0">$53.60</span>
                    <del class="d-inline-block ml-2 pl-1 text-muted">$80.00</del>
                  </div>
                </div>
              </div>
            </div>

            <!-- Item -->
            <div>
              <div class="card card-product mx-auto">
                <div class="card-product-img">
                  <a href="shop-single.php" class="card-img-top">
                    <img src="assets_tienda/img/ecommerce/shop/14.jpg" alt="Product image">
                  </a>
                  <div class="card-product-widgets-top">
                    <span class="badge product-badge badge-danger">-20%</span>
                    <div class="star-rating ml-auto">
                      <i class="sr-star cxi-star-filled active"></i>
                      <i class="sr-star cxi-star-filled active"></i>
                      <i class="sr-star cxi-star-filled active"></i>
                      <i class="sr-star cxi-star-filled active"></i>
                      <i class="sr-star cxi-star-filled active"></i>
                    </div>
                  </div>
                  <div class="card-product-widgets-bottom">
                    <a href="#" class="btn-wishlist ml-auto" data-toggle="tooltip" data-placement="left" title="Añadir a favoritos"></a>
                  </div>
                </div>
                <div class="card-body pb-2">
                  <h3 class="card-product-title text-truncate mb-2">
                    <a href="shop-single.php" class="nav-link">Wide heel suede ankle boots</a>
                  </h3>
                  <div class="d-flex align-items-center">
                    <span class="h5 d-inline-block text-danger mb-0">$119.16</span>
                    <del class="d-inline-block ml-2 pl-1 text-muted">$148.95</del>
                  </div>
                </div>
              </div>
            </div>

            <!-- Item -->
            <div>
              <div class="card card-product mx-auto">
                <div class="card-product-img">
                  <a href="shop-single.php" class="card-img-top">
                    <img src="assets_tienda/img/ecommerce/shop/09.jpg" alt="Product image" draggable="false">
                  </a>
                  <div class="card-product-widgets-top">
                    <span class="badge product-badge badge-danger">-50%</span>
                    <div class="star-rating ml-auto">
                      <i class="sr-star cxi-star-filled active"></i>
                      <i class="sr-star cxi-star-filled active"></i>
                      <i class="sr-star cxi-star-filled active"></i>
                      <i class="sr-star cxi-star-filled active"></i>
                      <i class="sr-star cxi-star"></i>
                    </div>
                  </div>
                  <div class="card-product-widgets-bottom">
                    <a href="#" class="btn-wishlist ml-auto" data-toggle="tooltip" data-placement="left" title="Añadir a favoritos"></a>
                  </div>
                </div>
                <div class="card-body pb-2">
                  <h3 class="card-product-title text-truncate mb-2">
                    <a href="shop-single.php" class="nav-link">Basic hooded sweatshirt in pink</a>
                  </h3>
                  <div class="d-flex align-items-center">
                    <span class="h5 d-inline-block text-danger mb-0">$15.50</span>
                    <del class="d-inline-block ml-2 pl-1 text-muted">$31.00</del>
                  </div>
                </div>
              </div>
            </div>

            <!-- Item -->
            <div>
              <div class="card card-product mx-auto">
                <div class="card-product-img">
                  <a href="shop-single.php" class="card-img-top">
                    <img src="assets_tienda/img/ecommerce/shop/13.jpg" alt="Product image" draggable="false">
                  </a>
                  <div class="card-product-widgets-top">
                    <span class="badge product-badge badge-danger">-60%</span>
                  </div>
                  <div class="card-product-widgets-bottom">
                    <a href="#" class="btn-wishlist ml-auto" data-toggle="tooltip" data-placement="left" title="Añadir a favoritos"></a>
                  </div>
                </div>
                <div class="card-body pb-2">
                  <h3 class="card-product-title text-truncate mb-2">
                    <a href="shop-single.php" class="nav-link">Metal bridge sunglasses</a>
                  </h3>
                  <div class="d-flex align-items-center">
                    <span class="h5 d-inline-block text-danger mb-0">$35.98</span>
                    <del class="d-inline-block ml-2 pl-1 text-muted">$89.95</del>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center pb-3 pt-4 pt-md-5">
          <a href="catalogo.php" class="btn btn-outline-primary btn-lg">Ver todos los productos</a>
        </div>
      </section>

      <!-- Services -->
      <section class="container pt-5 pb-2 pb-sm-5 py-md-5">
        <h2 class="h1 mb-5 pb-3 text-center">Ofrecemos</h2>
        <div class="row py-3">
          <div class="col-sm-6 col-md-3 text-center mb-md-0 mb-4 pb-md-0 pb-3">
            <img class="mb-4" src="<?php echo BASE_URL; ?>assets_tienda/img/ecommerce/home/services/delivery.svg" width="48" alt="Envío en todo el mundo" draggable="false">
            <h5 class="h5 mb-2">Envío rápido</h5>
            <p class="mb-0 text-muted">Obtén envío gratuito por compras mayores a S/.250</p>
          </div>
          <span class="divider-vertical d-sm-block d-none"></span>
          <div class="col-sm-6 col-md-3 text-center mb-md-0 mb-4 pb-md-0 pb-3">
            <img class="mb-4" src="<?php echo BASE_URL; ?>assets_tienda/img/ecommerce/home/services/support.svg" width="48" alt="Soporte al cliente" draggable="false">
            <h5 class="h5 mb-2">Soporte al cliente 24/7</h5>
            <p class="mb-0 text-muted">Amigable soporte al cliente las 24 horas, los 7 días de la semana</p>
          </div>
          <span class="divider-vertical d-sm-block d-none"></span>
          <div class="col-sm-6 col-md-3 text-center mb-md-0 mb-4 pb-md-0 pb-3">
            <img class="mb-4" src="<?php echo BASE_URL; ?>assets_tienda/img/ecommerce/home/services/guarantee.svg" width="48" alt="Garantía de devolución de dinero" draggable="false">
            <h5 class="h5 mb-2">Garantía de devolución</h5>
            <p class="mb-0 text-muted">Devolvemos el dinero en un plazo de 30 días</p>
          </div>
          <span class="divider-vertical d-sm-block d-none"></span>
          <div class="col-sm-6 col-md-3 text-center mb-md-0 mb-4 pb-md-0 pb-3">
            <img class="mb-4" src="<?php echo BASE_URL; ?>assets_tienda/img/ecommerce/home/services/payment.svg" width="48" alt="Pago seguro en línea" draggable="false">
            <h5 class="h5 mb-2">Pago seguro en línea</h5>
            <p class="mb-0 text-muted">Aceptamos todas las principales tarjetas de crédito</p>
          </div>
        </div>
      </section>


      <!-- Instagram -->
      <section class="pt-5 pb-4 pt-lg-6 pb-lg-5 border-top border-bottom">
        <div class="container pt-md-4 pb-2 pt-lg-0 pb-lg-0">
          <div class="row">
            <div class="col-md-4 text-center text-md-left pb-2 pb-md-0 mb-4 mb-md-0">
              <p class="text-dark text-uppercase mb-2">Siguenos en Instagram</p>
              <h1 class="h1 pb-2 pb-md-3" style="font-size: 35px;"><?php echo $instagram_usuario; ?></h1>
              <a href="<?php echo $instagram; ?>" target="_blank" class="btn btn-outline-primary btn-lg">
                <i class="cxi-instagram font-size-lg mr-1"></i>
                Seguir
              </a>
            </div>
            <div class="col-md-8">
              <div class="cs-carousel cs-nav-outside">
                <div class="cs-carousel-inner" data-carousel-options='{
                  "controls": false,
                  "gutter": 15,
                  "responsive": {
                    "0": { "items": 2 },
                    "500": { "items": 3 },
                    "1200": { "items": 3 }
                  }
                }'>
                  <!-- Image -->
                  <div>
                    <img src="<?php echo BASE_URL; ?>assets_tienda/img/ecommerce/home/hero-slider/banner1.jpg" alt="Image" draggable="false" style="width: 202px; height: 269.33px;">
                  </div>
                  <!-- Image -->
                  <div>
                    <img src="<?php echo BASE_URL; ?>assets_tienda/img/ecommerce/home/hero-slider/banner2.jpg" alt="Image" draggable="false" style="width: 202px; height: 269.33px;">
                  </div>
                  <!-- Image -->
                  <div>
                    <img src="<?php echo BASE_URL; ?>assets_tienda/img/ecommerce/home/hero-slider/banner4.jpg" alt="Image" draggable="false" style="width: 202px; height: 269.33px;">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Brands -->
      <section class="container pb-5 pt-lg-2 mb-3 pb-lg-6">
        <br>
        <h2 class="h1 mb-5 pb-3 text-center">Nuestras Marcas</h2>
        <div class="cs-carousel">
          <div class="cs-carousel-inner" data-carousel-options='{
      "nav": false,
      "controls": false,
      "autoplay": true,
      "autoplayTimeout": 4000,
      "responsive": {
        "0": {
          "items": 2
        },
        "576": {
          "items": 3
        },
        "768": {
          "items": 4
        },
        "992": {
          "items": 5
        },
        "1200": {
          "items": 6
        }
      }
    }'>
            <?php foreach ($rutasImagenes as $rutaImagen) : ?>
              <div class="px-3 text-center">
                <a class="cs-swap-image">
                  <img src="<?php echo $rutaImagen; ?>" class="cs-swap-to" width="120" alt="Brand logo hover" draggable="false">
                  <img src="<?php echo $rutaImagen; ?>" class="cs-swap-from" width="120" alt="Brand logo" draggable="false">
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      </main>


      <!-- Footer -->
      <?php include TEMPLATE_PATH . 'footer_tienda.php';?>