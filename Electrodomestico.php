<?php
    class Electrodomestico {
        private const const_precioBase = 100;
        protected const const_color = "blanco";
        protected const const_consumoEnergetico = "F";
        private const const_peso = 5;

        protected $precioBase;
        protected $color;
        protected $consumoEnergetico;
        protected $peso;

        public function __construct(float $pB, string $c, string $cE, float $p){
            if(func_num_args() === 4){
                $this->precioBase = $pB;
                $this->color = $this->comprobarColor($c);
                $this->consumoEnergetico = $this->comprobarConsumoEnergetico($cE);
                $this->peso = $p;
            } else if(func_num_args() === 0){
                $this->precioBase = self::const_precioBase;
                $this->color = self::const_color;
                $this->consumoEnergetico = self::const_consumoEnergetico;
                $this->peso = self::const_peso;
            } else {
                die("Error: error en el número de parámetros");
            }
        }

        public function getPrecioBase(){
            return $this->precioBase;
        }

        public function getColor(){
            return $this->color;
        }

        public function getConsumoEnergetico(){
            return $this->consumoEnergetico;
        }

        public function getPeso(){
            return $this->peso;
        }

        private function comprobarConsumoEnergetico(string $letra){
            if(in_array($letra, ['A', 'B', 'C', 'D', 'E', 'F'])){
                return $letra;
            } else {
                return self::const_consumoEnergetico;
            }
        }

        private function comprobarColor($c){
            if(in_array($c, ["blanco", "negro", "rojo", "azul", "gris"])){
                $this->color = $c;
            } else {
                $this->color = self::const_color;
            }
        }

        public function precioFinal(){
            $total = $this->getPrecioBase();
            switch ($this->consumoEnergetico){
                case "A":
                    $total += 100;
                    break;
                case "B":
                    $total += 80;
                    break;
                case "C":
                    $total += 60;
                    break;
                case "D":
                    $total += 50;
                    break;
                case "E":
                    $total += 30;
                    break;
                case "F":
                    $total += 10;
                    break;
                                                                            
            }
            if($this->consumoEnergetico >= 0 && $this->consumoEnergetico <= 19){
                $total += 10;                                                                            
            } else if($this->consumoEnergetico >= 20 && $this->consumoEnergetico <= 49){
                $total += 50;                                                                            
            } else if($this->consumoEnergetico >= 50 && $this->consumoEnergetico <= 79){
                $total += 80;                                                                            
            } else if($this->consumoEnergetico >= 80){
                $total += 100;
            }

            return $total;
        }
    }
?>