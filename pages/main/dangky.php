<?php
    if(isset($_POST['dangky'])){
        $tenkhachhang=$_POST['hovaten'];
        $email=$_POST['email'];
        $dienthoai=$_POST['dienthoai'];
        $diachi=$_POST['diachi'];
        $matkhau=$_POST['matkhau'];
        $sql_dangky = mysqli_query($mysqli,"INSERT INTO dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUES('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
        if($sql_dangky){
            echo '<p style="color:green">Bạn đã đăng ký thành công!</p>';
            $_SESSION['dangky'] = $tenkhachhang;
            header('Location:/Chef-s_choice/index.php?quanly=giohang');
        }
    }
?>
<p>Đăng ký thành viên</p>
<style>
    table.dangky tr td{
        padding:5px;
    }
</style>
<form action="" method="POST">
<table class="dangky" style="border: 1px solid black; border-collapse:collapse;">
    <tr>
        <td>Họ tên</td>
        <td><input type="text" name="hovaten"></td>
    </tr>

    <tr>
        <td>Email</td>
        <td><input type="text" size="50" name="email"></td>
    </tr>

    <tr>
        <td>Điện thoại</td>
        <td><input type="text" size="50" name="dienthoai"></td>
    </tr>

    <tr>
        <td>Địa chỉ</td>
        <td><input type="text" size="50" name="diachi"></td>
    </tr>

    <tr>
        <td>Mật khẩu</td>
        <td><input type="text" size="50" name="matkhau"></td>
    </tr>

    <tr>
       
        <td><input type="submit" name="dangky" value="Đăng ký"></td>
        <td><a href="index.php?quanly=dangnhap">Đăng nhập(đã có tài khoản)</a></td>
    </tr>
</table>
</form>