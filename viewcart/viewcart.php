<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.css">
    <link rel="stylesheet" href="../style/sampleselling.css">
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="../style/viewsingleproduct.css">


    <title>Document</title>
</head>

<body style="background-color: black;">
    <div class="container-fluid">
        <div class="col-12">
            <div class="row">
                <!-- <div class="col-12  navbardiv2 py-3">
                    <div class="row">
                        <div class="col-md-4 col-2  text-lg-start text-start ">
                            <img class="sitelogo  " src="../RagImages/RAG JNTransparent.png" alt="">

                        </div>

                        <div class="py-2 col-7 col-md-6">
                            <div class="row">
                                <div class="col-10 text-center col-lg-6 fs-5 offset-1 fw-light offset-lg-3 my-2">
                                    <div class="row">
                                        <div class="col-4 navlinksdiv"><a class="navlinks text-decoration-none " href="../home/home.php">Home</a></div>
                                        <div class="col-4 navlinksdiv"><a class="navlinks text-decoration-none" href="../showsamples/sampleselling.php">Samples</a></div>
                                        <div class="col-4 navlinksdiv"><a class="navlinks text-decoration-none" href="#">Contact</a></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="py-2 col-3 col-sm-2">
                            <div class="row">
                                <div class="col-6  my-2 fs-4">
                                    <a href="#" class="checkOutBag"> <i class="text-white bi bi-bag ">
                                            <h5 id="cartItems" class=" cartItems">8</h5>
                                        </i></a>

                                </div>
                                <div class="col-6 my-2 fs-4">
                                    <a href="#" class=""> <i class="text-white bag2 bi bi-person-check"></i>

                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
              <?php
             require "../siteHeader/header.php";
              ?>
              <div id="cartItems d-none"></div>
                <div class="col-lg-9 col-12  showCartItemsDiv">
                    <div id="cartRowHolder" class="row">

                    </div>
                </div>
                <div class="col-lg-3 col-12 showTotalAmountDiv" >
                    <div class="row">
                        <div class=" py-3 px-4 col-12 offset-0 d-flex flex-row justify-content-lg-between justify-content-center">
                            <span class="text-white">Sub Total</span>
                            <span class="text-white" >$ <span id="subTotalValue"></span></span>
                        </div>
                        <div class=" pt-1 pb-4 px-4 col-12 offset-0 d-flex flex-row justify-content-center">
                            <button class="checkOutButton w-75 py-2" > Check Out</button>
                        </div>
                        <div class=" py-1 px-1 col-12 offset-0 d-flex flex-row justify-content-center">
                            <span class="text-white checkOutDescription">Shipping, taxes, and discount codes calculated at checkout.</span>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
<script src="viewcart.js"></script>
</html>