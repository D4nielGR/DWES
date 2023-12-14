<?php include("functions.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Index</title>
</head>
<body>
    <header>
        <div class="Navbar">
            <div>   <a href="index.php">  <p>Show List</p>  </a>    </div>
            <div>   <a href="insert.php"> <p>  Insert </p>  </a>    </div>
            <div>   <a href="modify.php"> <p>  Modify </p>  </a>    </div>
            <div>   <a href="delete.php"> <p>  Delete </p>  </a>    </div>
        </div>
    </header>

    <body>
        <?php
            $conn = connectionBD();

            $sqlCom = "SELECT * FROM comerciales";
            $sqlPro = "SELECT * FROM productos";
            $sqlVen = "SELECT * FROM ventas";

            $result = ["Comerciales"=>mysqli_query($conn, $sqlCom), "Productos"=>$conn->query($sqlPro), "Ventas"=>mysqli_query($conn, $sqlVen)];

            foreach($result as $key=>$value) {
                if ($value->num_rows > 0) {
                    echo "<table border='1'>";

                        if($key=="Comerciales")
                        echo "<tr> <th>Code</th> <th>Name</th> <th>Salary</th> <th>Children</th> <th>Birthdate</th> </tr>";

                        if($key=="Productos") 
                        echo "<tr> <th>Refertency</th> <th>Name</th> <th>Description</th> <th>Price</th> <th>Discount</th> </tr>";

                        if($key=="Ventas") 
                        echo "<tr> <th>CodCommercial</th> <th>RefProduct</th> <th>Quantity</th> <th>Date</th> </tr>";

                        while($row = $value->fetch_assoc()) {
                            echo "<tr>";

                                if($key=="Comerciales")
                                echo "<td>{$row["codigo"]}</td> <td>{$row["nombre"]}</td> <td>{$row["salario"]}</td> <td>{$row["hijos"]}</td> <td>{$row["fNacimiento"]}</td>";

                                if($key=="Productos")
                                echo "<td>{$row["referencia"]}</td> <td>{$row["nombre"]}</td> <td>{$row["descripcion"]}</td> <td>{$row["precio"]}</td> <td>{$row["descuento"]}</td>";

                                if($key=="Ventas")
                                echo "<td>{$row["codComercial"]}</td> <td>{$row["refProducto"]}</td> <td>{$row["cantidad"]}</td> <td>{$row["fecha"]}</td>";

                            echo "</tr>";
                        }
                    echo "</table>";
                } else {
                    echo "No se encontraron registros";
                }
            }  
            
            $conn->close();
        ?>
    </body>
</body>
</html>