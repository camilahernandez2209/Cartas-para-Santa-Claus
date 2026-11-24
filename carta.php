
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi carta a Santa</title>
    <link rel="stylesheet" href="estilos/estilos_paginas.css">
</head>

<body>

<div class="contenedor">

    <h1>💌 Mi carta a Santa</h1>

    <p class="subtitulo">
        ¡Cuéntale a Santa todos tus deseos!
    </p>

    <form action="galeria.php" method="POST">

        <label>¿Cómo te llamas?</label>

        <input
            type="text"
            name="nombre"
            placeholder="Escribe tu nombre"
            maxlength="100"
            required
        >

        <label>Correo electrónico de tu papá o mamá:</label>

        <input
            type="email"
            name="correo"
            placeholder="ejemplo@correo.com"
            maxlength="255"
            required
        >

        <label>¿Cuántos años tienes?</label>

        <input
            type="number"
            name="edad"
            placeholder="Escribe tu edad"
            min="1"
            max="18"
            required
        >

        <label>¿En qué ciudad vives?</label>

        <input
            type="text"
            name="ciudad"
            placeholder="Escribe tu ciudad"
            maxlength="100"
            required
        >

        <label>¿Cómo te portaste este año?</label>

        <select name="comportamiento" required>
            <option value="">Selecciona una opción</option>
            <option value="Bien">Bien</option>
            <option value="Mal">Mal</option>
            <option value="Más o menos">Más o menos</option>
        </select>

        <label>Escribe tu carta:</label>

        <textarea
            name="carta"
            placeholder="Querido Santa Claus..."
            rows="9"
            required
        ></textarea>

        <button type="submit">
            Continuar a la galería 🎁
        </button>

    </form>

    <a href="index.php" class="regresar">
        ← Regresar al inicio
    </a>

</div>

</body>
</html>
