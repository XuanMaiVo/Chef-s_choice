 <?php
    $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
    
            
 ?>
 <?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    }
 ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?quanly=giohang">Giỏ hàng</a>
        </li>

        <li class="nav-item"><a class="nav-link" href="index.php?quanly=tintuc">Tin tức</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?quanly=lienhe">Liên hệ</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Danh mục sản phẩm
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php 
            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)) { 
          ?>
            <li><a class="dropdown-item" href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['ten_danhmuc']?></a></li>
          <?php 
            } 
          ?>
          </ul>
        </li>

        <?php if(isset($_SESSION['dangky'])) { 
        ?>
        <li class="nav-item"><a class="nav-link" href="index.php?dangxuat=1">Đăng xuất</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?quanly=thaydoimatkhau">Thay đổi mật khẩu</a></li>
        <?php
        } else { ?>
        <li class="nav-item"><a class="nav-link" href="index.php?quanly=dangky">Đăng ký</a></li>
        <?php
        } ?>
      </ul>
      <form class="d-flex" action="index.php?quanly=timkiem" method="POST">
        <input class="form-control me-2" type="search" name="tukhoa" placeholder="Từ khóa..." aria-label="Search">
        <button class="btn btn-outline-success" name="timkiem" type="submit">Tìm kiếm</button>
      </form>
    </div>
  </div>
</nav>


