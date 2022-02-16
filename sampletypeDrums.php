<?php
require "PDOPHP/queryFunctions.php";
$pagenumber;
$stopnumber = 0;
$outputpage = 0;
$A;
$object = new queryFunctions();
if (isset($_POST["PG"]) && isset($_POST["SSTN"])) {
    $A = $_POST["PG"];
    $subsampletypenumber = $_POST["SSTN"];
    $melody = $object->subSampleType($subsampletypenumber, $A);

} else if (isset($_POST["PG"])) {

    $A = $_POST["PG"];
    $melody = $object->sampleType(2, $A);

} else {

    $A = 0; 
    $melody = $object->sampleType(2, $A);
    
}

if ($melody[0] == "Nothing") {
?>
    <div class="row">
        <div class="col-12 text-center text-white">
            <h1>Nothing to show here</h1>
        </div>
    </div>
<?php
} else {
?>
    <div id="thesamplecontainer2" class="row thesamplecontainer1  ">
        <div class="col-12">
            <div class="row">
                <?php
                for ($i = 0; $i < count($melody); $i++) {
                    $melodydetails = $melody;
                    $melodyname =  $melodydetails[$i]["Sample_Name"];
                    $melodyprice =  $melodydetails[$i]["SamplePrice"];
                    $melodyID =  $melodydetails[$i]["sampleID"];
                    $imagePath =  $melodydetails[$i]["source_URL"];;
                    $audioPath = $melodydetails[$i]["sampleAudioSrc"];
                ?>
                    <div class="col-lg-3 py-3  col-md-4 offset-md-0 col-10 offset-1">
                        <div class="row">
                            <div class="col-10 beatpackdiv py-lg-3 py-md-2 py-2 offset-1">
                                <div class="row">
                                    <div class="col-12 audiopreviewdiv">
                                        <audio id="audio<?php echo $melodyID ?>" class="audiopreview">
                                            <source src="<?php echo $audioPath; ?>" type="audio/ogg">
                                            <source src="<?php echo $audioPath; ?>" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                        <img src="<?php echo  $imagePath; ?>" class="beatPACKIMAGE" alt="">
                                        <img id="playmusic<?php echo $melodyID ?>" onclick="playmusic('<?php echo $melodyID ?>');" class="playcolrols audiopreview" src="BrymoImages/play-button.png" alt="">
                                        <img id="pausemusic<?php echo $melodyID ?>" onclick="pausemusic('<?php echo $melodyID ?>');" class="playcolrols audiopreview d-none" src="BrymoImages/pause.png" alt="">
                                    </div>
                                    <div class="col-12 pt-2">
                                        <div class="row">
                                            <div class="col-6 pt-2 text-center">
                                                <span class="sampleName"><?php echo $melodyname; ?></span>
                                            </div>
                                            <div class="col-6 pt-2 text-center">
                                                <span class="sampleName text-danger"><?php echo $melodyprice; ?></span>
                                            </div>
                                            <div class="col-12  py-2 d-grid col-md-6 text-center">
                                                <button class="cartBTN py-lg-2 py-sm-1">Cart</button>
                                            </div>
                                            <div class="col-12  py-2 d-grid col-md-6 text-center">
                                                <button class="buyBTN py-lg-2 py-sm-1" onclick="viewbuy('<?php echo $melodyID ?>')">Buy</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>


    </div>
<?php
}

?>