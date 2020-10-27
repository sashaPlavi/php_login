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
    require("$root/php_login/lib/user_validator.php");
    $user_email = $this->data['reset_email'];

    $validation = new User_validator($this->data);
    $errors = $validation->validateresetEmail();
    //var_dump($errors);

    if ($errors == []) {



      $selector = bin2hex(random_bytes(8));
      $token = bin2hex(random_bytes(32));


      $url = "http://localhost/php_login/create_new_pwd.php?selector=" . $selector . "&validator=" . $token;
      // header("Location:create_new_pwd.php?selector=" . $selector . "&validator=" . bin2hex($token));
      $expires = date("U") + 1800;
      // echo $expires . '<br>';
      // echo $url . '<br>';
      // echo 'blabla2';

      $resDel = ResetPwd::DeleteReset($user_email, $mysqli);
      $resInsert = ResetPwd::setReset($user_email, $selector, $token, $expires, $mysqli);
      // print_r($resInsert);
      //echo 'blabla';


      $to = $user_email;

      $subject = 'Reset your password';
      $mesage = '<p> we receve your reset password request</p></br>';
      $mesage .= '<p>Here is your password reset link</p></br>';
      $mesage .= '<p><a href="' . $url . '">' . $url . '</p>';

      $headers = "From:danka@saschas.mycpanel.rs>\r\n";
      $headers .= "Repaly-to:danka@saschas.mycpanel.rs\r\n";
      $headers .= "Content-type: text/html\r\n";

      // mail($to, $subject, $mesage, $headers);
      if ($resInsert) {

        header("Location:reset-password.php?reset=success");
      }

      $res = ResetPwd::DeleteReset($user_email, $mysqli);
    }
    return $errors;
  }
}
