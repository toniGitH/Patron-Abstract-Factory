<?php

    namespace App\Styles\Clasico;

    use App\Contracts\Mesa;

    class MesaClasica implements Mesa{

        public function plegar(): string
        {
            return "Mesa Clásica plegada\n";
        }

        public function desplegar(): string
        {
            return "Mesa Clásica desplegada\n";
        }
    } 