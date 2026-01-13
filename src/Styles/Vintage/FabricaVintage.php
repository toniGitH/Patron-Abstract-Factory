<?php

    namespace App\Styles\Vintage;

    use App\Contracts\Fabrica;
    use App\Contracts\Silla;
    use App\Contracts\Mesa;
    use App\Contracts\Lampara;

    class FabricaVintage implements Fabrica
    {
        public $estilo = "Vintage";

        public function fabricarSilla(): Silla
        {
            return new SillaVintage();
        }

        public function fabricarMesa(): Mesa
        {
            return new MesaVintage();
        }

        public function fabricarLampara(): Lampara
        {
            return new LamparaVintage();
        }

        public function getEstilo(): string
        {
            return $this->estilo;
        }

    }