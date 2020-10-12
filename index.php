<?php
require 'header.php'
?>
<main>
  <div class="container center">

    <h1>main</h1>

    <?php
    if (isset($_SESSION['userid'])) {

      echo   '<h3>you are loged in </h3>';
    } else {

      echo '<h3>you are loged out</h3>';
    }

    ?>

  </div>
</main>

<?php
require 'footer.php'

?>