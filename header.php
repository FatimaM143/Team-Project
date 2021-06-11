<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
      <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
  <link href="css/header.css" rel="stylesheet" type="text/css"

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
  <title>Corn Exchange E-commerce</title>
</head>

<body>
  <div class="container">

<header>
    <img src="img/Corn+Exchange+Solid+Black+Logo+resized.png" alt="logo" class="logo">

    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="shops.php">Shops</a></li>
        <li><a href="about.php">About Us</a></li>
        <?php
        if(isset($_SESSION["Uid"])) {
          echo "<li><a href='profile.php'>Profile</a></li>";
          echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
          echo "<li><a href='basket.php'>Basket</a></li>";
          echo "<p>Hello, " . $_SESSION["Name"]. "!</p>";
        }
        else{
          echo "<li><a href='signup.php'>Sign Up</a></li>";
          echo "<li><a href='login.php'>Log in</a></li>";
        }
         ?>
      </ul>
    </nav>

  </div>
  </header>
