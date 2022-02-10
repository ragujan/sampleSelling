<?php


require "DB.php";

$mysearchquery = DB::forsearch("SELECT * FROM `samples`;");
$searchobject = new SearchClass();
$searchobject->searchqueryinput = $mysearchquery;
$searchedarrays = $searchobject->search();
$arrsize = count($searchedarrays);
for ($i = 0; $i < $arrsize; $i++) {
    
    $sampleID = $searchedarrays[$i]['sampleID'];
    $mysearchquery2 = DB::forsearch("SELECT * FROM `sampleimages` WHERE `sampleID`='" . $sampleID . "' ;");
    $searchobject2 = new SearchClass();
    $searchobject2->searchqueryinput = $mysearchquery2;
    $searchedarrays2 = $searchobject2->search();
    $arrsize2 = count($searchedarrays2);


    echo " ";
    print_r($searchedarrays2);
    echo $searchedarrays2[0]['source_URL'] ;

    // if (isset($_FILES["fileimage"]) && !empty($_FILES["fileimage"])) {
    //     $f = $_FILES["fileimage"]["name"];

    //     echo "<br/>";
    //     echo $_FILES["fileimage"]["name"][$i];
    //     echo "<br/>";
    //     echo "<br/>";
    //     echo $_FILES["fileimage"]["tmp_name"][$i];
    //     $ftempname=$_FILES["fileimage"]["tmp_name"][$i];
    //     unlink($searchedarrays2[0]['source_URL']);
    //     move_uploaded_file($ftempname,$searchedarrays2[0]['source_URL'] );
    //     echo "<br/>";
    //     echo "<br/>";
    //     echo $searchedarrays2[0]['source_URL'];

    // } else {
    //     echo "Nope";
    //     echo "<br/>";
    //     echo "<br/>";
    // }


    echo "<br/>";
    echo "<br/>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="allsameimages.php" method="POST" enctype="multipart/form-data">
        <input type="file" multiple="multiple" name="fileimage[]">
        <button type="submit"> Submit</button>
    </form>
</body>

</html>