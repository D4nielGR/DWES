<?php
    //Dado el siguiente array: 
    $colores = array("rojo", "verde", "azul", "amarillo");

    print("<h1>EJERCICIO 8</h1>"); //8. Ordena alfabéticamente el siguiente array

    sort($colores);
    print_r($colores);
    echo "<br>";




    
    print("<h1>EJERCICIO 9</h1>"); //9. Ordena alfabéticamente en orden inverso (de la Z a la A) el siguiente array

    rsort($colores);
    var_export($colores);
?>