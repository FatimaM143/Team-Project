<?php
include_once 'header.php';
?>
  </header>

  <section class ="form">
    <h2>Log in</h2>
    <div class="signup-form-form">
      <form action="includes/login.inc.php" method="post">
        <input type="text" name="uid" placeholder="Email...">
        <input type="password" name="pwd" placeholder="Password...">
        <button type="submit" name="submit" class="formbtn">Log In</button>
      </form>
    </div>
    <?php
    if(isset($_GET["error"])) {
      if($_GET["error"] == "emptyinput"){
          echo "<p>Please fill in all fields!</p>";
      }
      else if($_GET["error"] == "incorrectEmail"){
          echo "<p>Account does not exist!</p>";
        }
        else if($_GET["error"] == "incorrectpassword"){
            echo "<p>Password incorrect!</p>";
          }
      else if($_GET["error"] == "none"){
            echo "<p>Login successful!</p>";
          }
      else if($_GET["error"] == "stmtfailed"){
              echo "<p>Something went wrong:/</p>";
      }
    }
      ?>
  </section>

<?php
  include_once 'footer.php';
 ?>
