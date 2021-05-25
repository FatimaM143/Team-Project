<?php
//function to check weather inputs are empty
function emptyInputSignup ($name, $email, $username, $pwd, $pwdRepeat) {
  $result;
  if(empty($name)||empty($email)||empty($username)||empty($pwd)||empty($pwdRepeat)) {               //if one input is empty, function returns true
    $result = true;
    }
    else {
      $result = false;
    }
    return $result;
}
function invalidUid($username) {
  $result;
  if(!preg_match("/^[a-zA-Z0-9]*$/"), $username) {               //if one input is empty, function returns true
    $result = true;
    }
    else {
      $result = false;
    }
    return $result;
}
function invalidEmail($email) {
  $result;
  if(filter_var($email, FILTER_VALIDATE_EMAIL)) {               //if one input is empty, function returns true
    $result = true;
    }
  else {
      $result = false;
    }
    return $result;
}
