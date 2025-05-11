<?php 
include('../../config/config.php');

$tenbaiviet = $_POST['tenbaiviet'];

$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;//đặt tên ảnh theo thời gian
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc= $_POST['danhmucbv'];

//thêm san pham 
if (isset($_POST['thembaiviet'])) {
    $tenbaiviet = $_POST['tenbaiviet'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;//đặt tên ảnh theo thời gian
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc= $_POST['danhmucbv'];

    //Kiểm tra trống
    if (
        empty($tenbaiviet) ||
        empty($tomtat) ||
        empty($noidung) ||
        empty($tinhtrang) ||
        empty($danhmuc) ||
        empty($hinhanh)
    ) {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin!'); window.history.back();</script>";
        exit();
    }

    // Thêm bài viết
    $sql_them = "INSERT INTO baiviet(tenbaiviet,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) VALUES('".$tenbaiviet."', '".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
    header('Location: /Chef-s_choice/admincp/modules/ad_index.php?action=quanlybaiviet&query=them');

}
// Sửa bài viết
 elseif(isset($_POST['suabaiviet'])) {
    $tenbaiviet = $_POST['tenbaiviet'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc= $_POST['danhmucbv'];

    // if (
    //     empty($tensanpham) ||
    //     empty($tomtat) ||
    //     empty($noidung) ||
    //     empty($tinhtrang) ||
    //     empty($danhmuc)
    // ) {
    //     echo "<script>alert('Vui lòng nhập đầy đủ tất cả các trường bắt buộc!'); window.history.back();</script>";
    //     exit();
    // }

    
    if(!empty($_FILES['hinhanh']['name'])){
        move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
        $sql_update = "UPDATE baiviet SET tenbaiviet='".$tenbaiviet."',hinhanh='".$hinhanh."', tomtat='".$tomtat."', 
        noidung='".$noidung."', tinhtrang='".$tinhtrang."' WHERE id_baiviet='$_GET[idbaiviet]'";
    }else{
        $sql_update = "UPDATE baiviet SET tenbaiviet='".$tenbaiviet."', tomtat='".$tomtat."', 
        noidung='".$noidung."', tinhtrang='".$tinhtrang."' WHERE id_baiviet='$_GET[idbaiviet]'";
    }
    mysqli_query($mysqli, $sql_update);
    header('Location: /Chef-s_choice/admincp/modules/ad_index.php?action=quanlybaiviet&query=them');

} else {
    // XÓA bài viết
    $id = $_GET['idbaiviet'];
    $sql = "SELECT * FROM baiviet WHERE id_baiviet = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($query)){
        if (!empty($row['hinhanh'])) {
            unlink('uploads/'.$row['hinhanh']);
        }
    }
    $sql_xoa = "DELETE FROM baiviet WHERE id_baiviet = '$id'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location: /Chef-s_choice/admincp/modules/ad_index.php?action=quanlybaiviet&query=them');
}
?>