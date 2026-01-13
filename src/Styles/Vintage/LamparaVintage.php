<?php

    namespace App\Styles\Vintage;

    use App\Contracts\Lampara;

    class LamparaVintage implements Lampara{

        public function encender(): string
        {
            return "Lámpara Vintage encendida\n";
        }

        public function apagar(): string
        {
            return "Lámpara Vintage apagada\n";
        }
    } 