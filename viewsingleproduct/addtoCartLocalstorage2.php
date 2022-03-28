<?php

if ($_POST["id"] && !empty($_POST["id"]) && $_POST["qty"] && !empty($_POST["qty"]) ) {
    require "../PDOPHP/queryFunctions.php";
    $ID = $_POST["id"];
    $QTY = $_POST["qty"];
    if (intval($ID) && intval($QTY)) {
        $object = new queryFunctions();
        $row = $object->validateCardproductID($ID);
        if ($row == 1) {
            $validatedArray = array("id"=>$ID,"qty"=> $QTY);
           echo  json_encode($validatedArray);
        }else{
            $errorArray = array("id"=>"Nope");
            echo  json_encode($errorArray);
        }
    } else {
        $errorArray = array("id"=>"Nope");
        echo  json_encode($errorArray);
    }

?>
    
      
    
<?php
}else{
    $errorArray = array("ID"=>"Nope");
    echo  json_encode($errorArray);
}
?>