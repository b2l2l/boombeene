<?php


$valid_passwords = array ("d5c8d10595a7a28b5afdbdc5fcbdf5c3" => "1863eed815c95d3b74b8ab04140bbf35");
$valid_users = array_keys($valid_passwords);

$user = md5($_SERVER['PHP_AUTH_USER']);
$pass = md5($_SERVER['PHP_AUTH_PW']);

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="My Realm"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Not authorized");
}

?>