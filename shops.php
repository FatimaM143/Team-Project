<?php
include_once 'header.php';
require_once 'includes/functions.inc.php'
 ?>

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
      font-family: 'Montserrat', sans-serif;
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
</body>
</html>
<?php
include_once 'footer.php'
 ?>
