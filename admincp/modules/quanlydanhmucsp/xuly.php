<?php
include('../../config/config.php');// kết nối database

$tenloaisp = $_POST['tendanhmuc'] ?? '';
$thutu = $_POST['thutu'] ?? '';
$id = $_GET['id'] ?? '';
//thêm danh mục
if (isset($_POST['themdanhmuc'])) {
    $sql_them = "INSERT INTO danhmuc(ten_danhmuc, thutu) VALUES('".$tenloaisp."', '".$thutu."')";
    mysqli_query($mysqli, $sql_them);
    header('Location: /chef-choices/admincp/modules/ad_index.php?action=quanlydanhmucsanpham&query=them');//đường dẫn trực tiếp

//sửa danh mục
}elseif(isset($_POST['suadanhmuc']) && isset($_GET['id'])){
    $id = $_GET['id'];
    $sql_sua = "UPDATE danhmuc SET ten_danhmuc='$tenloaisp', thutu='$thutu' WHERE id_danhmuc='$id'";
    mysqli_query($mysqli, $sql_sua);
    header('Location:/chef-choices/admincp/modules/ad_index.php?action=quanlydanhmucsanpham&query=them');//đường dẫn trực tiếp

//xóa danh mục
} elseif (!empty($id)) {
    $sql_xoa = "DELETE FROM danhmuc WHERE id_danhmuc = '$id'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location: /chef-choices/admincp/modules/ad_index.php?action=quanlydanhmucsanpham&query=them');// đường dẫn trực tiếp
}
?>
