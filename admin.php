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
    <h1>Admin Login</h1>
    <form action="includes/admin.inc.php" method="post">
            <input type="text" name="loginuid" placeholder="Enter Admin Username">
            <input type="password" name="loginpwd" placeholder="Enter Admin Password">
      <button type="submit" name="login" class="formbtn">Log In</button>
    <h2>Create Account</h2>
        <input type="text" name="uid" placeholder="Username..">
        <input type="password" name="pwd" placeholder="Password..">
        <input type="password" name="code" placeholder="code">
        <label for="shop">Select shop:
        <select name="shop" id="shop">
          <option value="PlantPoint">PlantPoint</option>
          <option value="northernacoustics">northernacoustics</option>
          <option value="dionsmith">dionsmith</option>
          <option value="greatyorkshireshop">greatyorkshireshop</option>
          <option value="promsandpearls">promsandpearls</option>
        </select></label>
        <button type="submit" name="signup" class = "formbtn">Sign Up</button>
      </form>

    <?php
    if(isset($_GET["error"])) {
      if($_GET["error"] == "wrongcode"){
          echo "<p>Wrong admin code</p>";
      }
      else if($_GET["error"] == "incorrectEmail"){
          echo "<p>Account does not exist!</p>";
        }
        else if($_GET["error"] == "emptyinput"){
            echo "<p>Please fill all fields</p>";
          }
        else if($_GET["error"] == "incorrectpassword"){
            echo "<p>Password incorrect!</p>";
          }
      else if($_GET["error"] == "none"){
            echo "<p>signup/login successful!</p>";
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
