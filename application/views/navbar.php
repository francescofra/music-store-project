<nav class="category-nav">
    <ul class="nav-list">
        <?php foreach ($categorias as $categoria) : ?>
            <li><a href="<?= site_url('controllore/categoria/' . $categoria['id_categoria']) ?>"><?= $categoria['nombre'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>
