<?php

    namespace App\Styles\Clasico;

    use App\Contracts\Silla;

    class SillaClasica implements Silla{

        public function plegar(): string
        {
            return "Silla Clásica plegada\n";
        }

        public function desplegar(): string
        {
            return "Silla Clásica desplegada\n";
        }
    } 