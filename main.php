<?php

    require_once __DIR__ . '/vendor/autoload.php';

    use App\Styles\Clasico\FabricaClasica;
    use App\Styles\Vintage\FabricaVintage;
    use App\Styles\Moderno\FabricaModerna;
    use App\Client\TiendaDeMuebles;

    // CASO 1: un cliente compra un conjunto completo de estilo clásico

    // 1. Selección del estilo de mobiliario: esto lo determina el comprador
    $fabricaSeleccionada = new FabricaClasica();
    // 2. La lógica de nuestra aplicación (TiendaDeRopa) va a actuar sin concocer las fabricas concretas
    $tienda = new TiendaDeMuebles($fabricaSeleccionada); 
    // 3. Mostrar resultados
    $tienda->venderConjunto();

    // CASO 2: un cliente compra sólo una lámpara de estilo vintage
    $fabricaSeleccionada = new FabricaVintage();
    $tienda = new TiendaDeMuebles($fabricaSeleccionada); 
    $tienda->venderLampara();

    // CASO 3: un cliente compra una mesa vintage, dos sillas clásicas y una lámpara moderna
    $fabricaSeleccionada = new FabricaVintage();
    $tienda = new TiendaDeMuebles($fabricaSeleccionada); 
    $tienda->venderMesa();
    $fabricaSeleccionada = new FabricaClasica();
    $tienda = new TiendaDeMuebles($fabricaSeleccionada); 
    $tienda->venderSilla();
    $tienda->venderSilla();    
    // AQUI HAY QUE MIRAR DE INCLUIR UNA SEGUNDA SILLA
    $fabricaSeleccionada = new FabricaModerna();
    $tienda = new TiendaDeMuebles($fabricaSeleccionada); 
    $tienda->venderLampara();