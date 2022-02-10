<?php
require "DB/DB.php";
$sampleID = $_GET["X"];
$mysearchquery = DB::forsearch("SELECT * FROM `samples` INNER JOIN `sampleimages` 
ON sampleImages.sampleID=samples.sampleID
INNER JOIN `subsampletype`
ON subsampletype.subsampleID=samples.SubsampleID
WHERE samples.sampleID='" . $sampleID . "'  ;");
$searchobject = new SearchClass();
$searchobject->searchqueryinput = $mysearchquery;
$searchobject->search();
$fetchedresults = $searchobject->returnfetch();
$serachfinalrows = $searchobject->returnrows();
$searchedarrays = $searchobject->returnarrays();
$arrsize = count($searchedarrays);
$sampleRow = $searchedarrays[0];
$sampleName = $sampleRow["Sample_Name"];
$samplePrice = $sampleRow["SamplePrice"];
$imagePath = $sampleRow["source_URL"];
$sampleType = $sampleRow["subsampleName"];
$sampleDescription = $sampleRow["SampleDescription"];
$sampleArray = array('ID' => $sampleID, 'name' => $sampleName, 'price' => $samplePrice, 'image' => $imagePath);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=ssss, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="sampleselling.css">
    <link rel="stylesheet" href="viewsingleproduct.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="col-12">
            <div class="row">
                <div class="col-12 ">
                    <div class="row">
                        <div class="col-12  navbardiv py-3">
                            <div class="row">
                                <div class="col-md-4 col-2 text-lg-center text-start ">
                                    <img class="sitelogo  " src="RagImages/RAG JNTransparent.png" alt="">

                                </div>

                                <div class="py-2 col-7 col-md-6">
                                    <div class="row">
                                        <div class="col-10 text-center col-lg-6 fs-5 offset-1 fw-light offset-lg-3 my-2">
                                            <div class="row">
                                                <div class="col-4 navlinksdiv"><a class="navlinks text-decoration-none " href="home.php">Home</a></div>
                                                <div class="col-4 navlinksdiv"><a class="navlinks text-decoration-none" href="sampleselling.php">Samples</a></div>
                                                <div class="col-4 navlinksdiv"><a class="navlinks text-decoration-none" href="#">Contact</a></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="py-2 col-3 col-sm-2">
                                    <div class="row">
                                        <div class="col-6  my-2 fs-4">
                                            <a href="#"> <i class="text-white bi bi-bag"></i></a>

                                        </div>
                                        <div class="col-6 my-2 fs-4">
                                            <a href="#" class=""> <i class="text-white bag2 bi bi-person-check"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 pt-5 ">
                            <div class="row">
                                <div class="text-white col-12 text-center">

                                </div>
                            </div>
                        </div>
                        <div class="col-12 pt-4 thesingleproductcontentdiv">
                            <div class="row">
                                <div class="col-md-4 col-12 py-4 text-center text-lg-end sampleImageDiv">
                                    <img class="sampleImage " src="<?php echo $imagePath; ?>" alt="">
                                </div>
                                <div class="col-md-6  offset-md-1  col-12 py-4 ">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h1 class="sampleheaddiv px-4 pt-2 pb-0 "> <?php echo $sampleName; ?> <div id="borderLeft"></div>
                                            </h1>

                                        </div>
                                        <div class="col-12 text-center">
                                            <h3 class="py-3">Price : $<?php echo $samplePrice ?></h3>
                                        </div>
                                        <div class="col-12 py-2 ">
                                            <h5 class="sampledescription"><?php echo $sampleDescription; ?></h5>
                                        </div>
                                        <div class="col-12 py-lg-5 py-2 py-md-3">
                                            <div class="row gy-3 gy-md-1">
                                                <div class="col-md-6 offset-md-0 col-8 offset-2 d-grid ">

                                                    <button class="cartButton" onclick="addToCart(<?php echo $sampleID; ?>,1);"> Cart </button>
                                                </div>
                                                <div class="col-md-6 offset-md-0 col-8 offset-2 d-grid "> <button class="buyButton">Buy</button>
                                                </div>
                                                
                                            </div>

                                        </div>

                                    </div>


                                </div>
                            </div>


                        </div>
                        <div class="col-12 thefooterdiv">
                            <div class="row">
                                <div class="col-12 text-center pt-4">
                                    <h1 class="cardinfo">We accept</h1>
                                </div>
                                <div class="col-12 py-5">
                                    <div class="row">
                                        <div class="col text-center">
                                            <img src="paymentMethods/1.png" class="paymentmethods" alt="">
                                        </div>
                                        <div class="col text-center">
                                            <img src="paymentMethods/2.png" class="paymentmethods" alt="">
                                        </div>
                                        <div class="col text-center">
                                            <img src="paymentMethods/3.png" class="paymentmethods" alt="">
                                        </div>
                                        <div class="col text-center">
                                            <img src="paymentMethods/4.png" class="paymentmethods" alt="">
                                        </div>
                                        <div class="col text-center">
                                            <img src="paymentMethods/5.png" class="paymentmethods" alt="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="viewsingleproduct.js"></script>
    <script src="cart.js"></script>
</body>

</html>