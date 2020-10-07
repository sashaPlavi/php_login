<?php

if (isset($_POST['signup-submit'])) {
  require 'db/db.php';

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];

  if (empty($username) || empty($email) || empty($password) || empty($repassword)) {
    header("Location: ../signup.php?");
  }
}
