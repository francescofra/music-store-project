<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fratello Music</title>
    <div id="cart-popup"></div>
    <header>
    <div class="header-container">
        <div class="logo">
            <h1><FONT face="Brush Script MT">Fratello Music</FONT></h1>
        </div>

        <script>
            const base_url = "<?= base_url(); ?>";
        </script>


        <nav class="main-nav">
            <ul class="nav-list">
                <li><a href="<?= base_url('') ?>">Home</a></li>

                <li><a href="<?= site_url('controllore/about') ?>">Quiénes Somos</a></li>
                <li><a href="<?= site_url('controllore/contacts') ?>">Contactos</a></li>
                

            </ul>
        </nav>

        <div class="utilities">
            <div class="search-bar">
                <input type="text" placeholder="Busca...">
                <button type="submit">
                    <img src="<?= base_url('assets/img/lente.png') ?>" alt="Busca" class="search-icon">

                </button>
            </div>
            
            <div class="user-access">
                <?php if ($this->session->userdata('is_logged_in')) : ?>
                    <a href="<?= base_url('index.php/controllore/profilo') ?>">
                        <img src="<?= base_url('assets/img/profilo.png') ?>" alt="Profilo" class="profile-icon">
                    </a>
                    <span>Hola, <strong><?= $this->session->userdata('username') ?></strong>!</span>
                    <a href="<?= base_url('index.php/controllore/logout') ?>" class="logout-link">Salir</a>
                <?php else : ?>
                    <img src="<?= base_url('assets/img/profilo.png') ?>" alt="Profilo" class="profile-icon">
                    <a href="<?= base_url('index.php/controllore/login') ?>" class="login-link">Iniciar sesión</a>
                <?php endif; ?>
            </div>


            <div class="cart-icon-container">
                <a href="<?= base_url('index.php/controllore/carrello'); ?>">
                    <img src="<?= base_url('assets/img/carrello.png') ?>" alt="Carrello" class="cart-icon">
                    <span class="cart-count" id="cart-count"><?= $this->session->userdata('cart_items') ?: 0; ?></span>
                </a>
            </div>

        </div>
    </div>
</header>

    <link rel="stylesheet" href="<?= base_url('assets/css/style2.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/profile.css') ?>">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
</head>
<body>
