
<?php

session_start();
require "juguetes.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = trim($_POST["nombre"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $edad = filter_var(
        $_POST["edad"] ?? null,
        FILTER_VALIDATE_INT
    );
    $ciudad = trim($_POST["ciudad"] ?? "");
    $comportamiento = $_POST["comportamiento"] ?? "";
    $carta = trim($_POST["carta"] ?? "");

    $opcionesValidas = ["Bien", "Mal", "Más o menos"];

    if (
        $nombre !== "" &&
        filter_var($correo, FILTER_VALIDATE_EMAIL) &&
        $edad !== false &&
        $edad >= 1 &&
        $edad <= 18 &&
        $ciudad !== "" &&
        in_array($comportamiento, $opcionesValidas, true) &&
        $carta !== ""
    ) {

        $_SESSION["nombre"] = $nombre;
        $_SESSION["correo"] = $correo;
        $_SESSION["edad"] = $edad;
        $_SESSION["ciudad"] = $ciudad;
        $_SESSION["comportamiento"] = $comportamiento;
        $_SESSION["carta"] = $carta;

    } else {

        die("Hay datos incorrectos o incompletos. Regresa al formulario e inténtalo nuevamente.");

    }
}

$nombreUsuario = $_SESSION["nombre"] ?? "Invitado";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de juguetes</title>
    <link rel="stylesheet" href="estilos/estilos_paginas.css">
</head>

<body>

<div class="contenedor galeria-contenedor">

    <h1>🎁 Galería de juguetes</h1>

    <p class="subtitulo">
        ¡Hola <?php echo htmlspecialchars($nombreUsuario); ?>!
        Elige el regalo que más te guste.
    </p>

    <form action="guardar.php" method="POST">

        <div class="juguetes">

            <?php foreach ($juguetes as $nombre => $imagen): ?>

                <label class="juguete">

                    <img
                        src="<?php echo htmlspecialchars($imagen); ?>"
                        alt="<?php echo htmlspecialchars($nombre); ?>"
                    >

                    <h3>
                        <?php echo htmlspecialchars($nombre); ?>
                    </h3>

                    <input
                        type="radio"
                        name="regalo"
                        value="<?php echo htmlspecialchars($nombre); ?>"
                        required
                    >

                    <span>Elegir este regalo</span>

                </label>

            <?php endforeach; ?>

        </div>

        <button type="submit">
            Confirmar mi regalo 🎄
        </button>

    </form>

    <a href="index.php" class="regresar">
        ← Volver al inicio
    </a>

</div>

</body>
</html>
