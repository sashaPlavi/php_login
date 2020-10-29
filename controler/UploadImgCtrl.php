<?php



if (isset($_POST['submit'])) {

  $file = $_FILES['file'];
  print_r($file);

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
      if ($fileSize < 100000) {
        // $fileNameNew = uniqid('', true) . "." . $fileTrueExt;
        // $fileDestination = "uploads/" . $fileNameNew;
        // var_dump($fileDestination);
        // echo 'blalalalalalal';
        // move_uploaded_file($fileTmpName, $fileDestination);
        // header("Location:index.php?uploadsucces");

        $insert = Images::set_images($db, $imgContent);

        //$db->query("INSERT into my_images (image, uploaded) VALUES ('$imgContent', NOW())");

        if ($insert) {
          $status = 'success';
          $statusMsg = "File uploaded successfully.";
          header("Location:view.php");
        } else {
          $statusMsg = "File upload failed, please try again.";
        }
      } else {
        $statusMsg = 'file is to big';
      }
    } else {
      $statusMsg = "there was an error uploading a photo";
    }
  } else {
    $statusMsg = 'you can not upload files of this type';
  }
  echo $statusMsg;
}
