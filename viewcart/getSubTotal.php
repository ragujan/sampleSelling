<?php

if(isset($_POST["cartRows"])){
    $cartRows = $_POST["cartRows"];
    $subTotal=0;
    $a= json_decode($cartRows);
    require "../PDOPHP/queryFunctions.php";
    $object = new queryFunctions();
    foreach($a as $c){
        if(intval($c->id) && $c->id>0 && intval($c->qty) && $c->qty>0){
            $pid= $c->id;
            $cartQty = $c->qty;
            $rowArray = $object->showCartRows($pid);
            $rowArray = $rowArray[0];
            $sPrice=  $rowArray["SamplePrice"]*$cartQty;
           
            $subTotal = $subTotal+$sPrice;
          
        }
        
    }
    echo $subTotal;
// print_r($cartRows);  
//    // $cartRowsArrayString =(preg_replace(array('/^\[/','/\]$/'),'',$cartRows));
//    $cartRowsArrayString= preg_replace(array('/^\[{/','/\}]$/'),"",$cartRows );
//     echo $cartRowsArrayString;
//     //{"id":"17","qty":1},{"id":"20","qty":"4"}//
//     $arrayString = '{"id":"17","qty":1},{"id":"20","qty":"4"}';
//    // $carRowsDecode = var_dump(json_decode($arrayString));
//    $arrayReal = explode("},{",$cartRowsArrayString);
//     print_r($arrayReal); 
//     $a = json_encode( $arrayReal[0]);
//      echo ($a);
}
?>