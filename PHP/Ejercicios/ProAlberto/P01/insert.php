<?php include ("funciones.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Insert</title>
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
        <table>

            <tr>
                <th>    Name    </th>
                <th>  Quantity  </th>
                <th>    Price   </th>
            </tr>

            <tr>
                <form action="insert.php" method="post">
                    <td> <input type="text" name="takeName">        </td>
                    <td> <input type="text" name="takeQuantity">  </td>
                    <td> <input type="text" name="takePrice">     </td>
                    <td> <input type="submit" value="+">            </td>
                </form>
            </tr>
                
        </table>
            

        <?php
            if (isset($_POST['takeName']) && isset($_POST['takeQuantity']) && isset($_POST['takePrice'])) {
                $_SESSION['insertProduct'] = insertProduct($_POST['takeName'], $_POST['takeQuantity'], $_POST['takePrice']);
                header("Location: insert.php");
            } 
            
            else {
                echo "<p><strong>{$_SESSION['insertProduct']}</strong></p>";
                unset($_SESSION["insertProduct"]);


                if (empty($arrayItems)) { echo "<p>No existe ningún Item actuamente</p>"; }
                else {
                    echo"<table border='2px'>
                
                            <tr>
                                <th>     ID     </th>
                                <th>    Name    </th>
                                <th>  Quantity  </th>
                                <th>    Price   </th>
                                <th>    Total   </th>
                            </tr>";

                        for ($i = 0; $i < count($arrayItems); $i++) {
                        echo"<tr align='center'>
                                <td> <p>{$arrayItems[$i]->getId()}          </p> </td> 
                                <td> <p>{$arrayItems[$i]->getName()}        </p> </td>
                                <td> <p>{$arrayItems[$i]->getQuantity()}    </p> </td>
                                <td> <p>{$arrayItems[$i]->getPrice()}       </p> </td>
                                <td> <p>".CalculateTotalPriceProduct($i)."  </p> </td>
                            </tr>";
                        }

                        echo"<tr>
                                <td colspan='4'>    <p>"    .CalculateTotalProduct().    "  </p>    </td>
                                <td colspan='1'>    <p>" .CalculateTotalPurchasePrice(). "  </p>    </td>
                            </tr>

                            </table>";
                }
            }
        ?>
    </body>
</body>
</html>