<div class="col-12 py-5 text-center navbuttons">
    <div class="row">
        <div class="col-lg-6 offset-lg-3 col-12 offset-0">
            <div class="row">
                <div class="col-2  text-center  d-grid ">
                    <button id="prev" class=" nextButton" onclick="nextfunctionmelody('<?php echo $realreceivednumber  - 1; ?>',null);"><?php echo $realreceivednumber - 1; ?></button>
                </div>
                <div class="col-8">
                    <?php
                    for ($i = 0; $i < $stopnumber; $i++) {
                    ?>
                        <button id="prev" class=" nextButton" onclick="nextfunctionmelody('<?php echo ($i); ?>',null);"><?php echo ($i); ?></button>

                    <?php
                    }
                    ?>
                </div>

                <div class="col-2  text-center  d-grid">
                    <button id="next" class=" nextButton" onclick="nextfunctionmelody('<?php echo $realreceivednumber  + 1; ?>',null);"><?php echo $realreceivednumber  + 1; ?></button>
                </div>
            </div>
        </div>
    </div>

</div>