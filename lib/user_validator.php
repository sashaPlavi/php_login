<?php

class User_validator
{
  private $data;
  private $errors = [];
  private static $filds = ['username', 'email',];

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
  private function addError($key, $message)
  {
    $this->errors[$key] = $message;
  }
}
