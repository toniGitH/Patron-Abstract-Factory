<?php

    namespace App\Styles\Moderno;

    use App\Contracts\Mesa;

    class MesaModerna implements Mesa{

        public function plegar(): string
        {
            return "Mesa Moderna plegada\n";
        }

        public function desplegar(): string
        {
            return "Mesa Moderna desplegada\n";
        }
    } 