<?php

    namespace App\Styles\Clasico;

    use App\Contracts\Lampara;

    class LamparaClasica implements Lampara{

        public function encender(): string
        {
            return "Lámpara Clásica encendida\n";
        }

        public function apagar(): string
        {
            return "Lámpara Clasica apagada\n";
        }
    } 