<?php
function do_login(string $username, string $password): bool {
  $allowedUsername = "root";
  $allowedPassword = "0000";

  if($username === $allowedUsername && 
     $password === $allowedPassword){
    return true;
  }

  return false;
}