<!-- app/Views/cart/checkout.php -->
<?php include(APPPATH . 'Views/layout/header.php'); ?>

<h1 class="my-4">Checkout</h1>

<div class="row">
    <div class="col-md-6">
        <form action="/cart/process_payment" method="post">
            <!-- Información de envío -->
            <h2>Información de Envío:</h2>
            <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Ingresa tu nombre">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required placeholder="Ingresa tu apellido">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required placeholder="Ingresa tu dirección">
            <label for="pais">País:</label>
            <select class="form-control" id="pais" name="pais" required>
                <option value="">Seleccione un país</option>
                <option value="Mexico">México</option>
            </select>
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="">Seleccione un estado</option>
                <option value="Veracruz">Veracruz de Ignacio de la Llave</option>
            </select>
            <label for="CP">Código Postal:</label>
            <input type="text" class="form-control" id="CP" name="CP" required placeholder="Ingresa tu código postal">
        </div>
            <!-- Información de pago -->
            <h2>Información de Pago:</h2>
        <div class="form-group">
            <label for="metodo_pago">Método de Pago:</label>
            <select class="form-control" id="metodo_pago" name="metodo_pago" required>
                <option value="">Selecciona un método de pago</option>
                <option value="debito">Tarjeta de Débito</option>
                <option value="credito">Tarjeta de Crédito</option>
                <option value="paypal">PayPal</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nombre_titular">Nombre del Titular:</label>
            <input type="text" class="form-control" id="nombre_titular" name="nombre_titular" required placeholder="Ingresa el nombre del titular de la tarjeta">
        </div>
        <div class="form-group">
            <label for="numero_tarjeta">Número de Tarjeta:</label>
            <input type="text" class="form-control" id="numero_tarjeta" name="numero_tarjeta" maxlength="19" required placeholder="Ingresa el número de tu tarjeta de crédito o débito (16 dígitos)">
        </div>
        <div class="form-group">
            <label for="vencimiento">Fecha de Vencimiento (MM/YY):</label>
            <input type="text" class="form-control" id="vencimiento" name="vencimiento" maxlength="5" required placeholder="Ingresa la fecha de vencimiento de la tarjeta">
        </div>
        <div class="form-group">
            <label for="cvv">CVV:</label>
            <input type="text" class="form-control" id="cvv" name="cvv" maxlength="3" required placeholder="Ingresa el código de seguridad de la tarjeta (3 dígitos)">
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var inputNumeroTarjeta = document.getElementById('numero_tarjeta');

                inputNumeroTarjeta.addEventListener('input', function () {
                    // Eliminar todos los caracteres que no sean dígitos
                    var inputValue = inputNumeroTarjeta.value.replace(/\D/g, '');

                    // Formatear número de tarjeta con guiones después de cada 4 dígitos
                    var formattedValue = inputValue.replace(/(\d{4})(?=\d{4})/g, '$1-');
                    inputNumeroTarjeta.value = formattedValue;
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var inputFecha = document.getElementById('vencimiento');

                inputFecha.addEventListener('input', function () {
                    var inputValue = inputFecha.value.replace(/\D/g, ''); // Eliminar todos los caracteres que no sean dígitos
                    var formattedValue = formatarFecha(inputValue);
                    inputFecha.value = formattedValue;
                });

                function formatarFecha(fecha) {
                    // Formatear fecha como MM/YY (mes/año)
                    var formattedFecha = '';
                    for (var i = 0; i < fecha.length; i++) {
                        if (i === 2) {
                            formattedFecha += '/' + fecha[i]; // Agregar '/' después de los primeros dos dígitos (mes)
                        } else if (i === 4) {
                            formattedFecha += '/' + fecha[i]; // Agregar '/' después de los siguientes dos dígitos (año)
                        } else {
                            formattedFecha += fecha[i];
                        }
                    }
                    return formattedFecha;
                }
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var inputCVV = document.getElementById('cvv');

                inputCVV.addEventListener('input', function () {
                    // Eliminar todos los caracteres que no sean dígitos
                    var inputValue = inputCVV.value.replace(/\D/g, '');
                    inputCVV.value = inputValue;
                });
            });
        </script>
                    <!-- Botón para realizar el pago -->
                    <button type="submit" class="btn btn-success">Realizar Pago</button>
                </form>
            </div>
            <div class="col-md-6">
                <!-- Información del carrito -->
                <h2>Mi carrito:</h2>
                <ul class="list-group mb-4">
                    <?php 
                        $total = 0;
                        foreach ($cart as $item): 
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                    ?>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?= esc($item['image']) ?>" class="img-thumbnail" alt="<?= esc($item['name']) ?>">
                        </div>
                        <div class="col-md-9">
                            <span><?= esc($item['name']) ?></span><br>
                            <span><?= esc($item['description']) ?></span><br>
                            <span>$<?= esc($item['price']) ?> x <?= esc($item['quantity']) ?> = $<?= number_format($subtotal, 2) ?></span>
                        </div>
                    </div>
                </li>

                    <?php endforeach; ?>
                </ul>
                <h3>Total: $<?= number_format($total, 2) ?></h3>
            </div>
        </div>

<?php include(APPPATH . 'Views/layout/footer.php'); ?>
