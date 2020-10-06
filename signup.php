<?php
require 'header.php'
?>
<main>
  <div class="container">

    <h1>Sugnup</h1>
    <div class="container  ">

      <form action="inc/signup.php" method="post">

        <div class="input-field">
          <i class="material-icons prefix">account_circle</i>

          <input id="icon_prefix" type="text" name="username" class="validate" placeholder="Enter Username">

          <label for="icon_prefix">Username</label>
        </div>

        <div class="input-field">
          <i class="material-icons prefix">account_circle</i>

          <input id="icon_prefix" type="text" name="email" class="validate" placeholder="Enter Email">

          <label for="icon_prefix">Email</label>
        </div>

        <div class="input-field">
          <i class="material-icons prefix">lock_outline</i>

          <input id="icon_prefix" type="password" name="password" class="validate" placeholder="Enter Password">

          <label for="icon_prefix">Password</label>
        </div>

        <div class="input-field">


          <i class="material-icons prefix">lock_outline</i>
          <input id="icon_prefix" type="password" name="re-password" class="validate" placeholder="Repeat  password">
          <label for="icon_prefix">Password</label>
        </div>
        <div class="center">

          <button class="btn waves-effect waves-light" type="submit" name="signup-submit">Signup</button>
        </div>
      </form>
    </div>



  </div>
</main>

<?php
require 'footer.php'

?>