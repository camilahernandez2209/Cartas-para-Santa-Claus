
<?php

require "conexion.php";

$sql = "SELECT * FROM regalos ORDER BY id DESC";
$consulta = $conexion->query($sql);

$registros = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de regalos</title>
    <link rel="stylesheet" href="estilos/estilos_paginas.css">
</head>

<body>

<div class="contenedor consulta-contenedor">

    <h1>📋 Consulta de regalos</h1>

    <p class="subtitulo">
        Registro de cartas y regalos de Santa Claus.
    </p>

    <h3>
        Total de registros: <?php echo count($registros); ?>
    </h3>

    <div class="tabla-contenedor">

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo del papá o mamá</th>
                    <th>Edad</th>
                    <th>Ciudad</th>
                    <th>Comportamiento</th>
                    <th>Carta</th>
                    <th>Regalo elegido</th>
                    <th>Fecha</th>
                </tr>
            </thead>

            <tbody>

                <?php if (count($registros) > 0): ?>

                    <?php foreach ($registros as $fila): ?>

                        <tr>

                            <td>
                                <?php echo $fila["id"]; ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($fila["nombre"]); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($fila["correo"] ?? "No proporcionado"); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars((string)($fila["edad"] ?? "No proporcionada")); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($fila["ciudad"] ?? "No proporcionada"); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($fila["comportamiento"] ?? "No proporcionado"); ?>
                            </td>

                            <td class="carta-tabla">
                                <?php echo nl2br(htmlspecialchars($fila["carta"])); ?>
                            </td>

                            <td>
                                🎁 <?php echo htmlspecialchars($fila["regalo"]); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($fila["fecha"]); ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="9">
                            Todavía no hay regalos registrados.
                        </td>
                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

    <a href="index.php" class="boton-enlace">
        Volver al inicio
    </a>

</div>

</body>
</html>
