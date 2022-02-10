<?php
require "DB.php";
class SampleShow{


    
public $pagenumber;
public $subsampletypenumber;
// if (isset($_POST["PG"]) && isset($_POST["SSTN"]) ) {
//     $subsampletypenumber=$_POST["SSTN"];
  
//     $predictnumofrows = DB::forsearch("SELECT * FROM  samples 
//     WHERE samples.SubsampleID='".$subsampletypenumber."';");
    
//     $numofrows = $predictnumofrows->num_rows;

//     $receivednumber = $_POST["PG"];

//     $stopnumber = ceil($numofrows / 8);
    
//     if ($receivednumber <= 0) {
//         $receivednumber = 0;
//         $pagenumber = ($receivednumber) * 8;
//     } else if ($receivednumber >= $stopnumber) {
//         $pagenumber = (($stopnumber - 1) * 8);
//         $receivednumber = $stopnumber - 1;
//     } else {

//         $pagenumber = ($receivednumber) * 8;
//     }
// } else {
//     $receivednumber = 0;
//     $pagenumber = $receivednumber;
// }
//  $resultsperpage = 8;

// ?>

<div id="thesamplecontainer1" class="row thesamplecontainer1  ">
    <div class="col-12 appear">
        <div class="row">
            <?php
            $getMelodies = DB::forsearch("SELECT * FROM  
            samples WHERE samples.SubsampleID='".$subsampletypenumber."' LIMIT 8 OFFSET $pagenumber;");
            $getMelodiesrows = $getMelodies->num_rows;
            if ($getMelodiesrows >= 1) {
                for ($i = 0; $i < $getMelodiesrows; $i++) {
                    $melodydetails = $getMelodies->fetch_assoc();
                    $melodyname = $melodydetails["Sample_Name"];
                    $melodyprice = $melodydetails["SamplePrice"];
                    $melodyID = $melodydetails["sampleID"];
                    $getImage = DB::forsearch("SELECT * FROM 
                    `sampleimages` WHERE `sampleID`='" . $melodyID . "' ;");
                    $getImagepath = $getImage->fetch_assoc();
                    $imagePath = $getImagepath["source_URL"];
                    $getaudio = DB::forsearch("SELECT * FROM 
                    `sampleaudio` WHERE `sampleID`='" . $melodyID . "' ;");
                    $getaudiopathrow = $getaudio->fetch_assoc();
                    $audioPath = $getaudiopathrow["sampleAudioSrc"];
            ?>
                    <div class="col-lg-3 py-3   col-6 col-md-4 ">
                        <div class="row">
                            <div class="col-10 beatpackdiv py-lg-3 py-md-2 py-1 offset-1">
                                <div class="row">
                                    <div class="col-12 audiopreviewdiv">
                                        <img src="<?php echo  $imagePath; ?>" class="beatPACKIMAGE" alt="">
                                         <img id="playmusic<?php echo $melodyID ?>" onclick="playmusic('<?php echo $melodyID ?>');" class="playcolrols audiopreview" src="BrymoImages/play-button.png" alt="">
                                         <img id="pausemusic<?php echo $melodyID ?>" onclick="pausemusic('<?php echo $melodyID ?>');" class="playcolrols audiopreview d-none" src="BrymoImages/pause.png" alt="">
                                        <audio id="audio<?php echo $melodyID ?>" class="audiopreview ">
                                            <source src="<?php echo $audioPath; ?>" type="audio/ogg">
                                            <source src="<?php echo $audioPath; ?>" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                      
                                    </div>
     
                                    <div class="col-12 pt-2">
                                        <div class="row">
                                            <div class="col-6 pt-2 text-center">
                                                <span class="sampleName"><?php echo $melodyname; ?></span>
                                            </div>
                                            <div class="col-6 pt-2 text-center">
                                                <span class="sampleName text-danger">666 $</span>
                                            </div>
                                            <div class="col-12  pt-2 d-grid col-md-6 text-center">
                                                <button class="cartBTN py-lg-2 py-sm-1">Cart</button>
                                            </div>
                                            <div class="col-12  pt-2 d-grid col-md-6 text-center">
                                                <button class="buyBTN py-lg-2 py-sm-1">Buy</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "Nothing to show here";
            }
            ?>
        </div>
    </div>

    <div class="col-12 py-5 text-center navbuttons">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="row">
                    <div class="col-2  text-center bg-success d-grid ">
                        <button id="prev" class="text-dark" onclick="nextfunctionmelody('<?php echo $receivednumber - 1; ?>','<?php echo $subsampletypenumber;?>');">Prev</button>
                    </div>
                    <div class="col-8">
                        <?php
                        for ($i = 0; $i < $stopnumber; $i++) {
                        ?>
                            <button id="prev" class="text-dark" onclick="nextfunctionmelody('<?php echo ($i); ?>','<?php echo $subsampletypenumber;?>');"><?php echo ($i + 1); ?></button>

                        <?php
                        }
                        ?>
                    </div>

                    <div class="col-2  text-center bg-success d-grid">
                        <button id="next" class="text-dark" onclick="nextfunctionmelody('<?php echo $receivednumber + 1; ?>','<?php echo $subsampletypenumber;?>');"><?php echo  $receivednumber; ?></button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
}

?>