<?php
    print("<h1>Ejercicio 2</h1>"); 
   /*Completa el siguiente código para que muestre el número de elementos del array $frutas:  
    <?php 
        $frutas = array("Manzana", "Plátano", "Naranja"); 
        //Mostrar el número de elementos del array anterior 
    ?> 
*/
    $frutas = array("Manzana", "Plátano", "Naranja"); 

    for ( $i = 0; $i < count($frutas); $i++ ) {
        print $frutas[$i];
        echo "<br>";
    }

    echo "<br>";
    echo "<h2>Otra solución</h2>";
    var_dump($frutas);
?>