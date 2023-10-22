<?php include ("funciones.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Delete</title>
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
            if (isset($_POST['takeDeleteAll'])) { 
                if($_POST['takeDeleteAll'] == "Yes") { $_SESSION['arrayItems'] = array(); $arrayItems = $_SESSION['arrayItems']; }
            }
            if (isset($_POST['takeDelete'])) {
                if ($_POST['takeDelete'] == "-1") {
                    echo "  <p>You want to delete all?</p>
                        <form action='delete.php' method='post'>
                            <input type='hidden'  name='takeDeleteAll' value='Yes'> 
                            <input type='submit' value='Yes'>
                        </form>
                        <form action='delete.php' method='post'>
                            <input type='hidden'  name='takeDeleteAll' value='No'> 
                            <input type='submit' value='No'>
                        </form>";
                }
                else {
                    $_SESSION['deleteProduct'] = eliminaElemento($_POST['takeDelete']);
                    header("Location: delete.php");
                }
            } 
        
            else {
                echo "<p><strong>{$_SESSION['deleteProduct']}</strong></p>";
                unset($_SESSION["deleteProduct"]);


                if (empty($arrayItems)) { echo "<p>No existe ningún Item actuamente</p>"; }
                else {
                    echo"<table border='2px' align='center'>
                
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
                            <form action='delete.php' method='post'>
                                <input type='hidden'  name='takeDelete' value='{$arrayItems[$i]->getId()}'> 
                                <td> <input type='submit' value='-'>      </td>
                            </form>
                            </tr>";
                        }
                        echo"</form>

                            <tr>
                                <td colspan='4'>    <p>"    .CalculateTotalProduct().    "  </p>    </td>
                                <td colspan='1'>    <p>" .CalculateTotalPurchasePrice(). "  </p>    </td>
                                <form action='delete.php' method='post'>
                                    <input type='hidden'  name='takeDelete' value='-1'> 
                                    <td colspan='1'> <p><input type='submit' value='-'>     </p> </td>
                                </form>
                            </tr>

                        </table>";
                }
            }
        ?>
    </body>
</body>
</html>