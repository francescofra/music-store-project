<main>
<link rel="stylesheet" href="assets/css/profile.css">

    <div class="profile-container">
        <h1>Cuenta de <?= $user['username'] ?></h1>
        <div class="profile-details">
            <h2>Información personal:</h2>
            <p><strong>Nombre:</strong> <?= $user['nombre'] ?></p>
            <p><strong>Appellidos:</strong> <?= $user['appellidos'] ?></p>
            <p><strong>Dirección:</strong> <?= $user['direccion'] ?></p>
            <p><strong>Correo:</strong> <?= $user['email'] ?></p>
        </div>

        <div class="payment-history">
            <h2>Historial de pagos:</h2>
            <?php if (!empty($pagamenti)) : ?>
                <ul>
                    <?php foreach ($pagamenti as $pagamento) : ?>
                        <li>
                            <strong>Fecha:</strong> <?= $pagamento['data_pagamento'] ?><br>
                            <strong>Importe:</strong> <?= isset($pagamento['importo']) ? $pagamento['importo'] . ' €' : 'Non disponibile' ?><br>
                            <strong>Código:</strong> <?= $pagamento['codigo'] ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p>No hay pagos registrados.</p>
            <?php endif; ?>
        </div>
    </div>
</main>
