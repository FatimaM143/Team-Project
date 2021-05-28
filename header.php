<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Font awesome!-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- bootstrap!-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Corn Exchange E-commerce</title>
</head>

<body>

<header>
  <div class="container">

    <img src="img/logo.png" alt="logo" class="logo">
    <a href="https://www.facebook.com/LeedsCornExchange/" class="fa fa-facebook"></a>
    <a href="https://twitter.com/leedscornex" class="fa fa-twitter"></a>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="shops.php">Shops</a></li>
        <li><a href="contact.php">Contact</a></li>
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
