<div class="her-section">
    <div class="content"><main>
    <div class="product-detail">
        <div class="product-image">
            <img src="<?= base_url('assets/img/' . $producto['imagen']) ?>" alt="<?= $producto['nombre'] ?>">
        <br><br><br><br><br>
            </div>
        <div class="product-info">
            <h1><?= $producto['nombre'] ?></h1>
            <p><?= $producto['description'] ?></p>
            <h3>Precio: €<?= $producto['precio'] ?></h3>
            <button 
                class="add-to-cart" 
                data-id="<?= $producto['id_producto'] ?>">
                Añadir al Carrito
            </button>

        </div>
    </div>
</main>
</div></div>
<style>
    .product-detail {
        display: flex;
        margin: 20px;
    }
    .product-image img {
        width: 400px;
        height: 400px;
        margin-right: 20px;
        object-fit: contain;

    }
    .product-info {
        max-width: 600px;
    }
    .product-info h1 {
        margin-bottom: 10px;
        border-bottom: 2px solid #ff6347;
    }
</style>
