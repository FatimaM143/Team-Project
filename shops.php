<?php
include_once 'header.php';
require_once 'includes/functions.inc.php'
 ?>
 <div class="container">
   <div class="row text-center py-5 ">
    <?php
    addShop("The Plant Point", "img/logo.png", 'plantpoint.php');
    addShop("Northern Acoustics", "img/NorthernAcousticsLogo.png", "northernacoustics.php");
    addShop("Proms And Pearls", "img/Proms_and_Pearls.png","promsandpearls.php");
    addShop("The Great yorkshire Shop", "img/logo.png", "greatyorkshireshop.php");
    addShop("Dion Smith Jewellers", "img/Dion_Smith_Jewellery.png","dionsmith.php");
   ?>
  </div>
 </div>

<?php
include_once 'footer.php'
 ?>
