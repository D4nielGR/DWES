<?php include("functions.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
        $conn = connectionBD();

        $sqlCom = "SELECT * FROM comerciales";
        $sqlPro = "SELECT * FROM productos";
        $sqlVen = "SELECT * FROM ventas";
        $result = ["Comerciales"=>mysqli_query($conn, $sqlCom), "Productos"=>mysqli_query($conn, $sqlPro), "Ventas"=>mysqli_query($conn, $sqlVen)];
    
        foreach($result as $key=>$value) {
            if (mysqli_num_rows($value) > 0 && $row = mysqli_fetch_array($value)) {
                echo "<table border='1'>";
                    
                    while($row != null) {
                        echo "<tr>
                            <td></td>
                        </tr>";
                    }
                echo "</table>";
            } else {
                echo "No se encontraron registros";
            }
        }

        $conn->close();
    ?>
</body>
</html>