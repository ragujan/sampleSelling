<?php

$ID = $_POST["ID"];
echo $_POST;
$separtedvalues =explode(" ",$ID);
$first_Value_String = $separtedvalues[0];
$second_Value_String = $separtedvalues[1];
$first_Value_Int  = intval($first_Value_String);
$second_Value_Int = intval($second_Value_String);
if(!$first_Value_String =="0" || !$second_Value_String == "0"){
    if(!intval($first_Value_Int) ==0 && !intval($second_Value_Int) ==0){
        echo $first_Value_Int;
        echo gettype($first_Value_Int);
        echo $second_Value_Int;
        echo gettype($second_Value_Int);
    }else{
         
    }
}else{
      
}

?>