<?php

    namespace App\Styles\Moderno;

    use App\Contracts\Fabrica;
    use App\Contracts\Silla;
    use App\Contracts\Mesa;
    use App\Contracts\Lampara;

    class FabricaModerna implements Fabrica
    {
        public $estilo = "Moderno";

        public function fabricarSilla(): Silla
        {
            return new SillaModerna();
        }

        public function fabricarMesa(): Mesa
        {
            return new MesaModerna();
        }

        public function fabricarLampara(): Lampara
        {
            return new LamparaModerna();
        }

        public function getEstilo(): string
        {
            return $this->estilo;
        }

    }