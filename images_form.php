<?php
include_once './db/db.php';
include_once './db/models/images.php';


if (isset($_POST['submit'])) {

  $file = $_FILES['file'];
  //print_r($file);

  $fileName = $_FILES['file']['name'];
  $fileType = $_FILES['file']['type'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];

  $fileExt = explode('.', $fileName);
  $fileTrueExt = strtolower(end($fileExt));

  $image = $_FILES["file"]['tmp_name'];
  //img to string
  $imgContent = addslashes(file_get_contents($image));
  // print_r($imgContent);

  $alowed = array('jpeg', 'jpg', 'png', 'pdf');

  if (in_array($fileTrueExt, $alowed)) {

    if ($fileError === 0) {

      if ($fileSize <   20971520) {
        // $fileNameNew = uniqid('', true) . "." . $fileTrueExt;
        // $fileDestination = "uploads/" . $fileNameNew;
        // var_dump($fileDestination);
        // echo 'blalalalalalal';
        // move_uploaded_file($fileTmpName, $fileDestination);
        // header("Location:index.php?uploadsucces");

        $insert = Images::set_images($mysqli, $imgContent);

        //$db->query("INSERT into my_images (image, uploaded) VALUES ('$imgContent', NOW())");
        //echo $insert;
        if ($insert) {
          $status = 'success';
          $statusMsg = "File uploaded successfully.";
          header("Location:images_view.php");
        } else {
          $statusMsg = "File upload failed, please try again.";
        }
      } else {
        $statusMsg = 'The size of the file must be less than 20MB in order to be uploaded';
      }
    } else {
      $statusMsg = "there was an error uploading a photo";
    }
  } else {
    $statusMsg = 'you can not upload files of this type';
  }
  echo $statusMsg;
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