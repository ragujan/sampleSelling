<?php

class PageButtons
{
    
    public function produceRough($totalpages,$currentPage, $subSampleType,$functionName){
        $A = $currentPage;
        
        ?>
        <div class="col  text-center  d-grid ">
            <button id="prev" class=" nextButton" onclick="<?php echo $functionName; ?>('<?php echo $currentPage+1  ?>','<?php echo $subSampleType  ?>');"><?php echo $A + 1; ?></button>
        </div>

    <?php
    }
    public function produceBtns($totalpages, $currentPage, $subSampleType,$functionName)
    {
        $A = $currentPage;
      
?>   
        <div class="col  text-center  d-grid ">
            <button id="prev" class=" nextButton" onclick="<?php echo $functionName; ?>('<?php echo ($A - 1); ?>','<?php echo $subSampleType ?>');"><?php echo "Prev"; ?></button>
        </div>
        <?php
        if (($A - 2) < 0) {
        } else {
        ?>
            <div class="col  text-center  d-grid ">
                <button id="prev" class=" nextButton" onclick="<?php echo $functionName; ?>('<?php echo ($A - 2); ?>','<?php echo $subSampleType ?>');"><?php echo $A - 1; ?></button>
            </div>

        <?php
        }
        if (($A - 1) < 0) {
        } else {
        ?>

            <div class="col  text-center  d-grid ">
                <button id="prev" class=" nextButton" onclick="<?php echo $functionName; ?>('<?php echo ($A - 1); ?>','<?php echo $subSampleType ?>');"><?php echo $A; ?></button>
            </div>
        <?php
        }
        ?>

        <div class="col  text-center  d-grid ">
            <button id="prev" class="bg-danger nextButton" onclick="<?php echo $functionName; ?>('<?php echo ($A); ?>','<?php echo $subSampleType ?>');"><?php echo $A + 1; ?></button>
        </div>

        <?php
        if (($A + 1) >= $totalpages) {
        } else {
        ?>
            <div class="col  text-center  d-grid ">
                <button id="prev" class=" nextButton" onclick="<?php echo $functionName; ?>('<?php echo ($A + 1); ?>','<?php echo $subSampleType ?>');"><?php echo $A + 2; ?></button>
            </div>

        <?php
        }
        if (($A + 2) >= $totalpages) {
        } else {
        ?>

            <div class="col  text-center  d-grid ">
                <button id="prev" class=" nextButton" onclick="<?php echo $functionName; ?>('<?php echo ($A + 2); ?>','<?php echo $subSampleType ?>');"><?php echo $A + 3; ?></button>
            </div>
        <?php
        }

        ?>
        <div class="col  text-center  d-grid">
            <button id="next" class=" nextButton" onclick="<?php echo $functionName; ?>('<?php echo ($A + 1); ?>','<?php echo $subSampleType ?>');"><?php echo "Next"; ?></button>
        </div>

<?php

    }
    public function produceSearchBtns($totalpages, $currentPage, $subSampleType)
    {
        $A = $currentPage;
?>
        <div class="col  text-center  d-grid ">
            <button id="prev" class=" nextButton" onclick="nextfunctionsearch('<?php echo ($A - 1); ?>','<?php echo $subSampleType ?>');"><?php echo "Prev"; ?></button>
        </div>
        <?php
        if (($A - 2) < 0) {
        } else {
        ?>
            <div class="col  text-center  d-grid ">
                <button id="prev" class=" nextButton" onclick="nextfunctionsearch('<?php echo ($A - 2); ?>','<?php echo $subSampleType ?>');"><?php echo $A - 1; ?></button>
            </div>

        <?php
        }
        if (($A - 1) < 0) {
        } else {
        ?>

            <div class="col  text-center  d-grid ">
                <button id="prev" class=" nextButton" onclick="nextfunctionsearch('<?php echo ($A - 1); ?>',<?php echo $subSampleType ?>);"><?php echo $A; ?></button>
            </div>
        <?php
        }
        ?>

        <div class="col  text-center  d-grid ">
            <button id="prev" class="bg-danger nextButton" onclick="nextfunctionsearch('<?php echo ($A); ?>',<?php echo $subSampleType ?>);"><?php echo $A + 1; ?></button>
        </div>

        <?php
        if (($A + 1) >= $totalpages) {
        } else {
        ?>
            <div class="col  text-center  d-grid ">
                <button id="prev" class=" nextButton" onclick="nextfunctionsearch('<?php echo ($A + 1); ?>',<?php echo $subSampleType ?>);"><?php echo $A + 2; ?></button>
            </div>

        <?php
        }
        if (($A + 2) >= $totalpages) {
        } else {
        ?>

            <div class="col  text-center  d-grid ">
                <button id="prev" class=" nextButton" onclick="nextfunctionsearch('<?php echo ($A + 2); ?>',<?php echo $subSampleType ?>);"><?php echo $A + 3; ?></button>
            </div>
        <?php
        }

        ?>
        <div class="col  text-center  d-grid">
            <button id="next" class=" nextButton" onclick="nextfunctionsearch('<?php echo ($A + 1); ?>',<?php echo $subSampleType ?>);"><?php echo "Next"; ?></button>
        </div>

<?php

    }
}
// $P = new PageButtons();
// $a = $P ->produceBtns(6,2,3,"null");
?>