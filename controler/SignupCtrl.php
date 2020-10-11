<?php

class SignupCtrl
{
  private $data;
  private $errors = [];


  public function __construct($post_data)
  {
    $this->data = $post_data;
  }
  public  function validation()
  {
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require("$root/php_login/lib/user_validator.php");
    require("$root/php_login/db/db.php");
    require("$root/php_login/db/models/users.php");


    $validation = new User_validator($this->data);
    $errors = $validation->validateSubmit();
    $username = htmlspecialchars($this->data['username']);
    $email = htmlspecialchars($this->data['email']);
    $password = htmlspecialchars($this->data['password']);

    if (!$errors) {

      Users::SetUser($username, $email, $password, $mysqli);
    }
    return $errors;
  }
}
