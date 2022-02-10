<?php
require "DB.php";

if (isset($_FILES["SF"])) {
    $fileHandlerforzip = new FileHandler();
    $fileHandlerforzip->filedetails($_FILES["SF"], "samples", "50000000", "zip");

} else if (isset($_FILES["SI"])) {
    $sname = $_POST["SN"];
    $sprice = $_POST["SP"];
    $stype = $_POST["ST"];
    $fileHandlerforzip = new FileHandler();
    $fileHandlerforzip->filedetails($_FILES["SA"], "sampleAudio", "50000000", "wav");

} else if (isset($_FILES["SA"])) {

    $fileHandlerforzip = new FileHandler();
    $fileHandlerforzip->filedetails($_FILES["SI"], "samplesImages", "50000000", "jpg");

}else{
    echo "yeah";
}
class FileHandler
{
    public $thecommonfile;
    public $thefile;

    public function filedetails($thefile, $foldername, $size, $type)
    {

        $file = $thefile;
        $filename = $file["name"];
        $filetype = $file["type"];
        $filesize = $file["size"];
        $filetemp = $file["tmp_name"];

        $unique_name_generated = "{$foldername}/" . uniqid() . $filename;
        $filefullname = explode(".", $filename);
        $format = strtolower(end($filefullname));

        $acceptedtype = array("{$type}");
        $acceptedsize = "{$size}";
        echo $acceptedsize;
        echo "no";
        echo $filesize;
        if (in_array($format, $acceptedtype) === false) {
            $errors[] = "not the expected file format it should be a {$type} file .";
        }

        if ($filesize > $acceptedsize) {
            $errors[] = "File size must be excately {$size} MB";
        }

        if (empty($errors) == true) {
            move_uploaded_file($filetemp, $unique_name_generated);
            echo "success ";
        } else {
            print_r($errors);
        }
    }
}
?>