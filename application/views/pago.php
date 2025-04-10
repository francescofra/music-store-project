
<div class="featured-products-header">  
        Pago
    </div>
<form id="payment-form" method="POST" action="<?= base_url('index.php/controllore/confermaPagamento') ?>" class="login-form">
    <label for="nome">Nombre:</label>
    <input type="text" id="nome" name="nome" required><br>

    <label for="cognome">Appellidos:</label>
    <input type="text" id="cognome" name="cognome" required><br>

    <label for="indirizzo">Dirección:</label>
    <input type="text" id="indirizzo" name="indirizzo" required><br>

    <label for="numero_carta">Número de tarjeta:</label>
    <input type="text" id="numero_carta" name="numero_carta" required maxlength="16"><br>

    <label for="scadenza">Fecha límite (MM/YY):</label>
    <input type="text" id="scadenza" name="scadenza" required><br>

    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" required maxlength="3"><br>

    <div class="form-buttons">
    <button type="submit" class="btn-login" >Confirmación de pago</button>
    </div>
</form>


