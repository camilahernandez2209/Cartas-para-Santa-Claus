
<?php

session_start();

require "conexion.php";
require "juguetes.php";

if (
    !isset($_SESSION["nombre"]) ||
    !isset($_SESSION["correo"]) ||
    !isset($_SESSION["edad"]) ||
    !isset($_SESSION["ciudad"]) ||
    !isset($_SESSION["comportamiento"]) ||
    !isset($_SESSION["carta"])
) {
    header("Location: carta.php");
    exit;
}

$regalo = $_POST["regalo"] ?? "";

if (!array_key_exists($regalo, $juguetes)) {
    die("Debes seleccionar un regalo válido.");
}

$nombre = $_SESSION["nombre"];
$correo = $_SESSION["correo"];
$edad = $_SESSION["edad"];
$ciudad = $_SESSION["ciudad"];
$comportamiento = $_SESSION["comportamiento"];
$carta = $_SESSION["carta"];

try {

    $sql = "INSERT INTO regalos
            (nombre, correo, edad, ciudad, comportamiento, carta, regalo)
            VALUES
            (:nombre, :correo, :edad, :ciudad, :comportamiento, :carta, :regalo)";

    $consulta = $conexion->prepare($sql);

    $consulta->execute([
        ":nombre" => $nombre,
        ":correo" => $correo,
        ":edad" => $edad,
        ":ciudad" => $ciudad,
        ":comportamiento" => $comportamiento,
        ":carta" => $carta,
        ":regalo" => $regalo
    ]);

    unset(
        $_SESSION["nombre"],
        $_SESSION["correo"],
        $_SESSION["edad"],
        $_SESSION["ciudad"],
        $_SESSION["comportamiento"],
        $_SESSION["carta"]
    );

} catch (PDOException $e) {

    die("No se pudo guardar el registro.");

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regalo registrado</title>
    <link rel="stylesheet" href="estilos/estilos_paginas.css">
</head>

<body>

<div class="contenedor confirmacion">

    <h1>🎅 ¡Ho, ho, ho!</h1>

    <h2>¡Tu regalo ha sido registrado!</h2>

    <p>
        Tu carta quedó registrada en el Polo Norte.
    </p>

    <h2>🎁 <?php echo htmlspecialchars($regalo); ?></h2>

    <a href="index.php" class="boton-enlace">
        Volver al inicio
    </a>

    <a href="consulta.php" class="regresar">
        Ir a consulta
    </a>

</div>

</body>
</html>
