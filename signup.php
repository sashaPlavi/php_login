<?php
require('lib/user_validator.php');
require('./db/db.php');
require('./db/models/users.php');
$username = null;
$email = null;

if (isset($_POST['signup-submit'])) {
  $validation = new User_validator($_POST);
  $errors = $validation->validateForm();
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);

  $password = 'blabla truc';

  Users::SetUser($username, $email, $password, $mysqli);
}

?>

<?php
require 'header.php'
?>
<main>
  <div class="container">

    <h1>Sugnup</h1>
    <div class="container  ">

      <form action=" <?php echo $_SERVER['PHP_SELF'] ?>" method="post">

        <div class="input-field">
          <i class="material-icons prefix">account_circle</i>

          <input id="icon_prefix" type="text" name="username" class="validate" placeholder="Enter Username">

          <label for="icon_prefix">Username</label>
          <div class="error">
            <?php echo $errors['username'] ?? '';  ?>
          </div>
        </div>

        <div class="input-field">
          <i class="material-icons prefix">account_circle</i>

          <input id="icon_prefix" type="text" name="email" class="validate" placeholder="Enter Email">

          <label for="icon_prefix">Email</label>
          <div class="error">
            <?php echo $errors['email'] ?? '';  ?>
          </div>
        </div>

        <div class="input-field">
          <i class="material-icons prefix">lock_outline</i>

          <input id="icon_prefix" type="password" name="password" class="validate" placeholder="Enter Password">

          <label for="icon_prefix">Password</label>
          <div class="error">
            <?php echo $errors['password'] ?? '';  ?>
          </div>
        </div>

        <div class="input-field">


          <i class="material-icons prefix">lock_outline</i>
          <input id="icon_prefix" type="password" name="re-password" class="validate" placeholder="Repeat  password">
          <label for="icon_prefix">Password</label>
          <div class="error">
            <?php echo $errors['re-password'] ?? '';  ?>
          </div>
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