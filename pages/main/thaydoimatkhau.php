<?php
    if(isset($_POST['doimatkhau'])){
        $taikhoan=$_POST['email'];
        $matkhau_cu=($_POST['password_cu']);
        $matkhau_moi=($_POST['password_moi']);
        $sql="SELECT * FROM dangky WHERE email='".$taikhoan."' AND matkhau='".$matkhau_cu."' LIMIT 1";
        $row=mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
           $sql_update = mysqli_query($mysqli, "UPDATE dangky SET matkhau='".$matkhau_moi."' ");
           echo '<p style="color: green"> Mật khẩu đã được thay đổi.</p>';
        }else{
            echo '<p style="color: red"> Tài khoản hoặc mật khẩu cũ không đúng.</p>';
           
        }
    }
?>

<p>Thay đổi mật khẩu</p>
<form action="" autocomplete="off" method="POST">
            <table class="table-login" style="border: 1px solid black; text-align:center; border-collapse:collapse;">
        <tr>
            <td colspan="2"><h3>Đổi mật khẩu</h3>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>

        <tr>
            <td>Mật khẩu cũ</td>
            <td><input type="text" name="password_cu"></td>
        </tr>

        <tr>
            <td>Mật khẩu mới</td>
            <td><input type="text" name="password_moi"></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="doimatkhau" value="Đổi mật khẩu"></td>
        </tr>
            </table>
        </form>