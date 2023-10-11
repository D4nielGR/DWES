<?php
    print("<h1>EJERCICIO 4</h1>"); //5. Write a PHP program to compute the sum of the digits of a number.

    function sumDigits($dig) {
        if(is_numeric($dig)){ $dig = strval($dig); } //Si pasan los dígitos en forma numeric este los transformará en string

        $sumdig = 0;
        for ($i = 0; $i < 5; $i++) {
            $sumdig += $dig[$i];    
        } 
        echo "La suma de los dígitos es: $sumdig";
    }

    sumDigits("12345");
    sumDigits(11111);

?>