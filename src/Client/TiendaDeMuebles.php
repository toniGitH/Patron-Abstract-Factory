<?php

    namespace App\Client;

    use App\Contracts\Fabrica;
    use App\Contracts\Mesa;
    use App\Contracts\Silla;
    use App\Contracts\Lampara;
    
    class TiendaDeMuebles {

        private Fabrica $fabrica;
        private Silla $silla;
        private Mesa $mesa;
        private Lampara $lampara;

        public function __construct(Fabrica $fabrica) {
            $this->fabrica = $fabrica;
        }

        public function pedirConjuntoAFabrica() {
            $this->silla = $this->fabrica->fabricarSilla();
            $this->mesa = $this->fabrica->fabricarMesa();
            $this->lampara = $this->fabrica->fabricarLampara();
        }

        public function venderConjunto() {
            $estilo = $this->fabrica->getEstilo();
            echo "\n";
            echo "Vendido conjunto de muebles de estilo $estilo\n";
            echo "---------------------\n";
            $this->pedirConjuntoAFabrica();
            echo $this->silla->desplegar();
            echo $this->mesa->desplegar();
            echo $this->lampara->encender();
        }

        public function pedirSillaAFabrica() {
            $this->silla = $this->fabrica->fabricarSilla();
        }

        public function venderSilla() {
            $estilo = $this->fabrica->getEstilo();
            echo "\n";
            echo "Vendida silla de estilo $estilo\n";
            echo "---------------------\n";
            $this->pedirSillaAFabrica();
            echo $this->silla->desplegar();
        }

        public function pedirMesaAFabrica() {
            $this->mesa = $this->fabrica->fabricarMesa();
        }

        public function venderMesa() {
            $estilo = $this->fabrica->getEstilo();
            echo "\n";
            echo "Vendida mesa de estilo $estilo\n";
            echo "---------------------\n";
            $this->pedirMesaAFabrica();
            echo $this->mesa->desplegar();
        }

        public function pedirLamparaAFabrica() {
            $this->lampara = $this->fabrica->fabricarLampara();
        }

        public function venderLampara() {
            $estilo = $this->fabrica->getEstilo();
            echo "\n";
            echo "Vendida lampara de estilo $estilo\n";
            echo "---------------------\n";
            $this->pedirLamparaAFabrica();
            echo $this->lampara->encender();
        }
    }