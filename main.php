<?php

    require_once __DIR__ . '/vendor/autoload.php';

    use App\Styles\Clasico\FabricaClasica;
    use App\Styles\Vintage\FabricaVintage;
    use App\Styles\Moderno\FabricaModerna;
    use App\Client\TiendaDeMuebles;

    $resultados = [];

    // CASO 1: un cliente compra un conjunto completo de estilo clásico
    $fabricaSeleccionada = new FabricaClasica();
    $tienda = new TiendaDeMuebles($fabricaSeleccionada); 
    $resultados[] = [
        'identificacion_del_pedido' => 'PEDIDO #001 - Conjunto Clásico',
        'descripcion_del_pedido' => 'Un cliente compra un conjunto completo de muebles de estilo clásico para su salón.',
        'salida' => $tienda->venderConjuntoACliente()
    ];

    // CASO 2: un cliente compra sólo una lámpara de estilo vintage
    $fabricaSeleccionada = new FabricaVintage();
    $tienda = new TiendaDeMuebles($fabricaSeleccionada);
    $resultados[] = [
        'identificacion_del_pedido' => 'PEDIDO #002 - Lámpara Vintage',
        'descripcion_del_pedido' => 'Un cliente busca dar un toque retro a su habitación con una lámpara vintage.',
        'salida' => $tienda->venderMuebleACliente('lampara')
    ];

    // CASO 3: un cliente compra una mesa vintage, dos sillas clásicas y una lámpara moderna
    $salidaMixta = "";
    
    $fabricaSeleccionada = new FabricaVintage();
    $tienda = new TiendaDeMuebles($fabricaSeleccionada); 
    $salidaMixta .= $tienda->venderMuebleACliente('mesa');
    
    $fabricaSeleccionada = new FabricaClasica();
    $tienda = new TiendaDeMuebles($fabricaSeleccionada); 
    $salidaMixta .= $tienda->venderMuebleACliente('silla');
    $salidaMixta .= $tienda->venderMuebleACliente('silla');
    
    $fabricaSeleccionada = new FabricaModerna();
    $tienda = new TiendaDeMuebles($fabricaSeleccionada); 
    $salidaMixta .= $tienda->venderMuebleACliente('lampara');

    $resultados[] = [
        'identificacion_del_pedido' => 'PEDIDO #003 - Pedido Mixto',
        'descripcion_del_pedido' => 'Un cliente rompe con las normas y decide combinar diversos estilos en un mismo pedido.',
        'salida' => $salidaMixta
    ];

    $ventajas = [
        "Coherencia entre productos: se garantiza que los objetos creados sean compatibles entre sí.",
        "Desacoplamiento: el cliente trabaja con interfaces, no con clases concretas.",
        "Fácil extensión: añadir nuevas familias (como estilo 'Futurista') no afecta al código existente (Open/Closed).",
        "Responsabilidad única: la lógica de creación se centraliza en las fábricas."
    ];

    // Si el archivo se ejecuta directamente (CLI) y no es un include
    if (php_sapi_name() === 'cli' && count(debug_backtrace()) === 0) {
        echo "========================================\n";
        echo "EJEMPLO DEL PATRÓN ABSTRACT FACTORY\n";
        echo "========================================\n\n";

        foreach ($resultados as $resultado) {
            echo $resultado['identificacion_del_pedido'] . "\n";
            echo $resultado['descripcion_del_pedido'] . "\n";
            echo str_repeat("-", 40) . "\n";
            echo $resultado['salida'];
            echo "\n\n";
        }

        echo "========================================\n";
        echo "VENTAJAS DEL PATRÓN ABSTRACT FACTORY:\n";
        echo "========================================\n";
        foreach ($ventajas as $ventaja) {
            echo "✓ " . $ventaja . "\n";
        }
        echo "\n";
    }