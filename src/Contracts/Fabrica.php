<?php

    namespace App\Contracts;

    interface Fabrica{

        public function fabricarSilla(): Silla;

        public function fabricarMesa(): Mesa;

        public function fabricarLampara(): Lampara;

        public function getEstilo(): string;

    }