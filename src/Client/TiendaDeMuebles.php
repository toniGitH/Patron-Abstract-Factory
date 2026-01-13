<?php

    namespace App\Client;

    use App\Contracts\Fabrica;
    
    class TiendaDeMuebles {

        private Fabrica $fabrica;

        public function __construct(Fabrica $fabrica) {
            $this->fabrica = $fabrica;
        }

        public function mostrarConjunto() {
            $estilo = $this->fabrica->getEstilo();
            echo "Abriendo catálogo de muebles de estilo $estilo\n";
            echo "---------------------\n";
            $this->exponerConjunto();
        }

        public function exponerConjunto() {
            $silla = $this->fabrica->fabricarSilla();
            $mesa = $this->fabrica->fabricarMesa();
            $lampara = $this->fabrica->fabricarLampara();

            echo $silla->desplegar();
            echo $mesa->desplegar();
            echo $lampara->encender();
        }
    }