<?php include ("funciones.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Modify</title>
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
        <?php echo $_POST['noTakeMod'];
            if (isset($_POST['ModPro']) && $_POST['ModPro'] == 'Yes') {
                $_SESSION['modifyProduct'] = modifyValues($_POST['takeModId'], $_POST['takeModName'], $_POST['takeModQuantity'], $_POST['takeModPrice']);
                header("Location: modify.php");
            } 
            
            else {
                echo "<p><strong>{$_SESSION['modifyProduct']}</strong></p>";
                unset($_SESSION["modifyProduct"]);


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
                            if((!isset($_POST['noTakeMod']) || $_POST['noTakeMod'] != "Yes") && isset($_POST['takeMod']) && $_POST['takeMod'] == $arrayItems[$i]->getId()) {
                                echo"<tr>
                                <form action='modify.php' method='post'>
                                    <td> <p>{$arrayItems[$i]->getId()}          </p>                                                    </td> 
                                    <td> <input type='text' name='takeModName'     value='{$arrayItems[$i]->getName()}'>                </td>
                                    <td> <input type='text' name='takeModQuantity' value='{$arrayItems[$i]->getQuantity()}'>            </td>
                                    <td> <input type='text' name='takeModPrice'    value='{$arrayItems[$i]->getPrice()}'>               </td>
                                    <input type='hidden'  name='takeModId' value='{$arrayItems[$i]->getId()}'> 
                                    <input type='hidden'  name='ModPro' value='Yes'> 
                                    <td> <input type='submit' value='OK'>                                                               </td>
                                </form>
                                <form action='modify.php' method='post'>
                                    <input type='hidden'  name='noTakeMod' value='Yes'> 
                                    <input type='hidden'  name='ModPro' value='No'> 
                                    <td> <input type='submit' value='X'>                                                                </td>
                                </tr>";
                            }
                            else {
                                echo"<tr align='center'>
                                    <td> <p>{$arrayItems[$i]->getId()}          </p>                                                    </td> 
                                    <td> <p>{$arrayItems[$i]->getName()}        </p>                                                    </td>
                                    <td> <p>{$arrayItems[$i]->getQuantity()}    </p>                                                    </td>
                                    <td> <p>{$arrayItems[$i]->getPrice()}       </p>                                                    </td>
                                    <td> <p>".CalculateTotalPriceProduct($i)."  </p>                                                    </td>
                                <form action='modify.php' method='post'>
                                    <input type='hidden'  name='takeMod' value='{$arrayItems[$i]->getId()}'> 
                                    <td> <input type='submit' value='Modify'>                                                           </td>
                                </form>
                                </tr>";
                            }
                        }

                        echo"<tr>
                                <td colspan='4'>    <p>"    .CalculateTotalProduct().    "  </p>                                        </td>
                                <td colspan='1'>    <p>" .CalculateTotalPurchasePrice(). "  </p>                                        </td>
                            </tr>

                    </table>";
                }
            }echo $_POST['noTakeMod'];
        ?>
    </body>
</body>
</html>