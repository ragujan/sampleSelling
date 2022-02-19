<?php

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

?>