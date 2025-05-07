<?php
    if(isset($_POST['dangnhap'])){
        $email=$_POST['email'];
        $matkhau=$_POST['matkhau'];
        $sql="SELECT * FROM dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
        $row=mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
        $row_data=mysqli_fetch_array($row);
            $_SESSION['dangky']= $row_data['tenkhachhang'];
            $_SESSION['id_khachhang']= $row_data['id_dangky'];
            header("Location:/Chef-s_choice/index.php?quanly=giohang");
        }else{
            echo '<p style="color:red">Tài khoản hoặc mật khẩu không đúng!</p>';
        }
    }
?>
<form action="" autocomplete="off" method="POST">
    <table class="table-login" style="border: 1px solid black; text-align:center; border-collapse:collapse;">
        <tr>
            <td colspan="2"><h3>Đăng nhập</h3>
        </tr>
        <tr>
            <td>Tài khoản</td>
            <td><input type="text" name="email" placeholder="Email..."></td>
        </tr>

        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="matkhau" placeholder="Mật khẩu..."></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
        </tr>
    </table>
</form>