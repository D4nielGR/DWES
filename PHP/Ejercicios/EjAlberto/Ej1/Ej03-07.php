<?php
    print("<h1>EJERCICIO 3</h1>"); /*3. Crea un array asociativo llamado $estaturas que contenga la estatura de las siguientes personas: 
                                        Nombre     Estatura (en cm) 
                                        Juan          186 
                                        Alberto       172 
                                        Marta         173  
*/
    $estaturas = array(
        "Juan" => "186", 
        "Alberto" => "172", 
        "Marta" => "173");
    
    var_dump($estaturas);





    print("<h1>EJERCICIO 4</h1>"); //4. Escribe el código necesario para mostrar la estatura de Alberto.

    echo "La estatura de Alberto es: " . $estaturas["Alberto"] . " cm <br>";





    print("<h1>EJERCICIO 5</h1>"); //5. Recorre el array asociativo estaturas y muestra los pares clave/valor.  

    echo "Nombre     Estatura (en cm) <br>";
    foreach ( $estaturas as $name => $est) {
        echo "$name \t \t $est <br>";
    } echo "<br>";





    print("<h1>EJERCICIO 6</h1>"); //6. Ordena el array asociativo $estaturas en orden descendente de acuerdo al valor.  

    arsort($estaturas);
    print_r($estaturas);
    echo "<br>";





    print("<h1>EJERCICIO 7</h1>"); //7. Ordena el array asociativo $estaturas en orden descendente de acuerdo a la clave.   

    ksort($estaturas);
    var_export($estaturas);
?>
