<?php
    class Lavadora extends Electrodomestico{
        private const const_carga = 5;
        private $carga;

        public function __construct(float $pB, string $c, string $cE, float $p, float $ca){
            if(func_num_args() === 5){
                parent::__construct($pB, $c, $cE, $p);
                $this->carga = $ca;
            } else if(func_num_args() === 0){
                parent::__construct();
                $this->carga = self::const_carga;
            } else if(func_num_args() === 2 && gettype(func_get_arg(0)) === "float" && gettype(func_get_arg(1)) === "float"){
                parent::__construct($pB, parent::const_color, parent::const_consumoEnergetico, $p);
                $this->carga = self::const_carga;
            } else {
                die("Error: error en el número de parámetros");
            }
        }

        public function getCarga(){
                return $this->carga;
        }

        public function precioFinal(){
            $total = parent::precioFinal();
            if($this->carga > 30){
                $total += 50;
            }
            return $total;
        }
    }
?>