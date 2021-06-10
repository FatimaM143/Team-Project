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
/*Check that the given passwords match*/
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
/*Check for a strong password*/
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
/*Sign up the user*/
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
/*Check for empty input on login*/
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
/*Log in user*/
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
}}
/*Add product*/
function addProduct($productName, $productPrice, $productDesc, $productImg, $productId, $shopName){
  $element = '
  <div class="col-md-3 col-sm-6 my-3 my-md-0">
    <form action="'.$shopName.'.php" method="post">
      <div class="card shadow">
        <img src='.$productImg.' alt="image1" class ="img-fluid card-img-top">
      </div>
      <div class="card-body">
        <h5 class = "card-title">'.$productName.'</h5>
        <p class = "card text">'.$productDesc.'</p>
        <h5><span class="price">£'.$productPrice.'</span></h5>
        <input type="number" id="quantity" name="quantity" min="1" max="5" value = 1>
        <button type="submit" class = "btn btn-warning my-3" name="add">Add to Basket<i class ="fas fa-shopping-basket"></i></button>
         <input type="hidden" name="productId" value='.$productId.'>
         <input type="hidden" name="productName" value='.$productId.'>
         <input type="hidden" name="productPrice" value='.$productId.'>
         <input type="hidden" name="productImg" value='.$productId.'>
         <input type="hidden" name="productId" value='.$productId.'>
      </div>
    </form>
  </div>
  ';
  echo $element;
}
/*add shop*/
function addShop($shopName, $shopImg, $pagePath) {
  $element = '
  <div class="col-md-3 col-sm-6 my-3 my-md-0">
      <form action="index.php" method="post">
        <div class="card shadow">
          <a href='.$pagePath.'><img src="'.$shopImg.'" alt="image1" class ="img-fluid card-img-top"><div class ="centered"><h3>'.$shopName.'</h3></div></a>

        </div>
      </form>
    </div>
  ';
 echo $element;
}
/*Get product data from db*/
function getProduct($conn, $shopName) {
   $sql = "SELECT * FROM products WHERE shopName = ?;";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql)) {                                  //run sql in the database and check for errors
     header("location: ../login.php?error=stmtfailed");                     //Return to signup page if error occurs
     exit();
   }
   else{
   mysqli_stmt_bind_param($stmt, "s", $shopName);
   mysqli_stmt_execute($stmt);
   $returndata = mysqli_stmt_get_result($stmt);
      if(mysqli_num_rows($returndata) > 0) {
          return $returndata;
      }
    }
    mysqli_stmt_close($stmt);
   }
/*add product to the cart*/
function addToCart($productId, $quantity){
  if(isset($_SESSION["cart"])){
        $item_array_id = array_column($_SESSION["cart"], "productId");
        if(!in_array($productId, $item_array_id)){
            $count = count($_SESSION["cart"]);
              $item_array = array("productId" => $productId,
                  "quantity" => $quantity);
              $_SESSION['cart'][$count] = $item_array;
          }else{
              echo '<script>alert("item Already in basket")</script>';
              foreach ($item_array_id as $key => $value) {
                if($item_array_id[$key] == $productId)
                $_SESSION['cart'][$key]["quantity"] += $quantity;
              }
          }
      }else{
        $item_array = array("productId" => $productId,
          "quantity" => $quantity);
        $_SESSION["cart"][0] = $item_array;
  }
}
/*get basket items*/
function getBasket($conn, $productId) {
   $sql = "SELECT * FROM products WHERE productId = ?;";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql)) {                                  //run sql in the database and check for errors
     header("location: ../basket.php?error=stmtfailed");                     //Return to signup page if error occurs
     exit();
   }
   else{
   mysqli_stmt_bind_param($stmt, "s", $productId);
   mysqli_stmt_execute($stmt);
   $returndata = mysqli_stmt_get_result($stmt);
      if(mysqli_num_rows($returndata) > 0) {
          return $returndata;
      }
    }
    mysqli_stmt_close($stmt);
   }
?>
