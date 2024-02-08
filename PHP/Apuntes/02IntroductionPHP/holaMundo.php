<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRIMERA PRUEBA</title>
</head>
<body>
    <?php
        echo'<p>Hola mundo</p>'; 





        print "<br> VARIABLES <br>";

        $nombre="esto es una cadena";
        $a=2;
        $b=2.9;
        $c=false;
        $f=NULL;
        DEFINE("LIMITE",100); //con esta funciñón inizializamos una constant(const)
        //con esta funcion conocemos el tipo de datos
        echo $nombre . "<br>";
        var_dump($b);       echo "<br>";
        var_dump($c);       echo "<br>";
        var_dump($nombre);  echo "<br>";
        var_dump($f);       echo "<br>";
        var_dump(LIMITE);   echo " <br>";





        $b=$a;
        $c=&$a;
        echo '<br>'.$a.' '.$b .' '.  $c ;
        $a=3;
        echo '<br>'.$a.' '.$b .' '.  $c ;
        $NAME = define("LIMITES", 60);
        echo '<br>' .LIMITES. '<br>';





        print "<br> CLASES <br>";

        class Car{
            public $color;
            public $model;
            public function __construct($color,$model){ $this->color=$color; $this->model=$model; }
            public function message(){ return "The car is " .$this->color . " " .$this ->model. "!"; }
        }

        $car1=new Car("gris","audi");
        echo $car1->message(); echo "<br>";





        echo "<br> FUNCIONES STRING <br>";

        echo strlen("hola mundo");                                                      echo " <br>"; //cuenta letras
        echo str_word_count("hola mundo");                                              echo " <br>"; //cuenta palabras
        echo strrev("hello world");                                                     echo " <br>"; //da la vuelta a la cadena    
        echo strpos("hello world!", "world");                            echo " <br>"; //devuelve la posicion
        echo str_replace("world","pepito","hello world");    echo " <br>"; //remplazo





        echo "<br> FUNCIONES NUM <br>";
        
        //devuel falso o true
        $j=123;
        var_dump(is_numeric($j));

        //convertir a entero y float
        $k=234.9;
        $l=(int)$k;
        echo "<br>" . $k . "<br>" . $l . "<br>";

        //te compueba el minimo
        echo(min(1,2,3,0)); echo " <br>";

        //te compueba el maximo
        echo(max(1,2,3,0)); echo " <br>";

        //valor absoluto
        echo(abs(-3.6));    echo " <br>";

        //raiz cuadrada
        echo(sqrt(165));    echo " <br>";

        //redondeo
        echo(round(1.50));  echo " <br>"; //redondea segun el primer decimal, no tiene en cuenta a partir del segundo decimal
        
        //numerop alEATORIO SE LE PUEDE PONER DE UN NUMERO A OTRO
        echo(rand());   echo " <br>";





        print "<br> ARRAY CONSTANTES <br>";

        define('DIAS',array("Lunes","Martes"));
        echo DIAS[1]. "<br>";





        print "<br> \$_SERVER <br>";

        echo "Ruta dentro de htcdocs: " .$_SERVER['PHP_SELF']. "<br>";
        echo "Ruta dentro de SERVIDOR:". $_SERVER['SERVER_NAME']. "<br>";
        echo "sOFTWARE:". $_SERVER['SERVER_SOFTWARE']. "<br>";
        echo "PROTOCOLO:". $_SERVER['SERVER_PROTOCOL']. "<br>";
        echo "metodo de repeticion:". $_SERVER['REQUEST_METHOD']. "<br>";

    ?> 
</body>
</html>
