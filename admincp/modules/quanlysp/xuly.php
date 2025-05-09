<?php 
include('../../config/config.php');

<<<<<<< HEAD
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
$danhmuc= $_POST['danhmuc'];

//thêm san pham 
if (isset($_POST['themsanpham'])) {
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
    $danhmuc= $_POST['danhmuc'];

    //Kiểm tra trống
    if (
        empty($tensanpham) ||
        empty($masp) ||
        empty($giasp) ||
        empty($soluong) ||
        empty($tomtat) ||
        empty($noidung) ||
        empty($tinhtrang) ||
        empty($danhmuc) ||
        empty($hinhanh)
    ) {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin!'); window.history.back();</script>";
        exit();
    }

    // Kiểm tra mã sản phẩm hợp lệ
    if (!preg_match('/^SP\d{6}$/', $masp)) {
        echo "<script>alert('Mã sản phẩm phải bắt đầu bằng SP và theo sau là 6 chữ số!'); window.history.back();</script>";
        exit();
    }

    // Kiểm tra mã sản phẩm đã tồn tại chưa
    $sql_check_masp = "SELECT masp FROM sanpham WHERE masp = '".$masp."' LIMIT 1";
    $result_check_masp = mysqli_query($mysqli, $sql_check_masp);
    if (mysqli_num_rows($result_check_masp) > 0) {
        echo "<script>alert('Mã sản phẩm đã tồn tại! Vui lòng nhập mã khác.'); window.history.back();</script>";
        exit();
    }

    // Thêm sản phẩm
    $sql_them = "INSERT INTO sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) VALUES('".$tensanpham."', '".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
    header('Location: /Chef-s_choice/admincp/modules/ad_index.php?action=quanlysp&query=them');

} elseif(isset($_POST['suasanpham'])) {
    $tensanpham = $_POST['tensanpham'];
    $masp = $_POST['masp'];
    $giasp = $_POST['giasp'];
    $soluong = $_POST['soluong'] ;
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc= $_POST['danhmuc'];

    if (
        empty($tensanpham) ||
        empty($masp) ||
        empty($giasp) ||
        empty($soluong) ||
        empty($tomtat) ||
        empty($noidung) ||
        empty($tinhtrang) ||
        empty($danhmuc)
    ) {
        echo "<script>alert('Vui lòng nhập đầy đủ tất cả các trường bắt buộc!'); window.history.back();</script>";
        exit();
    }

    // Kiểm tra mã sản phẩm hợp lệ: bắt đầu bằng SP và theo sau là 6 chữ số
    if (!preg_match('/^SP\d{6}$/', $masp)) {
        echo "<script>alert('Mã sản phẩm phải bắt đầu bằng SP và theo sau là 6 chữ số!'); window.history.back();</script>";
        exit();
    }

    // Sửa sản phẩm
    if(!empty($_FILES['hinhanh']['name'])){
        move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
        $sql_update = "UPDATE sanpham SET tensanpham='".$tensanpham."', masp='".$masp."', giasp='".$giasp."', 
        soluong='".$soluong."', tomtat='".$tomtat."', noidung='".$noidung."', tinhtrang='".$tinhtrang."' WHERE id_sanpham='$_GET[idsanpham]'";
    }else{
        $sql_update = "UPDATE sanpham SET tensanpham='".$tensanpham."', masp='".$masp."', giasp='".$giasp."', 
        soluong='".$soluong."', hinhanh='".$hinhanh."', tomtat='".$tomtat."', noidung='".$noidung."', tinhtrang='".$tinhtrang."' WHERE id_sanpham='$_GET[idsanpham]'";
    }
    mysqli_query($mysqli, $sql_update);
    header('Location: /Chef-s_choice/admincp/modules/ad_index.php?action=quanlysp&query=them');

} else {
    // XÓA SẢN PHẨM
    $id = $_GET['idsanpham'];
    $sql = "SELECT * FROM sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($query)){
        if (!empty($row['hinhanh'])) {
            unlink('uploads/'.$row['hinhanh']);
=======
// Hàm kiểm tra dữ liệu trống
function checkEmpty($data) {
    foreach ($data as $value) {
        if (empty($value)) {
            return true;
>>>>>>> 6d2aaaf4474e8b560008fe6cc619053fde9e94e7
        }
    }
    return false;
}

// Hàm hiển thị thông báo
function showMessage($message, $type = 'error') {
    $color = $type === 'error' ? '#dc2626' : '#059669';
    echo "<div style='position: fixed; top: 20px; right: 20px; padding: 15px 25px; background: white; border-left: 4px solid {$color}; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-radius: 4px; z-index: 1000;'>
            <p style='margin: 0; color: {$color};'>{$message}</p>
          </div>";
    echo "<script>
            setTimeout(function() {
                document.querySelector('div').style.display = 'none';
                window.history.back();
            }, 2000);
          </script>";
    exit();
}

// Xử lý thêm sản phẩm
if (isset($_POST['themsanpham'])) {
    $data = [
        'tensanpham' => $_POST['tensanpham'],
        'masp' => $_POST['masp'],
        'giasp' => $_POST['giasp'],
        'soluong' => $_POST['soluong'],
        'hinhanh' => $_FILES['hinhanh']['name'],
        'tomtat' => $_POST['tomtat'],
        'noidung' => $_POST['noidung'],
        'tinhtrang' => $_POST['tinhtrang'],
        'danhmuc' => $_POST['danhmuc']
    ];

    // Kiểm tra dữ liệu trống
    if (checkEmpty($data)) {
        showMessage('Vui lòng nhập đầy đủ thông tin!');
    }

    // Kiểm tra mã sản phẩm
    if (!preg_match('/^SP\d{6}$/', $data['masp'])) {
        showMessage('Mã sản phẩm phải bắt đầu bằng SP và theo sau là 6 chữ số!');
    }

    // Kiểm tra mã sản phẩm tồn tại
    $sql_check = "SELECT masp FROM sanpham WHERE masp = '{$data['masp']}' LIMIT 1";
    if (mysqli_num_rows(mysqli_query($mysqli, $sql_check)) > 0) {
        showMessage('Mã sản phẩm đã tồn tại! Vui lòng nhập mã khác.');
    }

    // Xử lý upload ảnh
    $hinhanh = time() . '_' . $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

    // Thêm sản phẩm
    $sql_them = "INSERT INTO sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) 
                 VALUES('{$data['tensanpham']}', '{$data['masp']}','{$data['giasp']}','{$data['soluong']}',
                        '{$hinhanh}','{$data['tomtat']}','{$data['noidung']}','{$data['tinhtrang']}','{$data['danhmuc']}')";
    
    if (mysqli_query($mysqli, $sql_them)) {
        move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
        showMessage('Thêm sản phẩm thành công!', 'success');
    } else {
        showMessage('Có lỗi xảy ra khi thêm sản phẩm!');
    }
}

// Xử lý sửa sản phẩm
elseif(isset($_POST['suasanpham'])) {
    $data = [
        'tensanpham' => $_POST['tensanpham'],
        'masp' => $_POST['masp'],
        'giasp' => $_POST['giasp'],
        'soluong' => $_POST['soluong'],
        'hinhanh' => $_FILES['hinhanh']['name'],
        'tomtat' => $_POST['tomtat'],
        'noidung' => $_POST['noidung'],
        'tinhtrang' => $_POST['tinhtrang'],
        'danhmuc' => $_POST['danhmuc']
    ];

    // Kiểm tra dữ liệu trống
    if (checkEmpty($data)) {
        showMessage('Vui lòng nhập đầy đủ thông tin!');
    }

    // Kiểm tra mã sản phẩm
    if (!preg_match('/^SP\d{6}$/', $data['masp'])) {
        showMessage('Mã sản phẩm phải bắt đầu bằng SP và theo sau là 6 chữ số!');
    }

    // Xử lý upload ảnh mới nếu có
    if (!empty($_FILES['hinhanh']['name'])) {
        $hinhanh = time() . '_' . $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
        $hinhanh_sql = ", hinhanh='{$hinhanh}'";
    } else {
        $hinhanh_sql = "";
    }

    // Cập nhật sản phẩm
    $sql_update = "UPDATE sanpham SET 
                   tensanpham='{$data['tensanpham']}', 
                   masp='{$data['masp']}', 
                   giasp='{$data['giasp']}', 
                   soluong='{$data['soluong']}', 
                   tomtat='{$data['tomtat']}', 
                   noidung='{$data['noidung']}', 
                   tinhtrang='{$data['tinhtrang']}'
                   {$hinhanh_sql}
                   WHERE id_sanpham='{$_GET['idsanpham']}'";

    if (mysqli_query($mysqli, $sql_update)) {
        showMessage('Cập nhật sản phẩm thành công!', 'success');
    } else {
        showMessage('Có lỗi xảy ra khi cập nhật sản phẩm!');
    }
}

// Xử lý xóa sản phẩm
else {
    $id = $_GET['idsanpham'];
    
    // Lấy thông tin ảnh cũ
    $sql = "SELECT hinhanh FROM sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    
    // Xóa ảnh cũ nếu có
    if (!empty($row['hinhanh'])) {
        unlink('uploads/'.$row['hinhanh']);
    }
    
    // Xóa sản phẩm
    $sql_xoa = "DELETE FROM sanpham WHERE id_sanpham = '$id'";
    if (mysqli_query($mysqli, $sql_xoa)) {
        showMessage('Xóa sản phẩm thành công!', 'success');
    } else {
        showMessage('Có lỗi xảy ra khi xóa sản phẩm!');
    }
}
?>