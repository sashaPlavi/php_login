<?php
require 'header.php';

$selector = $_GET['selector'];
$validator = $_GET['validator'];
if (isset($_POST['reset-password'])) {
}

?>
<main>
  <div class="container">

    <h1>create new password</h1>
    <div class="container center section">
      <h4>Please enter a new password</h4>
    </div>



    <div class="container   ">

      <form action=" <?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="selector" value="<?php echo $selector; ?>">
        <input type="hidden" name="validator" value="<?php echo $validator; ?>">

        <div class="section">

          <div class="input-field">
            <i class="material-icons prefix">lock_outline</i>
            <input id="icon_prefix" type="password" name="password" class="validate" placeholder="Enter new password">
            <label for="icon_prefix">New Password</label>

          </div>
        </div>
        <div class="section">

          <div class="input-field">
            <i class="material-icons prefix">lock_outline</i>
            <input id="icon_prefix" type="password" name="re-password" class="validate" placeholder="repeat password">
            <label for="icon_prefix">Repet password</label>

          </div>
        </div>
        <div class="center">

          <button class="btn waves-effect waves-light" type="submit" name="reset-password">Reset

          </button>
        </div>
      </form>
    </div>


  </div>
</main>

<?php
require 'footer.php'

?>