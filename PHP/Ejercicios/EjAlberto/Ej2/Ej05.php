<?php
    print("<h1>EJERCICIO 5</h1>"); //5. Write a PHP program to compute the sum of the digits of a number.

    function sumDigits1($dig) {
        if(is_numeric($dig)){ $dig = strval($dig); } //Si pasan los dígitos en forma numeric este los transformará en string

        $sumdig = 0;
        for ($i = 0; $i < strlen($dig); $i++) {
            $sumdig += $dig[$i];    
        } 
        echo "La suma de los dígitos es: $sumdig";
    }

    sumDigits1("12345");    echo "<br>";
    sumDigits1(11111);





    print("<h2>Otra solución</h2>");

    function sumDigits2($dig) {
        $sumdig = 0;
        //DEFINE("digLength", strlen($dig));
        $l = strlen($dig);
        for ($i = 0; $i < $l; $i++) {
            $lastdig = $dig % 10;
            $sumdig += $lastdig;
            $dig = (int) ($dig/10);
        }
        echo "La suma de los dígitos del número es: " . $sumdig;
    }

    sumDigits2("123455");    echo "<br>";
    sumDigits2(12345);
?>