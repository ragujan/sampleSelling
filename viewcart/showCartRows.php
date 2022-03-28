<?php
if ($_POST["cartArrays"] && !empty($_POST["cartArrays"])) {
    require "../PDOPHP/queryFunctions.php";
    $object = new queryFunctions();
    $a  = $_POST["cartArrays"];
    $b = json_decode($a);
    $idQtyArray = [];
    foreach($b as $c){
       // print_r($c->id);
        
        if(intval($c->id) && intval($c->qty) ){
            $id= $c->id;
            $qty = $c ->qty;
            $count = $object ->checkCartrows($id);
            if($count ==1){
                
                $rowArray =$object->showCartRows($id);
                ?>

                <?php
            }else{
                echo "Nope";
            }
            
        }
    }
    
}
