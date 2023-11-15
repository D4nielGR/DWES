<!DOCTYPE html>
<html lang="en">

<?php
    if (!isset($_SERVER['PHP_AUTH_USER'])){
        header('WWW-Authenticate: Basic Realm="Contenido Restringido"');
        header('HTTP/1.0 401 Unauthorized');
        echo "Usuario no reconocido";
        exit;
    }
    else{
        $dwes=new mysqli("localhost", "root", "", "dwes");
        $error = $dwes->connect_errno;

        //si se estableció la conexión
        if ($error==null){
            //Ejecutamos consulta para comprobrar usuario y contraseña
            $sql="SELECT usuario FROM usuarios WHERE usuario='$_SERVER[PHP_AUTH_USER]' AND contrasena=md5('$_SERVER[PHP_AUTH_PW]')";
            $resultado=$dwes->query($sql);

            //Si no existe
            if($resultado->num_rows==0){
                header('WWW-Authenticate: Basic Realm="Contenido Restringido"');
                header('HTTP/1.0 401 Unauthorized');
                echo "Usuario no existe";
                exit;
            }
            $resultado->close();
            $dwes->close();
        }
        else{
            echo "No fue posible la conexión con la base de datos";
            exit;
        }
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example header Htpp auth</title>
</head>
<body>
    <?php
        if (isset($_SERVER['PHP_AUTH_USER']) and isset($_SERVER['PHP_AUTH_PW'])){
            echo "Nombre usuario: ".$_SERVER['PHP_AUTH_USER']."<br/>";
            echo "Hash: ".$_SERVER['PHP_AUTH_PW']."<br/>";
        }
        else
            echo "User not auth";
    ?>
</body>
</html>