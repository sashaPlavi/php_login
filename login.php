<?php
require 'header.php'
?>
<main>
  <div class="container">

    <h1>Login</h1>



    <div class="container login ">

      <form action="inc/login.php" method="post">

        <div class="input-field">
          <i class="material-icons prefix">account_circle</i>

          <input id="icon_prefix" type="text" name="mailuid" class="validate" placeholder="Usrname/email">

          <label for="icon_prefix">Email</label>
        </div>

        <div class="input-field">


          <i class="material-icons prefix">lock_outline</i>
          <input id="icon_prefix" type="password" name="password" class="validate" placeholder="Enter a password">
          <label for="icon_prefix">Password</label>
        </div>
        <div class="center">

          <button class="btn waves-effect waves-light" type="submit" name="login-submit">Login

          </button>
        </div>
      </form>
    </div>

    <div class="container center">

      <a href="signup.php">Signup</a>

      <form action="inc/logout.php" method="post">



        <button class="btn waves-effect waves-light" type="submit" name="logout-submit">Logout

        </button>

      </form>

    </div>
  </div>
</main>

<?php
require 'footer.php'

?>