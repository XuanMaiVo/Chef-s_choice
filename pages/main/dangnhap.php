<?php
    if(isset($_POST['dangnhap'])){
        $email=$_POST['email'];
        $matkhau=$_POST['matkhau'];

        if (!preg_match('/@gmail\.com$/', $email)) {
            echo '<p style="color:red">Email phải kết thúc bằng @gmail.com</p>';
        } else {
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
}
?>
<form action="" autocomplete="off" method="POST">
    <table class="table-login" style="border: 1px solid black; text-align:center; border-collapse:collapse;">
        <tr>
            <td colspan="2"><h3>Đăng nhập</h3>
        </tr>
        <tr>
            <td>Tài khoản</td>
            <td> <input type="text" name="email" id="email" size="25" placeholder="Email..." required>
                <span id="emailError" class="error"></span>
            </td>
        </tr>

        <tr>
            <td>Mật khẩu</td>
            <td>
            <input type="password" name="matkhau" id="matkhau" placeholder="Mật khẩu...">
            <button type="button" onclick="togglePasswordVisibility()">👁️</button>
            </td>
        </tr>
        <script>
            function togglePasswordVisibility() {
            var passwordField = document.getElementById("matkhau");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
            }

            function validateEmail() {
        const email = document.getElementById('email').value;
        const errorElement = document.getElementById('emailError');
        
        if (!email.endsWith('@gmail.com')) {
            errorElement.textContent = 'Email phải kết thúc bằng @gmail.com';
            return false;
        }
        errorElement.textContent = '';
        return true;
    }
    
    
    document.getElementById('email').addEventListener('input', function() {
        const email = this.value;
        const errorElement = document.getElementById('emailError');
        
        if (email && !email.endsWith('@gmail.com')) {
            errorElement.textContent = 'Email phải kết thúc bằng @gmail.com';
        } else {
            errorElement.textContent = '';
        }
    });
        </script>

        <tr>
            <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
        </tr>
    </table>
</form>