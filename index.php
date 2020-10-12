<?php
require 'header.php'
?>
<main>
  <div class="container">

    <h1>main</h1>

    <?php
    if (isset($_SESSION['userid'])) {

      echo   '<p>you are loged in </p>';
    } else {

      echo '<p>you are loged out</p>';
    }

    ?>

  </div>
</main>

<?php
require 'footer.php'

?>