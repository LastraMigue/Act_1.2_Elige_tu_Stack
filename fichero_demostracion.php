<?php
// Declaración de variables y obtención de datos dinámicos del servidor
$fechaActual = date('d/m/Y'); 
$horaActual = date('H:i:s');
$nombre = "Miguel Ángel Lastra";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Concepto - Generación Dinámica</title>
</head>
<body>
    <header>
        <h1>Prueba de Concepto: Integración PHP y HTML</h1>
    </header>
    <main>
        <p>Esta página ha sido generada dinámicamente por el servidor.</p>
        <!-- Se usa htmlspecialchars() al imprimir variables para prevenir ataques XSS -->
        <p>Fecha actual del servidor: <?php echo htmlspecialchars($fechaActual, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>Hora actual del servidor: <?php echo htmlspecialchars($horaActual, ENT_QUOTES, 'UTF-8'); ?></p>
    </main>
    <footer>
        <p>Desarrollado por: <strong><?php echo htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8'); ?></strong></p>
    </footer>
</body>
</html>
