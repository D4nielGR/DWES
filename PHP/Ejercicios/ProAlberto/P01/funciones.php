<?php  
    session_start();

    //arrayIrems
    if (!isset($_SESSION['arrayItems'])) { $_SESSION['arrayItems'] = array(); }
    //$_SESSION['arrayItems'] = array();
    sort($_SESSION['arrayItems']);
    $arrayItems = $_SESSION['arrayItems'];


    //String insert/delete/modify
    if (!isset($_SESSION['insertProduct'])) { $_SESSION['insertProduct'] = ""; }    $insertProduct = $_SESSION['insertProduct'];
    if (!isset($_SESSION['deleteProduct'])) { $_SESSION['deleteProduct'] = ""; }    $deleteProduct = $_SESSION['deleteProduct'];
    if (!isset($_SESSION['modifyProduct'])) { $_SESSION['modifyProduct'] = ""; }    $modifyProduct = $_SESSION['modifyProduct'];
    if (!isset($_SESSION['takeMod']))       { $_SESSION['takeMod'] = ""; }          $takeMod = $_SESSION['takeMod'];
    
    



    class Item{
        //PROPIEDADES________________________________________________________________
        public $id;
        public $name;
        public $quantity;
        public $price;
        
        
        //CONSTRUCTOR________________________________________________________________
        function __construct($name, $quantity, $price) {
            $arrayItems = $_SESSION['arrayItems'];

            if (empty($arrayItems)) { $this->id = 1; }
            else {
                for ($i = 1; $i <= count($arrayItems); $i++) {
                    if ($arrayItems[$i-1]->getId() != ($i)) {
                        $this->id = $i;
                        break;
                    } else { $this->id = $i + 1; }
                }
            }
            $this->name = $name;
            $this->quantity = $quantity;
            $this->price = $price;
        }


        //MÉTODOS____________________________________________________________________
        //SET
        function setId($id) { $this->id = $id; }
        function setName($name) { $this->name = $name; }
        function setQuantity($quantity) { $this->quantity = $quantity; }
        function setPrice($price) { $this->price = $price; }
        //GET
        function getId() { return $this->id; }
        function getName() { return $this->name; }
        function getQuantity() { return $this->quantity; }
        function getPrice() { return $this->price; }
    }










    //TABLE
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

                    return "Producto añadido";
                } return "El precio no es válido";
            } return "La cantidad no es válida";
        } return "El nombre no es válido";
    }





    //DELETE
    function eliminaElemento($ele) {
        $arrayItems = $_SESSION['arrayItems'];

        for ($i = 0; $i < count($arrayItems); $i++) {
            if ($arrayItems[$i]->getId() == $ele) { 
                $prodel = "Producto eliminado  Id='".$arrayItems[$i]->getId()."' 
                                                Name='".$arrayItems[$i]->getName()."' 
                                                Quantitiy='".$arrayItems[$i]->getQuantity()."' 
                                                Price='".$arrayItems[$i]->getPrice()."'";
                unset($arrayItems[$i]); 
                $_SESSION['arrayItems'] = array_values($arrayItems);
                print_r($arrayItems);
        
                return $prodel;
            }
        }
    }





    //MODIFY
    function modifyValues($id, $name, $quantity, $price) {
        if (isValidName($name)) {
            if (isValidQuantity($quantity)) {
                if (isValidPrice($price)) {
                    $quantity = intval($quantity);
                    $price = floatval($price); 


                    $arrayItems = $_SESSION['arrayItems'];

                    for ($i = 0; $i < count($arrayItems); $i++) {
                        if ($id == $arrayItems[$i]->getId()) {
                            $arrayItems[$i]->setName($name);
                            $arrayItems[$i]->setQuantity($quantity);
                            $arrayItems[$i]->setPrice($price);
                        }
                    }

                    return "Producto modificado";
                } return "Producto no modificado: El precio no es válido";
            } return "Producto no modificado: La cantidad no es válida";
        } return "Producto no modificado: El nombre no es válido";
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
            $pattern = "/^((0\.((0[1-9])|([1-9]\d{0,1})))|([1-9]\d*(\.\d{1,2})?))$/";
            return preg_match($pattern, trim($numeric));
        }
?>