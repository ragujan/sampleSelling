

<?php
require "queryFunctions.php";

$object = new queryFunctions();

$melody = $object->sampleType(1, 12);

if (count($melody) == 0) {
    $melodydetails = $melody;
    print_r($melodydetails);
} else {
    for ($i = 0; $i < count($melody); $i++) {
        $melodydetails = $melody;
        $melodyname =  $melodydetails[$i]["Sample_Name"];
        $melodyprice =  $melodydetails[$i]["SamplePrice"];
        $melodyID =  $melodydetails[$i]["sampleID"];
        $imagePath =  $melodydetails[$i]["source_URL"];;
        $audioPath = $melodydetails[$i]["sampleAudioSrc"];
    }
}

class PageButtons
{
    public function produceBtns($totalpages, $currentPage, $buttonPerPages)
    {
        $A = $currentPage;
        if (($A - 2) < 0) {
        } else {
?>
            <div class="col  text-center  d-grid ">
                <button id="prev" class=" nextButton" onclick="nextfunctionmelody('<?php echo ($A - 2); ?>',null);"><?php echo $A - 1; ?></button>
            </div>

        <?php
        }
        if (($A - 1) < 0) {
        } else {
        ?>

            <div class="col  text-center  d-grid ">
                <button id="prev" class=" nextButton" onclick="nextfunctionmelody('<?php echo ($A - 1); ?>',null);"><?php echo $A; ?></button>
            </div>
        <?php
        }
        ?>

        <div class="col  text-center  d-grid ">
            <button id="prev" class="bg-danger nextButton" onclick="nextfunctionmelody('<?php echo ($A); ?>',null);"><?php echo $A + 1; ?></button>
        </div>

        <?php
        if (($A + 1) >= $totalpages) {
        } else {
        ?>
            <div class="col  text-center  d-grid ">
                <button id="prev" class=" nextButton" onclick="nextfunctionmelody('<?php echo ($A + 1); ?>',null);"><?php echo $A + 2; ?></button>
            </div>

        <?php
        }
        if (($A + 2) >= $totalpages) {
        } else {
        ?>

            <div class="col  text-center  d-grid ">
                <button id="prev" class=" nextButton" onclick="nextfunctionmelody('<?php echo ($A + 2); ?>',null);"><?php echo $A + 3; ?></button>
            </div>
        <?php
        }
        ?>

<?php

    }
}



