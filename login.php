<?php
include_once 'header.php';
?>
  </header>

  <section class ="signup-form">
    <h2>Log in</h2>
    <div class="signup-form-form">
      <form action="includes/login.inc.php" method="post">
        <input type="text" name="email" placeholder="Username/Email...">
        <input type="password" name="pwd" placeholder="Password...">
        <button type="submit" name="submit">Log In</button>
      </form>
    </div>
  </section>

<?php
  include_once 'footer.php';
 ?>
