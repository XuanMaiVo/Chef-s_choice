<?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangnhap']);
        header("Location:/Chef-s_choice/admincp/modules/login.php");
    }
?>
<<<<<<< HEAD
<p><a href="ad_index.php?dangxuat=1">Đăng xuất : <?php if(isset($_SESSION['dangnhap'])){
        echo $_SESSION['dangnhap'];} ?>
</a></p>
=======
<style>
    .logout {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1000;
        margin: 20px;
    }
    .logout a {
        color: #fff;
        background-color: #4CAF50;
        padding: 10px 15px;
        border-radius: 5px;
        text-decoration: none;
    }
    .logout a:hover{
    background-color: #D32F2F;
    box-shadow: #757575 5px 5px 5px;
}
</style>
<p class="logout"><a href="ad_index.php?dangxuat=1">Đăng xuất : <?php if(isset($_SESSION['dangnhap'])){
        echo $_SESSION['dangnhap'];}
?></a></p>
>>>>>>> 6d2aaaf4474e8b560008fe6cc619053fde9e94e7
