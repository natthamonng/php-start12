<?php
function do_login(string $username, string $password): bool {
  $allowedUsername = "root";
  // $allowedPassword = "password";
  $hashedAllowedPassword = "5f4dcc3b5aa765d61d8327deb882cf99";
  $hashedUserPassword = md5($password);

  if($username === $allowedUsername && 
     $hashedUserPassword === $hashedAllowedPassword){
    return true;
  }

  return false;
}