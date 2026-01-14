<?php

    namespace App\Client;

    use App\Contracts\Fabrica;
    
    class TiendaDeMuebles {

        private Fabrica $fabrica;

        public function __construct(Fabrica $fabrica) {
            $this->fabrica = $fabrica;
        }

        // Método genérico para pedir un mueble individual
        public function pedirMuebleAFabrica(string $tipo): object {
            $metodo = 'fabricar' . ucfirst($tipo);
            $mueble = $this->fabrica->$metodo();
            return $mueble;
        }

        // Método para pedir un conjunto completo
        public function pedirConjuntoAFabrica(): array {
            return [
                'silla' => $this->pedirMuebleAFabrica('silla'),
                'mesa' => $this->pedirMuebleAFabrica('mesa'),
                'lampara' => $this->pedirMuebleAFabrica('lampara')
            ];
        }

        // Método genérico para vender un mueble individual
        public function venderMuebleACliente(string $tipo): string {
            $mueble = $this->pedirMuebleAFabrica($tipo);
            $estilo = $this->fabrica->getEstilo();
            
            $output = "\n";
            $output .= "Vendida " . $tipo . " de estilo $estilo\n";
            $output .= "---------------------\n";
            $output .= $this->mostrarMueble($mueble, $tipo);
            
            return $output;
        }

        // Método para vender conjunto
        public function venderConjuntoACliente(): string {
            $conjunto = $this->pedirConjuntoAFabrica();
            $estilo = $this->fabrica->getEstilo();
            
            $output = "\n";
            $output .= "Vendido conjunto de muebles de estilo $estilo\n";
            $output .= "---------------------\n";
            
            foreach ($conjunto as $tipo => $mueble) {
                $output .= $this->mostrarMueble($mueble, $tipo);
            }
            
            return $output;
        }

        // Método auxiliar para mostrar un mueble
        private function mostrarMueble(object $mueble, string $tipo): string {
            if ($tipo === 'lampara') {
                return $mueble->encender();
            }
            return $mueble->desplegar();
        }
    }   