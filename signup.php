<?php
include_once 'header.php';
?>
  </header>

  <section class ="signup-form">
    <h2>Sign up</h2>
    <div class="signup-form-form">
      <form action="includes/signup.inc.php" method="post">
        <input type="text" name="name" placeholder="Full name..">
        <input type="text" name="email" placeholder="E-Mail">
        <input type="text" name="uid" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwdrepeat" placeholder="Repeat Password">
        <button type="submit" name="submit">Sign Up</button>
      </form>
    </div>
  </section>

<?php
  include_once 'footer.php';
 ?>
