<?php

    require_once __DIR__ . '/vendor/autoload.php';

    use App\Styles\Clasico\FabricaClasica;
    use App\Styles\Vintage\FabricaVintage;
    use App\Styles\Moderno\FabricaModerna;
    use App\Client\TiendaDeMuebles;

    // CASO 1: un cliente compra un conjunto completo de estilo clásico
    // 1. Selección del estilo (fabrica) de mobiliario: esto lo determina el comprador
    $fabricaSeleccionada = new FabricaClasica();
    // 2. La lógica de nuestra aplicación (TiendaDeMuebles) va a actuar sin conocer las fábricas concretas
    $tienda = new TiendaDeMuebles($fabricaSeleccionada); 
    // 3. Mostrar resultados
    echo $tienda->venderConjuntoACliente();

    // CASO 2: un cliente compra sólo una lámpara de estilo vintage
    // 1. Selección del estilo (fabrica) de mobiliario: esto lo determina el comprador
    $fabricaSeleccionada = new FabricaVintage();
    // 2. La lógica de nuestra aplicación (TiendaDeMuebles) va a actuar sin conocer las fábricas concretas
    $tienda = new TiendaDeMuebles($fabricaSeleccionada);
    // 3. Mostrar resultados
    echo $tienda->venderMuebleACliente('lampara');

    // CASO 3: un cliente compra una mesa vintage, dos sillas clásicas y una lámpara moderna
    // 1. Para la mesa vintage
    $fabricaSeleccionada = new FabricaVintage();
    $tienda = new TiendaDeMuebles($fabricaSeleccionada); 
    echo $tienda->venderMuebleACliente('mesa');
    // 2. Para las 2 sillas clásicas
    $fabricaSeleccionada = new FabricaClasica();
    $tienda = new TiendaDeMuebles($fabricaSeleccionada); 
    echo $tienda->venderMuebleACliente('silla');
    echo $tienda->venderMuebleACliente('silla');
    // 3. Para la lámpara moderna
    $fabricaSeleccionada = new FabricaModerna();
    $tienda = new TiendaDeMuebles($fabricaSeleccionada); 
    echo $tienda->venderMuebleACliente('lampara');