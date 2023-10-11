<?php
    print("<h1>EJERCICIO 3</h1>"); /*3. Write a PHP program to compute the sum of the prime numbers less than 100.
                                        Note: There are 25 prime numbers are there in less than 100.
                                        2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97 and sum of all these numbers is 1060
*/
    echo "Los números primos son: <br>";

    $sum1 = 0;
    for ($n = 2; $n <= 100; $n++) {
        if (esPrimo($n) == true) { echo $n. " ";    $sum1 += $n; }
    }

    function esPrimo($n) {
        for ($i = 2; $i < $n; $i++) { //$i para comprobar si $n es primo
            if (($n % $i) == 0) { return false; } //si es divisible con otro numero no es primo por tanto devolvera false
        } return true; //si no es divisible con otro numero devolvera verdadero
    }

    echo "<br>La suma de los números primos es: $sum1 <br><br>";

    



    print("<h2>Otra solución</h2>");

    echo "Los números primos son: <br>";

    $sum2 = 0;
    for ($n = 2; $n <= 100; $n++) { //$n para que se comprueben los números del 2 al 100
        
        $nEsPrimo = true;
        for ($i = 2; $i < $n; $i++) { //$i para comprobar si $n es primo
            if (($n % $i) == 0) { $nEsPrimo = false; }
        }

        if ($nEsPrimo == true) { echo $n. " ";  $sum2 += $n; }
    }

    echo "<br>La suma de los números primos es: $sum2";
?>