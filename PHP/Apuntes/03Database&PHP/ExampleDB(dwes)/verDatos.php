<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Plantilla para Ejercicios Tema 3</title>
	<link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="encabezado">
		<h1>Ejercicio:</h1>
		<form action="verDatos.php" method="post">
			<input type="text" name="cod" id="name">
			<input type="submit" value="name">
		</form>
	</div>

	<div id="contenido">
		<h2>Contenido</h2>
		<?php
		    if(isset($_POST["cod"])){
			    $name = $_POST["cod"];
			    verDatos($name);
		    }
		?>
	</div>

	<div id="pie">
	</div>
</body>

</html>
<?php






function verDatos($name)
{
    $conn = connectionBD();

    $sql = "SELECT * FROM stock WHERE producto = '$name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>tienda</th>
                    <th>unidades</th>
                </tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row["tienda"] . "</td>";
            echo "<td>" . $row["unidades"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron registros";
    }
    $conn->close();
}

function connectionBD() {
    $servername = "localhost";  
    $database = "dwes";         
    $username = "root";        
    $password = "";             
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully <br>";
    return $conn;
}
?>