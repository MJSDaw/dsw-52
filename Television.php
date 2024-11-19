<?php
    class Television extends Electrodomestico{
        private $resolucion;
        private $sintonizadorTDT;

        private const const_resolucion = 20;
        private const const_sintonizadorTDT = false;

        public function __construct(float $pB, string $c, string $cE, float $p, float $r){
            if(func_num_args() === 5){
                parent::__construct($pB, $c, $cE, $p);
                $this->resolucion = $r;
                $this->sintonizadorTDT = self::const_sintonizadorTDT;
            } else if(func_num_args() === 0){
                parent::__construct();
                $this->resolucion = self::const_resolucion;
                $this->sintonizadorTDT = self::const_sintonizadorTDT;
            } else if(func_num_args() === 2 && gettype(func_get_arg(0)) === "float" && gettype(func_get_arg(1)) === "float"){
                parent::__construct($pB, parent::const_color, parent::const_consumoEnergetico, $p);
                $this->resolucion = self::const_resolucion;
                $this->sintonizadorTDT = self::const_sintonizadorTDT;
            } else {
                die("Error: error en el número de parámetros");
            }
        }

        public function getResolucion(){
                return $this->resolucion;
        }

        public function getSintonizadorTDT(){
                return $this->sintonizadorTDT;
        }

        public function precioFinal(){
            $total = parent::precioFinal();
            if($this->resolucion > 40){
                $total += (($total * 30) / 100);
            }
            if($this->sintonizadorTDT){
                $total += 50;
            }
            return $total;
        }
    }
?>