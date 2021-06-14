<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet" type="text/css"
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
  <title>Corn Exchange E-commerce</title>
</head>

<body>
<div class="container">

  <div class="cover">
    <h1>Login</h1>
    <form action="includes/login.inc.php" method="post">


            <label for="uid"><b>Username</b></label>
            <input type="text" name="uid" placeholder="Enter Username/Email">
            <label for="pwd"><b>Password</b></label>
            <input type="password" name="pwd" placeholder="Enter Password">

      <button type="submit" name="submit" class="formbtn">Log In</button>
    </form>
    <?php
    if(isset($_GET["error"])) {
      if($_GET["error"] == "emptyinput"){
          echo "<p>Please fill in all fields!</p>";
      }
      else if($_GET["error"] == "incorrectEmail"){
          echo "<p>Account does not exist!</p>";
        }
        else if($_GET["error"] == "incorrectpassword"){
            echo "<p>Password incorrect!</p>";
          }
      else if($_GET["error"] == "none"){
            echo "<p>Login successful!</p>";
          }
      else if($_GET["error"] == "stmtfailed"){
              echo "<p>Something went wrong:/</p>";
      }
    }
      ?>

  </div>
  </div>
</body>
</html>

<?php
  include_once 'footer.php';
 ?>
