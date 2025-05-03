<?php

// Create connection
$mysqli = new mysqli("localhost", "root","","data");

// Check connection
if ($mysqli->connect_error) {
  echo "Kết nối lỗi" . $mysqli->connect_error; 
  exit();
}

?>