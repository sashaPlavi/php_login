<?php
require 'header.php'

?>
<?php

require './controler/ResetPwdCtrl.php';


if (isset($_POST['reset-password'])) {
  // echo 'bla1';

  $reset = new ResetPwdCtrl($_POST);
  $errors = $reset->MailSending();
}

?>
<main>
  <div class="container">

    <h1>Password reset</h1>
    <div class="container center section">
      <h4>E-mail will be set with instructions how to reset your pasword</h4>
    </div>



    <div class="container   ">

      <form action=" <?php echo $_SERVER['PHP_SELF'] ?>" method="post">


        <div class="section">

          <div class="input-field">


            <i class="material-icons prefix">email</i>
            <input id="icon_prefix" type="text" name="reset_email" class="validate" placeholder="Enter your mail">
            <label for="icon_prefix">Reset your password</label>
            <div class="error">
              <?php echo $errors['email'] ?? '';  ?>
            </div>
          </div>
          <div class="center">

            <button class="btn waves-effect waves-light" type="submit" name="reset-password">Recive new password by e-mail

            </button>
          </div>
        </div>
      </form>
      <?php
      if (isset($_GET['reset'])) {
        if ($_GET['reset'] == 'success') {
          echo '<h4 class="center">Check your email </h4>';
        }
      }
      ?>
    </div>


  </div>
</main>

<?php
require 'footer.php'

?>