<?php
$password = "password_admin";
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash;
