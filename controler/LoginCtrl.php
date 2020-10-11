<?php

class LoginCtrl
{
  private $data;
  private $errors = [];


  public function __construct($post_data)
  {
    $this->data = $post_data;
  }

  public function validation()
  {
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);

    require("$root/php_login/db/db.php");
    require("$root/php_login/db/models/users.php");

    $username = htmlspecialchars($this->data['username']);

    $password = htmlspecialchars($this->data['password']);

    $res = Users::getSingleUserByUsernameRes($username, $mysqli);
    print_r($res);
    // if ($res->num_rows == 0) {
    //   return $errors['dbsearch'] = "there in no user with username $username";
    // }
  }
}
