<?php
include_once 'header.php';
require_once 'includes/functions.inc.php';
$conn = mysqli_connect("localhost", "root", "", "crnex");
$total_price = 0;
?>
<?php
if(isset($_POST["rmv"])) {
          $id = $_POST["rmv"];
          $item_array_id = array_column($_SESSION["cart"], "productId");
          foreach ($_SESSION["cart"] as $key => $count) {
            if($id == $count['productId'])
            {
                $_SESSION["cart"][$key]['quantity']--;
                if($_SESSION["cart"][$key]['quantity'] <= 0)
                {
                  unset($_SESSION["cart"][$key]);
                }
            }
          }
        }
 ?>
 <style>
 .cart-item-image {
	width: 170px;
    height: 170px;
    border-radius: 50%;
    border: #E0E0E0 1px solid;
    padding: 5px;
    vertical-align: middle;
    margin-right: 15px;
  }
 </style>
<body>

  <div class ="container">
    <div class ="row">
      <div class ="colg-lg-12 text-center border rounded bg-light my-5"
       <h1>Basket</h1>
     </div>
     <form action="basket.php" method="post">
     <div class ="col-lg-20">
       <table class="table">
         <thead>
           <tr>
             <th scope ="col">Name</th>
             <th scope ="col">Quantity</th>
             <th scope ="col">Price</th>
             <th scope ="col">Total</th>
           </tr>
         </thead>
         <tbody>
           <?php
           if(isset($_SESSION['cart'])){
             foreach ($_SESSION['cart'] as $product) {
               if($product['quantity'] >= 1){
               $result = getBasket($conn, $product['productId']);
               $row = mysqli_fetch_assoc($result);
               echo'
               <tr>
               <td><img src='.$row['productImg'].'  class ="cart-item-image">'.$row['productName'].'</td>
               <td>'.$product['quantity'].'</td>
               <td>£'.$row['productPrice'].'</td>
               <td>£'.$row['productPrice']*$product['quantity'].'</td>
               <td><button type="submit" class = "btn btn-warning my-3" name="rmv" value ='.$product['productId'].'>Remove<i class ="fas fa-trash"></i></button></td>
               </tr>
               ';
               $total_price += ($row['productPrice']*$product['quantity']);

             }
           }
         }
           ?>
         </tbody>
         <tfoot>
           <tr>
             <th></th>
             <th></th>
             <th style="text-align:right;">Total Price: £ <?php echo $total_price ?></th>
           </tr>
         </tfoot>
       </table>
     </div>
   </div>
 </form>
 </div>
</body>

<?php
include_once 'footer.php'
 ?>
