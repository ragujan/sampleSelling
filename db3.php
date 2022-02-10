<?php
$g=$_POST["A"];
$data = ['name' => $g,'race' => 'Human'];

echo json_encode($data);
?>