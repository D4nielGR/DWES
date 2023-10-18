<?php
    session_start();
    if (!isset($_SESSION['arrayItems'])) { $_SESSION['arrayItems'] = array(); }
    $arrayItems = $_SESSION['arrayItems'];
    
    $item1 = new Item("Manzana", 30, 1);
    $item2 = new Item("Plátano", 20, 2);
    array_push($arrayItems, $item1, $item2);

    class Item{
        public $name;
        public $quantity;
        public $price;
        function __construct($name ,$quantity ,$price) {
            $this->name = $name;
            $this->quantity = $quantity;
            $this->price = $price;
        }
        function getName() { return $this->name; }
        function getQuantity() { return $this->quantity; }
        function getPrice() { return $this->price; }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DressFruits</title>
</head>
<body>
    <header>
        <div class="Navbar">
            <div>   <a href="index.php">  <p>Show List</p>  </a>    </div>
            <div>   <a href="insert.php"> <p>Insert</p>     </a>    </div>
            <div>   <a href="modify.php"> <p>Modify</p>     </a>    </div>
            <div>   <a href="delete.php"> <p>Delete</p>     </a>    </div>
        </div>
    </header>

    <body>
        <table border="2px" align="center">
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>

            <?php
                //<tr> 
                $totalItem = 0;
                for ($i = 0; $i < count($arrayItems); $i++) {
                    $total = $arrayItems[$i]->getQuantity() * $arrayItems[$i]->getPrice();
                    $totalItem += $total;

                    echo("<tr align='center'>");
                        echo ("<td> <p>{$arrayItems[$i]->getName()}</p> </td>");
                        echo ("<td> <p>{$arrayItems[$i]->getQuantity()}</p> </td>");
                        echo ("<td> <p>{$arrayItems[$i]->getPrice()}</p> </td>");
                        echo ("<td> <p>{$total}</p> </td>");
                    echo("</tr>");
                }
                //</tr>
            ?>
            
            <tr>
                <td colspan="3">
                    <p> <?php $items = count($arrayItems);
                            if ($items == 1) { echo "Hay $items producto"; } 
                            else { echo "Hay $items productos"; }
                        ?> 
                    </p>
                </td>
                <td>
                    <p> <?php echo $totalItem?> </p>
                </td>
            </tr>
        </table>

    </body>
</body>
</html>