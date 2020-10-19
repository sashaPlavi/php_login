<?php

class ResetPwdCtrl
{
  private $data;



  public function __construct($post_data)
  {
    $this->data = $post_data;
  }


  public  function MailSending()
  {
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);


    require("$root/php_login/db/db.php");
    require("$root/php_login/db/models/resetpwd.php");

    $user_email = $this->data['reset_email'];

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    //$url = "http://localhost/php_login/create_new_pwd.php?selector=" . $selector . "&validator=" . bin2hex($token);
    header("Location:create_new_pwd.php?selector=" . $selector . "&validator=" . bin2hex($token));
    $expires = date("U") + 1800;

    // $res = ResetPwd::DeleteReset($user_email, $mysqli);
  }
}
