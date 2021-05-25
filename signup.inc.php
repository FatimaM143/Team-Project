<?php
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdrepeat"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

//error checks
  if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){                     //Check if any empty inputs on signup page
    header("location: ../signup.php?error=emptyinput");                                           //Send back to signup page with error
    exit();
  }
  if(invalidUid($username) !== false){                                                             //Check if username is valid
    header("location: ../signup.php?error=invaliduid");
    exit();
  }
  if(invalidEmail($email) !== false){                                                              //Check if Email is valid
    header("location: ../signup.php?error=invalidemail");
    exit();
  }
  if(pwdMatch($pwd, $pwdRepeat) !== false){                                                        //Check if both passwords are the same
    header("location: ../signup.php?error=passwordsdiffer");
    exit();
  }
  if(uidExists($username, $conn) !== false){                                                      //Check if unique username
    header("location: ../signup.php?error=usernametaken");
    exit();
  }
  if(pwdStrong($pwd) !== false){                                                                //Check if password is secure
    header("location: ../signup.php?error=weakpassword");
    exit();
  }

  createUser($conn, $name, $email, $username, $pwd)
}else {
  header("location: ../signup.php");
}








 ?>
