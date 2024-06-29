<?php 
include '../template/navbar_tienda.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/entregaDevolu.css">


</head>


<body>

    <div class="container my-5 policy-container">
        <div class="policy-header">
            <h1>Entrega y Devoluciones</h1>
            <p>Conoce nuestra política de entrega y devoluciones para asegurarte una experiencia de compra sin complicaciones.</p>
        </div>

        <ul class="nav nav-tabs mt-4" id="policyTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="entrega-tab" data-toggle="tab" href="#entrega" role="tab" aria-controls="entrega" aria-selected="true">Política de Entrega</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="devoluciones-tab" data-toggle="tab" href="#devoluciones" role="tab" aria-controls="devoluciones" aria-selected="false">Política de Devoluciones</a>
            </li>
        </ul>

        <div class="tab-content mt-4" id="policyTabContent">
            <div class="tab-pane fade show active" id="entrega" role="tabpanel" aria-labelledby="entrega-tab">
                <h3>Política de Entrega</h3>
                <p><strong>Tiempo de Procesamiento:</strong> Los pedidos se procesan en un plazo de 1-2 días hábiles después de recibir el pago.</p>
                <p><strong>Opciones de Envío:</strong> Ofrecemos varias opciones de envío, incluyendo entrega estándar, exprés y al día siguiente. Los costos y tiempos de entrega varían según la opción seleccionada y tu ubicación.</p>
                <p><strong>Seguimiento de Pedidos:</strong> Una vez enviado tu pedido, recibirás un correo electrónico con un número de seguimiento para que puedas rastrear tu paquete en tiempo real.</p>
                <p><strong>Envíos Internacionales:</strong> Realizamos envíos a varios países alrededor del mundo. Los tiempos y costos de envío internacionales pueden variar dependiendo del destino.</p>
            </div>
            <div class="tab-pane fade" id="devoluciones" role="tabpanel" aria-labelledby="devoluciones-tab">
                <h3>Política de Devoluciones</h3>
                <p><strong>Periodo de Devoluciones:</strong> Aceptamos devoluciones de productos no usados y en su embalaje original dentro de los 30 días posteriores a la recepción del pedido.</p>
                <p><strong>Proceso de Devolución:</strong> Para iniciar una devolución, contacta a nuestro servicio al cliente con tu número de pedido y el motivo de la devolución. Te proporcionaremos las instrucciones necesarias para completar el proceso.</p>
                <p><strong>Reembolsos:</strong> Una vez recibida y verificada la devolución, procesaremos el reembolso a través del método de pago original. El tiempo de procesamiento del reembolso puede variar dependiendo de tu banco o proveedor de pagos.</p>
                <p><strong>Artículos Defectuosos:</strong> Si recibes un artículo defectuoso, por favor contáctanos con una descripción del problema y fotos del defecto. Te ayudaremos a resolver el problema lo antes posible.</p>
            </div>
        </div>
    </div>

    

    
</body>
</html>



<?php 
include '../template/footer_tienda.php';
?>