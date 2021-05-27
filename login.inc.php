

<?php
if(isset($_POST["submit"])) {
 $email = $_POST["uid"];
 $pwd = $_POST["pwd"];
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if(emptyInputLogin($email, $pwd) !== false){                     //Check if any empty inputs on signup page
    header("location: ../login.php?error=emptyinput");                                           //Send back to signup page with error
    exit();
    }
    loginUser($conn, $email, $pwd);
  }else{
    header("location: ../login.php");
    exit();
  }
 ?>
