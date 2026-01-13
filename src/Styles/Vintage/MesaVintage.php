<?php

    namespace App\Styles\Vintage;

    use App\Contracts\Mesa;

    class MesaVintage implements Mesa{

        public function plegar(): string
        {
            return "Mesa Vintage plegada\n";
        }

        public function desplegar(): string
        {
            return "Mesa Vintage desplegada\n";
        }
    } 