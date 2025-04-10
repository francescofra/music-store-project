<footer>
    <p>&copy; 2024 Fratello Music. Todos los derechos reservados.</p>
    <ul>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">X</a></li>
    </ul>
</footer>
<script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>
</html>

<script>
    function aggiungiAlCarrello(idProducto) {
        $.ajax({
            url: "<?= base_url('controllore/aggiungiAlCarrello/') ?>" + idProducto,
            type: "GET",
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    // Aggiorna il numero di articoli nel carrello
                    $("#cart-count").text(response.total_items);
                    alert("Producto añadido al carrito!");
                } else {
                    alert(response.message || "Error al añadir al carrito.");
                }
            },
            error: function() {
                alert("Error de comunicación con el servidor.");
            }
        });
    }
</script>
