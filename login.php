<?php

require('lib/user_validator.php');
require('./db/db.php');
require('./db/models/users.php');
$username = null;
$email = null;

if (isset($_POST['login-submit'])) {
  $validation = new User_validator($_POST);
  $errors = $validation->validateLogin();

  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  if (!$errors) {

    Users::UserLogin($email, $password, $mysqli);
  }
}

?>
<?php
require 'header.php'

?>
<main>
  <div class="container">

    <h1>Login</h1>



    <div class="container login ">

      <form action=" <?php echo $_SERVER['PHP_SELF'] ?>" method="post">

        <div class="input-field">
          <i class="material-icons prefix">account_circle</i>

          <input id="icon_prefix" type="text" name="email" class="validate" placeholder="Usrname/email">

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

        <form action="inc/logout.php" method="post">



          <button class="btn waves-effect waves-light" type="submit" name="logout-submit">Logout

          </button>

        </form>
      </div>

    </div>
  </div>
</main>

<?php
require 'footer.php'

?>