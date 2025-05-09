<div id="main">
    <?php
        include("sidebar/sidebar.php");
    ?>
<div class="main-content">
    <?php
?>
    <p style="font-weight: bold; color: blue;">Xin chào: <?php if(isset($_SESSION['dangky'])){
    echo $_SESSION['dangky'];} ?>
    </p>

    <?php
        if(isset($_GET['quanly'])){
            $tam = $_GET['quanly'];
        }else{
            $tam = ''; 
        }
        if($tam=='danhmucsanpham'){
            include("main/danhmuc.php");
        }elseif($tam=='giohang'){
            include("main/giohang.php");
        }elseif($tam=='danhmucbaiviet'){
            include("main/danhmucbaiviet.php");
        }
        elseif($tam=='baiviet'){
            include("main/baiviet.php");
        }
        elseif($tam=='tintuc'){
            include("main/tintuc.php");
        }elseif($tam=='lienhe'){
            include("main/lienhe.php");
        }elseif($tam=='sanpham'){
            include("main/sanpham.php");
        }elseif($tam=='dangky'){
            include("main/dangky.php");
        }elseif($tam=='thanhtoan'){
            include("main/thanhtoan.php");
        }elseif($tam=='dangnhap'){
            include("main/dangnhap.php");
        }elseif($tam=='timkiem'){
            include("main/timkiem.php");
        }elseif($tam=='camon'){
            include("main/camon.php");
        }elseif($tam=='thaydoimatkhau'){
            include("main/thaydoimatkhau.php");
        }else{
            include("main/index.php");
        }
            ?>
        </div>
    </div>