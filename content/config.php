<?php
$host = 'localhost';
$user = 'unn_w22037621';
$password = 'Universal@123';
$db = 'unn_w22037621';
$conn = mysqli_connect($host, $user, $password, $db);
if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL ";
    exit();
  }
?>