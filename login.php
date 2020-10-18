<?php

require('./controler/LoginCtrl.php');

$username = null;


if (isset($_POST['login-submit'])) {

  $login = new LoginCtrl($_POST);
  $email = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);

  $login->validation();
}

?>
<?php
require 'header.php'

?>
<main>
  <div class="container">

    <h1>Login</h1>
    <div class="container center">
      <h4>Please login</h4>
    </div>



    <div class="container login ">

      <form action=" <?php echo $_SERVER['PHP_SELF'] ?>" method="post">

        <div class="input-field">
          <i class="material-icons prefix">account_circle</i>

          <input id="icon_prefix" type="text" name="username" class="validate" placeholder="Usrname ">

          <label for="icon_prefix">Email</label>
          <div class="error">
            <?php echo $errors['email'] ?? '';  ?>

          </div>
        </div>

        <div class="input-field">


          <i class="material-icons prefix">lock_outline</i>
          <input id="icon_prefix" type="password" name="password" class="validate" placeholder="Enter a password">
          <label for="icon_prefix">Password</label>
          <div class="error">
            <?php echo $errors['password'] ?? '';  ?>

          </div>
        </div>
        <div class="center">

          <button class="btn waves-effect waves-light" type="submit" name="login-submit">Login

          </button>
        </div>
      </form>
    </div>

    <div class="container center">

      <div class="section">

        <a class="btn waves-effect waves-light" href="signup.php">Signup</a>
      </div>

      <div class="section">
        <a href="reset-password.php">Forgot your password?</a>
      </div>



    </div>
  </div>
</main>

<?php
require 'footer.php'

?>