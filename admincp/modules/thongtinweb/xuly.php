<?php
include('../../config/config.php'); // Kết nối CSDL

$thongtinlienhe = $_POST['thongtinlienhe'];
$id = $_GET['id'];


 if (isset($_POST['suathongtinlienhe'])) {
    $sql_update = "UPDATE lienhe SET thongtinlienhe='".$thongtinlienhe."'  WHERE id=1 ";
    mysqli_query($mysqli, $sql_update);
    header('Location: /Chef-s_choice/admincp/modules/ad_index.php?action=quanlyweb&query=capnhat');
} 
?>

 