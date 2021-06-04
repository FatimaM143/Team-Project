<?php
include_once 'header.php';
require_once 'includes/functions.inc.php'
 ?>
</header>
 <style>
    .grid {
   width: 100%;
   margin:  auto;
   padding: 0 18px;
   max-width: 1440px;
   position: relative;
   text-align: center;
   color: white;
 }
    .centered {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;border:
 }
    .img-fluid{
  border-color: green;
   filter: blur(1px);
     -webkit-filter: blur(1px);
 }
 </style>

   <div class="grid">
    <div class="row text-center py-5">
    <?php
    addShop("The Plant Point", "img/PlantPoint.jpg", 'plantpoint.php');
    addShop("Northern Acoustics", "img/NorthernAcoustics.jpg", "northernacoustics.php");
    addShop("Proms And Pearls", "img/promsandpearls.jpg","promsandpearls.php");
    addShop("The Great yorkshire Shop", "img/greatyorkshireshop.jpg", "greatyorkshireshop.php");
    addShop("Dion Smith Jewellers", "img/DionSmith.jpg","dionsmith.php");
   ?>
  </div>
</div>

<?php
include_once 'footer.php'
 ?>
