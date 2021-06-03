<?php
include_once 'header.php';
?>
  </header>
  <section class ="form">
    <h2>Sign up</h2>
    <div class="signup-form-form">
      <form action="includes/signup.inc.php" method="post">
        <input type="text" name="name" placeholder="Full name..">
        <input type="text" name="email" placeholder="E-Mail..">
        <input type="text" name="uid" placeholder="Username..">
        <input type="password" name="pwd" placeholder="Password..">
        <input type="password" name="pwdrepeat" placeholder="Repeat Password..">
        <button type="submit" name="submit" class = "formbtn">Sign Up</button>
      </form>
    </div>
    <?php
  if(isset($_GET["error"])) {
    if($_GET["error"] == "emptyinput"){
        echo "<p>Please fill in all fields!</p>";
    }
    else if($_GET["error"] == "invaliduid"){
        echo "<p>Username Invalid!</p>";
    }
    else if($_GET["error"] == "invalidemail"){
        echo "<p>Please enter a valid email address!</p>";
      }
    else if($_GET["error"] == "passwordsdiffer"){
        echo "<p>Please make sure passwords match!</p>";
        }
    else if($_GET["error"] == "stmtfailed"){
        echo "<p>Something went wrong:/</p>";
            }
    else if($_GET["error"] == "none"){
        echo "<p>Sign up successfull!</p>";
      }
    else if($_GET["error"] == "usernametaken"){
        echo "<p>Sorry! That username is already taken:(</p>";
        }
    }
  ?>
  </section>
<?php
  include_once 'footer.php';
 ?>
