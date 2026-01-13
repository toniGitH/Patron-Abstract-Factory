<?php

    namespace App\Styles\Clasico;

    use App\Contracts\Fabrica;
    use App\Contracts\Silla;
    use App\Contracts\Mesa;
    use App\Contracts\Lampara;

    class FabricaClasica implements Fabrica
    {
        public $estilo = "Clasico";

        public function fabricarSilla(): Silla
        {
            return new SillaClasica();
        }

        public function fabricarMesa(): Mesa
        {
            return new MesaClasica();
        }

        public function fabricarLampara(): Lampara
        {
            return new LamparaClasica();
        }

        public function getEstilo(): string
        {
            return $this->estilo;
        }

    }