<?php

    namespace App\Styles\Moderno;

    use App\Contracts\Lampara;

    class LamparaModerna implements Lampara{

        public function encender(): string
        {
            return "Lámpara Moderna encendida\n";
        }

        public function apagar(): string
        {
            return "Lámpara Moderna apagada\n";
        }
    } 