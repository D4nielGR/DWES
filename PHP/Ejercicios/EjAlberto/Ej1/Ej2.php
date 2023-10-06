<?php
   /*Completa el siguiente código para que muestre el número de elementos del array $frutas:  
    <?php 
        $frutas = array("Manzana", "Plátano", "Naranja"); 
        //Mostrar el número de elementos del array anterior 
    ?> 
*/
    $frutas = array("Manzana", "Plátano", "Naranja"); 

    for ( $i = 0; $i < count($frutas); $i++ ) {
        echo $frutas[$i];
    }
?>