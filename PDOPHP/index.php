<?php


require "queryFunctions.php";

$object = new queryFunctions();
$ab= $object -> getSamples();


// for ($i=0; $i < count($ab) ; $i++) { 
//     echo $ab[$i][1];
//     echo "</br>";
//     echo "</br>";
// }
$bc =$object->subSampleType(1,2);
print_r($bc);
echo "</br>";
echo "</br>";
echo "</br>";
echo count($bc);
for($i=0; $i <count($bc);$i++){
    echo $bc[$i][1];
    echo "</br>";
    echo "</br>";
}
echo "</br>";
echo "</br>";
$melody = $object -> sampleType(1,0);
print_r($melody);
echo "</br>";
echo "</br>";
echo "</br>";
echo count($bc);
for($i=0; $i <count($melody);$i++){
    echo $melody[$i][1];
    echo "</br>";
    echo "</br>";
}