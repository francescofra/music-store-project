<div class="cart-page">
    <h1>Tu Carrito</h1>
    <?php if (!empty($carrello)): ?>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($carrello as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['nombre']); ?></td>
                        <td>€<?= number_format($item['precio'], 2); ?></td>
                        <td>
                            <input type="number" class="quantity" data-id="<?= $item['id_carrito']; ?>" value="<?= $item['quantity']; ?>" min="1">
                        </td>
                        <td>€<?= number_format($item['precio'] * $item['quantity'], 2); ?></td>
                        <td>
                            <a href="<?= base_url('index.php/controllore/rimuoviDalCarrello/' . $item['id_carrito']); ?>" class="remove-link">Borrar</a>
                        </td>
                    </tr>
                    <?php $total += $item['precio'] * $item['quantity']; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h3 class="total-price">Total: €<?= number_format($total, 2); ?></h3>
        <a href="<?= base_url('index.php/controllore/paginaPagamento') ?>">
            <button>Proceder al Pago</button>
        </a>

    <?php else: ?>
        <p><br><br><br><br><br>El carrito está vacío. <a href="<?= base_url(''); ?>">Volver a productos</a><br><br><br><br><br><br><br><br><br><br></p>
    <?php endif; ?>
</div>
