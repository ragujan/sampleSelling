<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <title>Upload_Samples</title>
</head>

<body>
    <span class="text-white">SampleName</span>
    <input type="text" id="sampleName">
    <span class="text-white">SamplePrice</span>
    <input type="text" id="samplePrice">
    <br>
    <span class="text-white">SampleType</span>
    <select name="" id="sampleType">
        <?php
        require "DB.php";
        $typenamesearch = DB::forsearch("SELECT * FROM sampletype ;");
        $typenum_rows = $typenamesearch->num_rows;
        if ($typenum_rows > 0) {
            for($i=0;$i<$typenum_rows;$i++){
                $typenamerow=$typenamesearch->fetch_assoc();
                $typename=$typenamerow["typeName"];
                $typenameID=$typenamerow["sampleTypeID"];
                ?>
                <option value="<?php echo $typenameID; ?>"><?php echo $typename; ?></option>
            <?php
            }
  
        }
        ?>




    </select>
    <br>
    <div id="mtDIV" class="d-none">
        <span class="text-white">MelodyType2</span>
        <select name="" id="melodyType">
            <option value="m">Mixed</option>
            <option value="m">Guitar</option>
            <option value="d">Piano</option>
        </select>

    </div>

    <br>
    <span class="text-white">Price</span>
    <input type="text" id="samplePrice">
    <br>
    <span class="text-white">File</span>
    <input type="file" id="sampleFile"> <button id="uploadFileOnly">UploadZipFile</button>
    <br>
    <span class="text-white">SampleAudio</span>
    <input type="file" id="sampleAudio"> <button id="uploadAudioOnly">UploadAudioSample</button>
    <br>
    <span class="text-white">Image</span>
    <input type="file" id="sampleImage"> <button id="uploadImageOnly">UploadImage</button>
    <br>
    <button class="text-white" id="uploadbutton">Upload</button>

    <script src="sampleselling2.js"></script>
</body>

</html>