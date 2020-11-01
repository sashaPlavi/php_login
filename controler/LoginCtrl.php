<?php

class LoginCtrl
{
  private $data;



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
    $errors = [];

    $username = htmlspecialchars($this->data['username']);

    $passwordInput = htmlspecialchars($this->data['password']);

    $res = Users::getSingleUserByUsernameRes($username, $mysqli);
    $row = $res->fetch_assoc();

    if ($res->num_rows == 0) {

      $errors['dbsearch'] = "there in no user with username $username";
    } else {


      //print_r($row['password']);
      $passwordDb =  $row['password'];
      if (crypt($passwordInput, $passwordDb) == $passwordDb) {
        echo "Password verified!";
        session_start();
        $_SESSION['userid'] = $row['userid'];
        $_SESSION['username'] = $row['username'];
        header("Location:index.php");
      } else {
        $errors['password'] = 'invalid pasword';
      }
    }
    return $errors;
  }
}
