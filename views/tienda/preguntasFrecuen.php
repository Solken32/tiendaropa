<?php 
include '../template/navbar_tienda.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/preguntasFrecuen.css">


</head>


<body>

<div class="container my-5 faq-container">
        <h1 class="text-center mb-4">Preguntas Frecuentes</h1>

        <div class="accordion" id="faqAccordion">
            <div class="card">
                <div class="card-header faq-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            ¿Cómo puedo realizar un pedido?
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body faq-body">
                        Para realizar un pedido, navega por nuestro catálogo, selecciona los productos que deseas y añádelos a tu carrito de compras. Luego, sigue los pasos en la página de pago para completar tu pedido.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header faq-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            ¿Cuáles son las opciones de pago disponibles?
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body faq-body">
                        Aceptamos varias formas de pago, incluyendo tarjetas de crédito y débito, PayPal, transferencias bancarias y pago en efectivo. Todos los pagos son seguros y cifrados.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header faq-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            ¿Cuánto tiempo tarda el envío?
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body faq-body">
                        El tiempo de envío varía según tu ubicación y el tipo de envío seleccionado. Normalmente, los pedidos se procesan en 1-2 días hábiles y la entrega estándar tarda entre 3-7 días hábiles.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header faq-header" id="headingFour">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            ¿Puedo rastrear mi pedido?
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                    <div class="card-body faq-body">
                        Sí, una vez que tu pedido haya sido enviado, recibirás un correo electrónico con el número de seguimiento y un enlace para rastrear tu paquete en tiempo real.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header faq-header" id="headingFive">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            ¿Cuál es su política de devoluciones?
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faqAccordion">
                    <div class="card-body faq-body">
                        Ofrecemos una política de devoluciones de 30 días. Si no estás satisfecho con tu compra, puedes devolver los artículos no usados y en su embalaje original dentro de los 30 días posteriores a la recepción para un reembolso completo.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header faq-header" id="headingSix">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            ¿Qué debo hacer si recibo un artículo defectuoso?
                        </button>
                    </h2>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#faqAccordion">
                    <div class="card-body faq-body">
                        Si recibes un artículo defectuoso, por favor contacta a nuestro servicio al cliente con una descripción del problema y fotos del defecto. Te ayudaremos a resolver el problema lo antes posible.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header faq-header" id="headingEight">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            ¿Cómo puedo contactar al servicio al cliente?
                        </button>
                    </h2>
                </div>
                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#faqAccordion">
                    <div class="card-body faq-body">
                        Puedes contactar a nuestro servicio al cliente enviando un correo electrónico a <?php echo $email; ?>  o llamando al <?php echo $numero; ?>. Estamos disponibles de lunes a viernes de 9:00 a 18:00.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header faq-header" id="headingNine">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            ¿Cómo puedo cambiar o cancelar mi pedido?
                        </button>
                    </h2>
                </div>
                <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#faqAccordion">
                    <div class="card-body faq-body">
                        Si necesitas cambiar o cancelar tu pedido, por favor contacta a nuestro servicio al cliente lo antes posible. Intentaremos acomodar tu solicitud, pero no podemos garantizar cambios si el pedido ya ha sido procesado.
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>



<?php 
include '../template/footer_tienda.php';
?>