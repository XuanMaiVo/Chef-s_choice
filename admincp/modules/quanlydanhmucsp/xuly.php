<?php
include('../../config/config.php'); // Kết nối CSDL

$tenloaisp = $_POST['tendanhmuc'] ?? '';
$thutu = $_POST['thutu'] ?? '';
$id = $_GET['iddanhmuc'] ?? '';

// Thêm danh mục
if (isset($_POST['themdanhmuc'])) {
    $sql_them = "INSERT INTO danhmuc(ten_danhmuc, thutu) VALUES('$tenloaisp', '$thutu')";
    mysqli_query($mysqli, $sql_them);
    header('Location: /Chef-s_choice/admincp/modules/ad_index.php?action=quanlydanhmucsanpham&query=them');
 
// Sửa danh mục
} elseif (isset($_POST['suadanhmuc']) && isset($_GET['iddanhmuc'])) {
    $sql_update = "UPDATE danhmuc SET ten_danhmuc='$tenloaisp', thutu='$thutu' WHERE id_danhmuc='$id'";
    mysqli_query($mysqli, $sql_update);
    header('Location: /Chef-s_choice/admincp/modules/ad_index.php?action=quanlydanhmucsanpham&query=them');

// Xóa danh mục
} elseif (isset($_GET['iddanhmuc'])) {
    $sql_xoa = "DELETE FROM danhmuc WHERE id_danhmuc='$id'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location: /Chef-s_choice/admincp/modules/ad_index.php?action=quanlydanhmucsanpham&query=them');
}
?>

 