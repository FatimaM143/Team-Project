
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
      <link href="styles.css" rel="stylesheet" type="text/css"
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Corn Exchange E-commerce</title>
    </head>

    <body >
      <header>
        <div class="container">
          <img src="Corn+Exchange+Solid+Black+Logo+resized.png" alt="logo" class="logo">
          <nav>
            <ul>
              <li><a href="index.html">Home</a></li>
              <li><a href="#">Shops</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="login.html">Login</a></li>
              <li><a href="#">Account</a></li>
            </ul>
          </nav>
        </div>
      </header>

<section class="login-bg-image">
<section class ="signup-form"> 

  <?php
  include_once 'header.php';
  ?>

  <section class ="signup-form">
    <h2>Log in</h2>
    <div class="signup-form-form">
      <form action="includes/login.inc.php" method="post">
        <div class="textbox">
         <label for="email"><b>Username</b></label> 
        <input type="text" name="email" placeholder="Enter Username/Email">
         </div>
          <div class="textbox">
          <label for="pwd"><b>Password</b></label> 
        <input type="password" name="pwd" placeholder="Enter Password">
        </div>   
        <button class ="loginbtn" type="submit" name="submit">Log In</button>
      </form>
    </div>
  </section>

<?php
  include_once 'footer.php';
 ?>
  </section>  
  
