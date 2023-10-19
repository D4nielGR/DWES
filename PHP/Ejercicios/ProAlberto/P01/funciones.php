<?php  
    session_start();
    if (!isset($_SESSION['arrayItems'])) { $_SESSION['arrayItems'] = array(); }
    $_SESSION['arrayItems'] = array();
    $arrayItems = $_SESSION['arrayItems'];
    $item1 = new Item("Manzana", 30, 1); $item2 = new Item("Plátano", 20, 2); $item3 = new Item("Peras", 10, 3);
    array_push($arrayItems, $item1, $item2, $item3);
    $_SESSION['arrayItems'] = $arrayItems;
    
    class Item{
        //PROPIEDADES________________________________________________________________
        public $name;
        public $quantity;
        public $price;
        
        
        //CONSTRUCTOR________________________________________________________________
        function __construct($name ,$quantity ,$price) {
            $this->name = $name;
            $this->quantity = $quantity;
            $this->price = $price;
        }


        //MÉTODOS____________________________________________________________________
        //SET
        function setName($name) { $this->name = $name; }
        function setQuantity($quantity) { $this->quantity = $quantity; }
        function setPrice($price) { $this->price = $price; }
        //GET
        function getName() { return $this->name; }
        function getQuantity() { return $this->quantity; }
        function getPrice() { return $this->price; }
    }










    function CalculateTotalProduct() {
        $arrayItems = $_SESSION['arrayItems'];

        if(count($arrayItems) == 1) { return "Hay disponible 1 producto"; }
        else if(count($arrayItems) != 1 && 0 < count($arrayItems)) { return "Hay disponible ".count($arrayItems)." productos"; }
    }

    function CalculateTotalPriceProduct($position) {
        $arrayItems = $_SESSION['arrayItems'];
        
        return  $arrayItems[$position]->getQuantity() * $arrayItems[$position]->getPrice();
    }

    function CalculateTotalPurchasePrice() {
        $arrayItems = $_SESSION['arrayItems'];

        $totalPurchasePrice = 0;
        for ($i = 0; $i < count($arrayItems); $i++) {
            $total = $arrayItems[$i]->getQuantity() * $arrayItems[$i]->getPrice();
            $totalPurchasePrice += $total;
        }
        return $totalPurchasePrice;
    }
?>