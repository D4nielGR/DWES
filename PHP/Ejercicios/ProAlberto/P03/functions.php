<?php

    //CONNECTION WITH DATABASE
    function connectionBD() {   
        $servername = "localhost";  
        $database = "ventas_comerciales";         
        $username = "root";        
        $password = "";             
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }
?>