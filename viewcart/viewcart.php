<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.css">
    <link rel="stylesheet" href="../style/sampleselling.css">
    <link rel="stylesheet" href="../style/viewsingleproduct.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <title>Document</title>
</head>

<body style="background-color: black;">
    <div class="container-fluid">
        <div class="col-12">
            <div class="row">
                <div class="col-12  navbardiv2 py-3">
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
                </div>

                <div class="col-12 showCartItemsDiv">
                    <div id="cartRowHolder" class="row">

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="viewcart.js"></script>
</html>