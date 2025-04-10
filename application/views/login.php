<main>
    <div class="featured-products-header">  
        Iniciar sesión
    </div>
    <form action="<?= base_url('index.php/controllore/process_login') ?>" method="POST" class="login-form">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-buttons">
            <button type="submit" class="btn-login">Iniciar sesión</button>
            <a href="<?= base_url('index.php/controllore/register') ?>" class="btn-register">Registrar</a>
        </div>
    </form><br><br><br><br><br><br><br><br><br><br>
</main>
