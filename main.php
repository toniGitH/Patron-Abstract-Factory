<?php

    require_once __DIR__ . '/vendor/autoload.php';

    use App\Styles\Clasico\FabricaClasica;
    use App\Client\TiendaDeMuebles;

    // 1. Selección del estilo de mobiliario: esto lo determina el comprador
    $fabricaSeleccionada = new FabricaClasica();

    // 2. La lógica de nuestra aplicación (TiendaDeRopa) va a actuar sin concocer las fabricas concretas
    $tienda = new TiendaDeMuebles($fabricaSeleccionada); 

    // 3. Mostrar resultados
    $tienda->mostrarConjunto(); 