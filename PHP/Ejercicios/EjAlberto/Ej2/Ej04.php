<?php
    print("<h1>EJERCICIO 4</h1>"); /*4. Write a PHP program to remove duplicates from a sorted list.
                                        Input: (1,1,2,2,3,4,5,5)
                                        Output: (1,2,3,4,5)
*/
    $nums = array(1, 1, 2, 2, 3, 4, 5, 5);
    print_r(array_unique($nums));
?>