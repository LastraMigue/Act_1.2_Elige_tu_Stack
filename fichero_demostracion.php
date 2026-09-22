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
        <!-- 
            Buena práctica de seguridad: Usamos htmlspecialchars() para prevenir ataques XSS (Cross-Site Scripting).
            Esta función convierte caracteres especiales (como < o >) en entidades HTML seguras. 
            De este modo, si los datos contuvieran código malicioso inyectado, el navegador lo 
            mostraría como simple texto en lugar de interpretarlo y ejecutarlo.
        -->
        <?php
            echo "<p>Fecha actual del servidor: " . htmlspecialchars(date('d/m/Y')) . "</p>";
            echo "<p>Hora actual del servidor: " . htmlspecialchars(date('H:i:s')) . "</p>";
        ?>
    </main>
    <footer>
        <p>Desarrollado por: <strong>Miguel Ángel Lastra</strong></p>
    </footer>
</body>
</html>
