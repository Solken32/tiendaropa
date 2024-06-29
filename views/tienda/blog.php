<?php 
include '../template/navbar_tienda.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/blog.css">


</head>


<body>
    <div class="blog-content">
        <!-- Publicación 1 -->
        <div class="blog-post row">
            <div class="col-md-6">
                <h2>Los Mejores Polos de Temporada</h2>
                <p>En este artículo te mostramos los polos más modernos y cómodos de la temporada. Descubre cómo combinarlos con otros elementos de tu guardarropa.</p>
                <div class="social-icons">
                    <!-- Botones de compartir -->
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-linkedin-in"></a>
                </div>
            </div>

            <div class="col-md-6">
                <img src="<?php echo BASE_URL;?>Assets/img/productos_img/Polo/Polo_1.png" >
            </div>
        </div>

        <!-- Publicación 2 -->
        <div class="blog-post row">
            <div class="col-md-6">
                <h2>Últimas Tendencias en Jeans</h2>
                <p>Explora las últimas tendencias en jeans. Desde skinny jeans hasta boyfriend jeans, encuentra el estilo que mejor se adapte a tu personalidad.</p>
                <div class="social-icons">
                    <!-- Botones de compartir -->
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-linkedin-in"></a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="<?php echo BASE_URL;?>Assets/img/productos_img/Polo/Polo_1.png" >
            </div>
        </div>

        <!-- Publicación 3 -->
        <div class="blog-post row">
            <div class="col-md-6">
                <h2>Poleras Urbanas: Estilo y Comodidad</h2>
                <p>Las poleras urbanas son una declaración de estilo. Descubre cómo las celebridades y los influencers están incorporando estas prendas en sus looks diarios.</p>
                <div class="social-icons">
                    <!-- Botones de compartir -->
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-linkedin-in"></a>
                </div>
            </div>
            <div class="col-md-6">
            <img src="<?php echo BASE_URL;?>Assets/img/productos_img/Polera_Nets/Polera_Nets_1.png" >
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

</body>
</html>



<?php 
include '../template/footer_tienda.php';
?>