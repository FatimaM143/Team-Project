<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Font awesome!-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <!-- bootstrap!-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Corn Exchange E-commerce</title>
</head>

<body>
  <style>
  .fa {
    padding: 6px;
    font-size: 16px;
    width: 50px;
    text-align: left;
    text-decoration: none;
  }
  .fa:hover {
    opacity: 0.7;
  }
  .fa-facebook {
    background: #3B5998;
    color: white;
  }
  .fa-twitter {
    background: #55ACEE;
    color: white;
  }
  </style>

<header>
    <img src="img/logo.png" alt="logo" class="logo">
    <a href="https://www.facebook.com/LeedsCornExchange/"><i class ="fa fa-facebook">F</i></a>
    <a href="https://twitter.com/leedscornex"><i class ="fa fa-twitter">T</i></a>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="shops.php">Shops</a></li>
        <li><a href="about.php">About Us</a></li>
        <?php
        if(isset($_SESSION["Uid"])) {
          echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
          echo "<li><a href='basket.php'>Basket <i class ='fas fa-shopping-basket'></i> ".count($_SESSION['cart'])."</a></li>";
          echo "<p>Hello, " . $_SESSION["Name"]. "!</p>";
        }
        else{
          echo "<li><a href='signup.php'>Sign Up</a></li>";
          echo "<li><a href='login.php'>Log in</a></li>";
        }
         ?>
      </ul>
    </nav>


  </header>
