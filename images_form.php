<?php

include_once './controler/UploadImgCtrl.php';


if (isset($_POST['submit'])) {
  $images = new UploadingImgCtrl($_FILES);
  $imagesStatus = $images->uploadImg();
  echo $imagesStatus;
}
?>


<?php
require 'header.php'

?>

<div class="section">


  <form class="container" action=" <?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

    <input type="file" name="file">

    <button type="submit" name="submit"> Upload</button>
  </form>

</div>
<?php
require 'footer.php'

?>