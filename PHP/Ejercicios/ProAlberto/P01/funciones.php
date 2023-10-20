<?php  
    session_start();
    if (!isset($_SESSION['arrayItems'])) { $_SESSION['arrayItems'] = array(); }
    if (!isset($_SESSION['insertProduct'])) { $_SESSION['insertProduct'] = ""; }
    //$_SESSION['arrayItems'] = array();
    $arrayItems = $_SESSION['arrayItems'];
    $insertProduct = $_SESSION['insertProduct'];
    
    class Item{
        //PROPIEDADES________________________________________________________________
        public $name;
        public $quantity;
        public $price;
        
        
        //CONSTRUCTOR________________________________________________________________
        function __construct($name, $quantity, $price) {
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










    //INDEX
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





    //INSERT
    function insertProduct($name, $quantity, $price) {
        if (isValidName($name)) {
            if (isValidQuantity($quantity)) {
                if (isValidPrice($price)) {
                    $quantity = intval($quantity);
                    $price = floatval($price);
                    array_push($_SESSION['arrayItems'], new Item($name, $quantity, $price));
                    var_export($_SESSION['arrayItems']);
                    return "Producto añadido";
                } return "El precio no es válido";
            } return "La cantidad no es válida";
        } return "El nombre no es válido";
    }



    //isValid
    function isValidName($string) {
        $pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚ]+$/";
        return preg_match($pattern, trim($string));
    }

    function isValidQuantity($int) {
        $pattern = "/^[1-9]\d*$/";
        return preg_match($pattern, trim($int));
    }

    function isValidPrice($numeric) {
        $pattern = "/^[1-9]\d*(\.\d{1,2})?$/";
        return preg_match($pattern, trim($numeric));
    }
?>