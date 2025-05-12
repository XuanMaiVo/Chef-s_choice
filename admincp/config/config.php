<?php


<<<<<<< HEAD
$mysqli = new mysqli("localhost:3306", "root","","data");
=======
$mysqli = new mysqli("localhost:3306", "root","","data");//tui xài port này
>>>>>>> 45feeaa47e16814ac877cea39a3d3b199024cec1
//$mysqli = new mysqli("localhost:3307", "root","","data");//ThanhTruc xài port này

// Check connection
if ($mysqli->connect_error) {
  echo "Kết nối lỗi" . $mysqli->connect_error; 
  exit();
}

?>