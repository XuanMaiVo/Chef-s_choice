<?php

// Create connection
// $mysqli = new mysqli("localhost", "root","","data");

$mysqli = new mysqli("localhost:3306", "root","","data");//tui xài port này
// $mysqli = new mysqli("localhost:3307", "root","","data");//tui xài port này

// Check connection
if ($mysqli->connect_error) {
  echo "Kết nối lỗi" . $mysqli->connect_error; 
  exit();
}

?>