<?php
if(isset($_POST['add'])){
  require_once 'functions.inc.php';
  addToCart($_POST['productId'], $_POST['productName'], $_POST['productImg'], $_POST['productPrice'], $_POST['shopName']);
}
?>
