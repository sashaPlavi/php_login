<?php

class User_validator
{
  private $data;
  private $errors = [];
  private static $filds = ['username', 'email', 'password', 're-password'];

  public function __construct($post_data)
  {
    $this->data = $post_data;
  }


  public function validateForm()
  {
    foreach (self::$filds as $field) {
      if (!array_key_exists($field, $this->data)) {
        trigger_error("$field does not exist ");
        return;
      }
    }
    $this->validateEmail();
    $this->validateUsername();
    $this->CheckPass();

    return $this->errors;
  }
  private function validateUsername()
  {
    $val = trim($this->data['username']);
    if (empty($val)) {
      $this->addError('username', 'user name can not be ampty');
    } else {
      if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)) {
        $this->addError('username', 'name must be betveen 6 and 12 characters long and alfanumeric');
      }
    }
  }
  private function validateEmail()
  {
    $val = trim($this->data['email']);
    if (empty($val)) {
      $this->addError('email', 'email can not be ampty');
    } else {


      if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
        $this->addError('email', 'email is not valid');
      }
    }
  }
  private function CheckPass()
  {
    $pass = trim($this->data['password']);
    $repass = trim($this->data['re-password']);
    if (empty($pass) && empty($repass)) {
      $this->addError('password', 'password can not be empty');
    } else {

      if ($pass != $repass) {
        $this->addError('password', ' password must mach');
      }

      if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $pass)) {
        $this->addError('password', 'password must be betveen 6 and 12 characters long and alfanumeric');
      }
      if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $repass)) {
        $this->addError('re-password', ' re -password must be betveen 6 and 12 characters long and alfanumeric');
      }
    }
  }
  private function addError($key, $message)
  {
    $this->errors[$key] = $message;
  }
}
