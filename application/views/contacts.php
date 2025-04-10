<main><div class="contacts-container">
    <h1>Contactos</h1>
    <p>¿Tienes preguntas o necesitas ayuda? Contáctanos mediante cualquiera de los siguientes métodos:</p>
    <ul>
        <li>Email: <a href="mailto:info@fratellomusic.com">info@fratellomusic.com</a></li>
        <li>Teléfono: +34 123 456 789</li>
        <li>Dirección: Calle Louis Pasteur, 35, Málaga, España</li>
    </ul>
    <form action="<?= base_url('') ?>" method="post">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="message">Mensaje:</label>
        <textarea id="message" name="message" rows="4" required></textarea>
        <button type="submit">Enviar</button>
    </form>
</div>
</main>

<style>
.about-container, .contacts-container {
    padding: 20px;
    font-family: Arial, sans-serif;
}

.about-container img, .contacts-container img {
    max-width: 100%;
    height: auto;
    margin-top: 10px;
}

.contacts-container h1 {
        margin-bottom: 10px;
        border-bottom: 2px solid #ff6347;
    }

.contacts-container form {
    margin-top: 20px;
}

.contacts-container form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.contacts-container form input, .contacts-container form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.contacts-container form button {
    background-color: #ff6347;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.contacts-container form button:hover {
    background-color: #ff4500;
}
</style>