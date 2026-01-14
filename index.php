<?php require_once 'main.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abstract Factory - Tienda de Muebles</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>🏭 Patron Abstract Factory</h1>
            <p class="subtitle">Ejemplo de implementación: Tienda de Muebles</p>
        </header>

        <main>
            <section class="results">
                <h2>📦 Gestión de Pedidos</h2>
                <div class="grid">
                    <?php foreach ($resultados as $resultado): ?>
                        <div class="card">
                            <div class="card-header">
                                <span class="badge"><?php echo htmlspecialchars($resultado['identificacion_del_pedido']); ?></span>
                            </div>
                            <div class="card-body">
                                <p class="description"><?php echo htmlspecialchars($resultado['descripcion_del_pedido']); ?></p>
                                <div class="output">
                                    <?php echo nl2br(htmlspecialchars($resultado['salida'])); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="advantages">
                <h2>🎯 Ventajas del Patrón</h2>
                <ul>
                    <?php foreach ($ventajas as $ventaja): ?>
                        <li>
                            <span class="icon">✅</span>
                            <?php echo htmlspecialchars($ventaja); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </main>

        <footer>
            <p>Implementación del Patrón de Diseño Abstract Factory en PHP</p>
        </footer>
    </div>
</body>
</html>
