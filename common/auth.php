<?php
function do_login(string $username, string $password): bool {
  $allowedUsername = "root";
  // $allowedPassword = "password";
  // $hashedAllowedPassword = "5f4dcc3b5aa765d61d8327deb882cf99";
  // $hashedUserPassword = md5($password);

  $hash = '$2y$10$IVsSdDApR2KyAgy7cH7hF.69XJi7BCGVHnvx4rPH9YmqFm96jBlKi';


  if($username === $allowedUsername && password_verify($password, $hash)){
    return true;
  }
  return false;
}