<?php




if (isset($_POST['login-submit'])) {
}

?>
<?php
require 'header.php'

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
            <input id="icon_prefix" type="text" name="email" class="validate" placeholder="Enter your mail">
            <label for="icon_prefix">Reset your email</label>

          </div>
          <div class="center">

            <button class="btn waves-effect waves-light" type="submit" name="reset-password">Reset

            </button>
          </div>
        </div>
      </form>
    </div>


  </div>
</main>

<?php
require 'footer.php'

?>