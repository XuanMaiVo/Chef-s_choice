<?php
include('../../config/config.php'); // Kết nối CSDL

$tenloaibaiviet = $_POST['tendanhmucbaiviet'] ?? '';
$thutu = $_POST['thutu'] ?? '';
$id = $_GET['iddanhmucbv'] ?? '';

// Thêm danh mục
if (isset($_POST['themdanhmucbaiviet'])) {
    $sql_them = "INSERT INTO danhmucbaiviet (tendanhmucbaiviet, thutu) VALUES('".$tenloaibaiviet."', '".$thutu."')";
    mysqli_query($mysqli, $sql_them);
    header('Location: /Chef-s_choice/admincp/modules/ad_index.php?action=quanlydanhmucbaiviet&query=them');
 
// Sửa danh mục
}
 elseif (isset($_POST['suadanhmucbaiviet']) && isset($_GET['iddanhmucbv'])) {
    $sql_update = "UPDATE danhmucbaiviet SET tendanhmucbaiviet='$tenloaibaiviet', thutu='$thutu' WHERE id_danhmucbaiviet='$id'";
    mysqli_query($mysqli, $sql_update);
    header('Location: /Chef-s_choice/admincp/modules/ad_index.php?action=quanlydanhmucbaiviet&query=them');

// Xóa danh mục
} elseif (isset($_GET['iddanhmucbv'])) {
    $sql_xoa = "DELETE FROM danhmucbaiviet WHERE id_danhmucbaiviet='$id'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location: /Chef-s_choice/admincp/modules/ad_index.php?action=quanlydanhmucbaiviet&query=them');
}
?>

 