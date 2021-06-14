
<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';
if(isset($_POST["login"])){
 $usr = $_POST["loginuid"];
 $pwd = $_POST["loginpwd"];
 if(empty($usr)||empty($pwd)){
   header("location: ../admin.php?error=emptyinput");
    }else{
    loginAdmin($conn, $usr, $pwd);
    header("location: ../admin.php?error=none");
  }

  }
  if(isset($_POST["signup"])){
      $code = $_POST["code"];
      $usr = $_POST["uid"];
      $pwd = $_POST["pwd"];
      $shop = $_POST["shop"];
      if(empty($usr)||empty($code)||empty($pwd)||empty($shop)){                     //Check if any empty inputs on signup page
        header("location: ../admin.php?error=emptyinput");                                           //Send back to signup page with error
        exit();
      }
      if($code == "123456"){
        createAdmin($conn, $usr, $pwd, $shop);
      }else{
          header("location: ../admin.php?error=wrongcode");
        }
    }
 ?>
