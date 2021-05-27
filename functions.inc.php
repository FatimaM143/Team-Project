<?php
/*All error Fucntions return true if error is detected
First check for any empty inputs
*/
function emptyInputSignup ($name, $email, $username, $pwd, $pwdRepeat) {
  $result;
  if(empty($name)||empty($email)||empty($username)||empty($pwd)||empty($pwdRepeat)) {
    $result = true;
    }
    else {
      $result = false;
    }
    return $result;
}
/*Check for invalid characters in username
Function returns true if the username contains other charachters than the ones contained in []
*/
function invalidUid($username) {
  $result;
  if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    $result = true;
    }
    else {
      $result = false;
    }
    return $result;
}
/*Check for invalid email
Uses inbuilt function to validate format of the email
*/
function invalidEmail($email) {
  $result;
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
    }
  else {
      $result = false;
    }
    return $result;
}
/*Check that the given passwords match
*/
function pwdMatch($pwd, $pwdRepeat) {
  $result;
  if($pwd !== $pwdRepeat) {
    $result = true;
    }
  else {
      $result = false;
    }
    return $result;
}
/*Check that the username is not already taken
Using SQL queiry on the database
Also allows us to grab user data for login
*/
function uidExists($conn, $username, $email) {
  $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";          //Create SQL queiry
  $stmt = mysqli_stmt_init($conn);                                        //prepared statement to prevent SQLinjection attacks
  if (!mysqli_stmt_prepare($stmt, $sql)) {                                //run sql in the database and check for errors
    header("location: ../signup.php?error=stmtfailed");                       //Return to signup page if error occurs
    exit();
  }
  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);                                             //Attempting to grab data from database
  $returndata = mysqli_stmt_get_result($stmt);
  if(mysqli_fetch_assoc($returndata)) {                                         //If data found that matches input data then account already exists
     if($row = mysqli_fetch_assoc($returndata)) {                               //Grabbing data from table so we can use this function to login aswell
       return $row;
     }
  }
  else{                                                                         //No data is found so username is free to be used
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}
/*Check for a strong password
*/
function pwdStrong($pwd) {
  $result;
  $uppercase = preg_match('@[A-Z]@', $pwd);                                         //Use preg_match function to check pwd contains upper & lower case, and a number
  $lowercase = preg_match('@[a-z]@', $pwd);
  $number    = preg_match('@[0-9]@', $pwd);
  if(strlen($pwd) < 8 || !$uppercase || !$lowercase || !$number) {
    $result = true;
  }else{
    $result = false;
  }
  return $result;
}
/*Sign up the user
*/
function createUser($conn, $name, $email, $username, $pwd) {
  $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";          //SQL statement to insert new user into table
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {                                                         //Error check first
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }
  $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT);                                                                           //inbuilt PHP hashing algo
  mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../index.php?error=none");
  exit();
}
/*Check for empty input on login
*/
function emptyInputLogin ($username, $pwd) {
  $result;
  if(empty($username)||empty($pwd)) {
    $result = true;
    }
    else {
      $result = false;
    }
    return $result;
}
/*Log in user
*/
function loginUser($conn, $email, $pwd) {
  $sql = "SELECT * FROM users WHERE usersEmail = ?;";                         //Create SQL queiry with placeholder
  $stmt = mysqli_stmt_init($conn);                                           //prepared statement to prevent SQLinjection attacks
  if (!mysqli_stmt_prepare($stmt, $sql)) {                                  //run sql in the database and check for errors
    header("location: ../login.php?error=stmtfailed");                     //Return to signup page if error occurs
    exit();
  }
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);                                             //Attempting to grab data from database
  $returndata = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($returndata);
  if(!isset($row['usersEmail']))
  {
    header("location: ../login.php?error=incorrectEmail");
  }else{
     $pwdHashed = $row['usersPwd'];
     $checkPwd = password_verify($pwd, $pwdHashed);
     mysqli_stmt_close($stmt);
  if($checkPwd === false){                                                 //if passwords dont match(returns false), return user to login page and display error
    header("location: ../login.php?error=incorrectpassword");
  }else if ($checkPwd === true){
    session_start();                                                    //if passwords match begin a session for that user
    $_SESSION["Username"] = $row['usersId'];
    $_SESSION["Uid"] = $row['usersUid'];                                   //grab userId and username from database for ease of access during session
    $_SESSION["Name"] = $row['usersName'];
    if(isset($_SESSION["Uid"])){
    header("location: ../index.php");
  }
    exit();
  }
}
}

?>
