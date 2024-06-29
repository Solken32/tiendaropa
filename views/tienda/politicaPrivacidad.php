<?php 
include '../template/navbar_tienda.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/politicaPrivacidad.css">
</head>
<body>
    <br>
    <div class="container privacy-policy">
        <div class="card">
            <div class="card-header">
                Política de Privacidad
            </div>
            <div class="card-body">
                <p>En <?php echo $nombre_tienda; ?>, nos tomamos muy en serio la privacidad de nuestros clientes. Esta política de privacidad describe cómo recopilamos, utilizamos y protegemos la información personal que usted nos proporciona al visitar nuestro sitio web y realizar compras.</p>
                <p><strong>Recopilación de Información:</strong></p>
                <p>Recopilamos información personal como nombre, dirección, correo electrónico y número de teléfono cuando usted realiza una compra en nuestro sitio web o se registra para recibir correos electrónicos promocionales.</p>
                <p><strong>Uso de la Información:</strong></p>
                <p>Utilizamos la información personal recopilada para procesar sus pedidos, mejorar nuestro servicio al cliente, enviarle actualizaciones sobre su pedido y proporcionarle información sobre ofertas especiales y promociones.</p>
                <p><strong>Protección de la Información:</strong></p>
                <p>Implementamos medidas de seguridad para proteger su información personal contra acceso no autorizado y uso indebido. Solo permitimos el acceso a su información a empleados que necesitan conocerla para proporcionarle productos o servicios.</p>
                <p><strong>Divulgación de la Información:</strong></p>
                <p>No vendemos, comerciamos ni transferimos de ninguna manera su información personal a terceros sin su consentimiento, excepto cuando sea necesario para procesar su pedido o cumplir con la ley.</p>
                <p><strong>Cambios a esta Política:</strong></p>
                <p>Nos reservamos el derecho de actualizar esta política de privacidad en cualquier momento. Le recomendamos revisar esta página regularmente para estar informado sobre cómo estamos protegiendo su información personal.</p>
                
            </div>
        </div>
    </div> <br>
</body>
</html>


<?php 
include '../template/footer_tienda.php';
?>