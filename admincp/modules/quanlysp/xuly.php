<?php
include('../../config/config.php');// kết nối database

$tensanpham = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$soluong = $_POST['soluong'] ;
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;//đặt tên ảnh theo thời gian
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];


//thêm san pham
if (isset($_POST['themsanpham'])) {
    $sql_them = "INSERT INTO sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang) VALUES('".$tensanpham."', '".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);//thư mục chứa ảnh
    header('Location: /chef-choices/admincp/modules/ad_index.php?action=quanlysanpham&query=them');//đường dẫn trực tiếp

//sửa san pham
}elseif(isset($_POST['suasanpham'])){
    if($hinhanh !=''){
        $sql_update = "UPDATE sanpham SET tensanpham='".$tensanpham."', masp='".$masp."', giasp='".$giasp."', soluong='".$soluong."', hinhanh='".$hinhanh."', tomtat='".$tomtat."', noidung='".$noidung."', tinhtrang='".$tinhtrang."' WHERE id_sanpham='$_GET[ID_sanpham]'";
        move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
    }else{
        $sql_update = "UPDATE sanpham SET tensanpham='".$tensanpham."', masp='".$masp."', giasp='".$giasp."', soluong='".$soluong."', tomtat='".$tomtat."', noidung='".$noidung."', tinhtrang='".$tinhtrang."' WHERE id_sanpham='$_GET[ID_sanpham]'";
    }
    mysqli_query($mysqli, $sql_update);
        header('Location: /chef-choices/admincp/modules/ad_index.php?action=quanlysanpham&query=them');//đường dẫn trực tiếp

//xóa san pham 
} else{
    $id = $_GET['idsanpham'];
    $sql = "SELECT * FROM sanpham WHERE id_sanpham = '.$id.' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM sanpham WHERE id_sanpham = '".$id."'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location: /chef-choices/admincp/modules/ad_index.php?action=quanlysanpham&query=them');
}
?>
