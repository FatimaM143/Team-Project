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
    $result = getProduct($conn, "greatyorkshireshop");
    while($row = mysqli_fetch_assoc($result)){
      addProduct($row['productName'], $row['productPrice'], $row['productDesc'], $row['productImg'], $row['productId'], $row['shopName']);
    }
    ?>
  </div>

</div>
<?php
include_once 'footer.php'
 ?>