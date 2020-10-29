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
    require './db/paswordhash.php';

    $username = htmlspecialchars($this->data['username']);

    $passwordInput = htmlspecialchars($this->data['password']);

    $res = Users::getSingleUserByUsernameRes($username, $mysqli);
    $row = $res->fetch_assoc();
    print_r($row['password']);
    $passwordDb =  $row['password'];
    // if ($res->num_rows == 0) {
    //   return $errors['dbsearch'] = "there in no user with username $username";
    // }
    if (crypt($passwordInput, $passwordDb) == $passwordDb) {
      //echo "Password verified!";
      session_start();
      $_SESSION['userid'] = $row['userid'];
      $_SESSION['username'] = $row['username'];
      header("Location:index.php");
    } else {
      echo 'invalid pasword';
    }
  }
}
