<?php


class UploadingImgCtrl

{
  private $data;



  public function __construct($post_data)
  {
    $this->data = $post_data;
  }
  public function uploadImg()
  {

    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require("$root/php_login/db/db.php");
    require("$root/php_login/db/models/images.php");

    //$file = $this->data['file'];


    $fileName = $this->data['file']['name'];
    $fileType = $this->data['file']['type'];
    $fileTmpName = $this->data['file']['tmp_name'];
    $fileSize = $this->data['file']['size'];
    $fileError = $this->data['file']['error'];

    $fileExt = explode('.', $fileName);
    $fileTrueExt = strtolower(end($fileExt));

    $image = $fileTmpName;
    //img to string
    $imgContent = addslashes(file_get_contents($image));
    // print_r($imgContent);

    $alowed = array('jpeg', 'jpg', 'png', 'pdf');

    if (in_array($fileTrueExt, $alowed)) {

      if ($fileError === 0) {
        if ($fileSize < 1000000) {

          $insert = Images::set_images($mysqli, $imgContent);
          if ($insert) {
            $status = 'success';
            $statusMsg = "File uploaded successfully.";
            header("Location:images_view.php");
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
    return $statusMsg;
  }
}
