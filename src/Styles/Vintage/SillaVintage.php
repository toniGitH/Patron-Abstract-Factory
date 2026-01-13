<?php

    namespace App\Styles\Vintage;

    use App\Contracts\Silla;

    class SillaVintage implements Silla{

        public function plegar(): string
        {
            return "Silla Vintage plegada\n";
        }

        public function desplegar(): string
        {
            return "Silla Vintage desplegada\n";
        }
    } 