<?php
    require_once "Electrodomestico.php";
    require_once "Lavadora.php";
    require_once "Television.php";

    $lv1 = new Lavadora();
    $lv2 = new Lavadora(250, 175);
    $lv3 = new Lavadora(1500, "negro", "A", 120, 80);

    echo $lv1->getCarga() + "<br>";
    echo $lv1->precioFinal() + "<br>";
    echo $lv2->getCarga() + "<br>";
    echo $lv2->precioFinal() + "<br>";
    echo $lv3->getCarga() + "<br>";
    echo $lv3->precioFinal() + "<br>";
?>