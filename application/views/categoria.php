<div class="her-section">
    <div class="content"><main>
    <h1> <?= $categoria_nombre ?> </h1>
    <section class="products">
        <?php if (!empty($productos)) : ?>
            <?php foreach ($productos as $producto) : ?>
                <div class="product">
                    
                    <a href="<?= base_url('index.php/controllore/producto/' . $producto['id_producto']) ?>">
                        <h3><?= $producto['nombre'] ?></h3>
                    </a>
                    <a href="<?= base_url('index.php/controllore/producto/' . $producto['id_producto']) ?>">
                        <img src="<?= base_url('assets/img/' . $producto['imagen']) ?>" alt="<?= $producto['nombre'] ?>">
                    </a>
                    <p>€<?= $producto['precio']?></p> 
                    <button 
                        class="add-to-cart" 
                        data-id="<?= $producto['id_producto'] ?>">
                        Añadir al Carrito
                    </button>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Ningún producto disponible. <?= $nombre_categoria ?>.</p>
        <?php endif; ?>
    </section>
       
</main>
        </div> 
</div>

<style>
    .her-section h1 {
        text-align: center;
        margin-bottom: 10px;
        border-bottom: 2px solid #ff6347;
    }
</style>