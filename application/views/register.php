<main>
    <div class="featured-products-header">  
        Registrar
    </div>

    <form method="post" action="<?= base_url('index.php/controllore/process_registration') ?>" class="login-form">
        <label for="username">Username:</label> 
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>
        <label for="appellidos">Appellidos:</label>
        <input type="text" name="appellidos" id="appellidos" required><br>
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" required><br>
        <label for="email">Correo:</label>
        <input type="email" name="email" id="email" required><br>
        <div class="form-buttons">
            <button type="submit" class="btn-login">Registrar</button>
        </div>
    </form>
</main>
