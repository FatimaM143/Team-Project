<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
  <link href="css/shops.css" rel="stylesheet" type="text/css"

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
  <title>Corn Exchange E-commerce</title>
</head>

<body>
  <style>
      body { background: #f2f3f2;}
  </style>

<?php
include_once 'header.php';
require_once 'includes/functions.inc.php';
$conn = mysqli_connect("localhost", "root", "", "crnex");
 ?>
 <?php
 if(isset($_POST["add"])){
   addToCart($_POST['productId'], $_POST['quantity']);
 }
 ?>
<div class="container">
  <div class="row text-center py-5 ">
    <?php
    $result = getProduct($conn, "plantpoint");
    while($row = mysqli_fetch_assoc($result)){
      addProduct($row['productName'], $row['productPrice'], $row['productDesc'], $row['productImg'], $row['productId'], $row['shopName']);
    }
    ?>
  </div>
</div>
</body>
</html>

<?php
include_once 'footer.php'
 ?>
