<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <button class="btn btn-danger">Hey</button>
</body>
</html>
<?php


require "queryFunctions.php";

$object = new queryFunctions();



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