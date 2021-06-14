<?php
include_once 'header.php';
require_once 'includes/functions.inc.php';
$conn = mysqli_connect("localhost", "root", "", "crnex");
$total_price = 0;
?>
<?php
if(isset($_POST["submit"])) {
  $date = $_POST["Date"];
  $timeslot = $_POST["Timeslot"];
  $Uid = $_SESSION["Uid"];

  echo var_dump($Uid, $date, $timeslot);
  addOrder($conn, $Uid, $date, $timeslot);
}
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
    border-radius: 80%;
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
             <th></th>
             <th scope ="col">Name</th>
             <th scope ="col">Shop</th>
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
               <td><img src='.$row['productImg'].'  class ="cart-item-image"></td>
               <td>'.$row['productName'].'</td>
               <td>'.$row['shopName'].'</td>
               <td>'.$product['quantity'].'</td>
               <td>£'.$row['productPrice'].'</td>
               <td>£'.number_format($row['productPrice']*$product['quantity'], 2).'</td>
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
           <tr><th></th><th></th><th></th><th></th><th></th>
           <th style="text-align:centered;">Total Price: £ <?php echo number_format($total_price, 2) ?></th>
           </tr>
         </tfoot>
       </table>
     </div>
   </div>
  </div>
  <section class = "form">
    <form action="includes/basket.inc.php" method = "post">
   <label for="Date">Please select a Day:  </label>
   <select name="Date" id="Date">
     <option value="1"><?php echo date('l jS \of F ', strtotime("+1 days"));?></option>
     <option value="2"><?php echo date('l jS \of F ', strtotime("+2 days"));?></option>
     <option value="3"><?php echo date('l jS \of F ', strtotime("+3 days"));?></option>
     <option value="4"><?php echo date('l jS \of F ', strtotime("+4 days"));?></option>
     <option value="5"><?php echo date('l jS \of F ', strtotime("+5 days"));?></option>
     <option value="6"><?php echo date('l jS \of F ', strtotime("+6 days"));?></option>
     <option value="7"><?php echo date('l jS \of F ', strtotime("+7 days"));?></option>
   </select>
   <label for="Timeslot">Please select a Timeslot:</label>
   <select name="Timeslot" id="Timeslot">
     <option value="10">10:00 - 12:00</option>
     <option value="12">12:00 - 14:00</option>
     <option value="14">14:00 - 16:00</option>
     <option value="16">16:00 - 18:00</option>
   </select>
   <button type="submit" name="submit" class="formbtn">Place Order</button>
 </form>
</section>
</body>

<?php
include_once 'footer.php'
 ?>
