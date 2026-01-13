<?php

    namespace App\Styles\Moderno;

    use App\Contracts\Silla;

    class SillaModerna implements Silla{

        public function plegar(): string
        {
            return "Silla Moderna plegada\n";
        }

        public function desplegar(): string
        {
            return "Silla Moderna desplegada\n";
        }
    } 