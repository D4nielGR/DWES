<?php
    //Dado el siguiente string:
    $cadena="Esto es un string de varias palabras"; 

    print("<h1>EJERCICIO 10</h1>"); /*10. A partir de la variable $cadena que se muestra en el código siguiente obtén los siguientes datos: 
                                        - Número de caracteres que almacena la cadena 
                                        - Número de palabras que almacena la cadena 
                                        - Devuelve la cadena escrita en mayúscula
*/
    echo "La cadena contiene " . strlen($cadena) . " carácteres <br>";
    echo "Cadena en mayúsculas: " . strtoupper($cadena) . " <br>";
    echo "La cadena contiene " . str_word_count($cadena) . " palabras <br>";

?>