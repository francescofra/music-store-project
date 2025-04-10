$(document).ready(function () {
    $.ajax({
        url: base_url + 'index.php/controllore/getCartCount',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.count !== undefined) {
                $('#cart-count').text(response.count);
            }
        },
        error: function () {
            console.error("Errore nel recupero del conteggio articoli.");
        }
    });

    $('.add-to-cart').off('click').on('click', function () {
        const productId = $(this).data('id_producto');
        const productName = $(this).data('nombre');
        const productPrice = $(this).data('price');

        $.ajax({
            url: base_url + 'index.php/controllore/aggiungiAlCarrello/' + productId,
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    let currentCount = parseInt($('#cart-count').text());
                    $('#cart-count').text(currentCount + 1);
                    alert(productName + " añadido al carrito!");
                } else {
                    alert(response.message || "Errore durante l'aggiunta al carrello.");
                }
            },
            error: function () {
                alert("Errore di comunicazione con il server!!!.");
            }
        });
    });
});

$(document).ready(function () {
    // Gestione click su "Rimuovi dal Carrello"
    $('.remove-from-cart').off('click').on('click', function () {
        const productId = $(this).data('id');

        $.ajax({
            url: base_url + 'index.php/controllore/rimuoviDalCarrello/' + productId,
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    let currentCount = parseInt($('#cart-count').text());
                    $('#cart-count').text(Math.max(0, currentCount - 1)); // Evita contatore negativo
                    alert("Articolo rimosso dal carrello!");
                    // Rimuove l'elemento dalla vista, se necessario
                    $(`#cart-item-${productId}`).remove();
                } else {
                    alert(response.message || "Errore durante la rimozione dell'articolo.");
                }
            },
            error: function () {
                alert("Errore di comunicazione con il server.");
            }
        });
    });
});


function sincronizzaCarrello() {
    $.ajax({
        url: base_url + 'index.php/controllore/sincronizzaCarrello',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                cartItems = response.carrello.map(item => ({
                    name: item.nombre,
                    price: parseFloat(item.precio),
                    quantity: item.quantity
                }));
                cartCount = cartItems.reduce((sum, item) => sum + item.quantity, 0);
                $('#cart-count').text(cartCount);
                updateCartPopup();
            } else {
                alert(response.message || "Errore durante la sincronizzazione del carrello.");
            }
        },
        error: function () {
            alert("Errore di comunicazione con il server.");
        }
    });
}
