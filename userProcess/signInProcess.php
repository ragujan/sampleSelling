<?php
if ( isset($_POST["PWD"]) && isset($_POST["EM"])) {
    $password = $_POST["PWD"];
    $email = $_POST["EM"];
    require "../userProcess/signInUserValidate.php";
   
    $validate = new signInUserValidate($password, $email);
    if ($validate->emptyCheck() == false  ) {
      exit("Empty Input Fields");
        
    }else  if ( $validate->checkEmail() == false) {
       exit("Not a Valid Email");
        
    } else {
      
        require "../userProcess/CheckUser.php";
        $checkUser = new CheckUser();
        $signInFunction =  $checkUser->signInUsers($password,$email);
        if($signInFunction ==true){
            if(isset($_SESSION["userEmail"])){
                echo "resetSessionExits";
            }
           // $_SESSION["signInEmail"];
            echo "Success";
        }
     
    }
} else {
  
    exit("DO DO DOOO");
}
