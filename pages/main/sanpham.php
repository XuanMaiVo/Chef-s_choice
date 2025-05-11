<p>Chi tiết sản phẩm</p>
<?php
    $sql_chitiet = "SELECT * FROM sanpham, danhmuc WHERE sanpham.id_danhmuc= danhmuc.id_danhmuc AND sanpham.id_sanpham ='$_GET[id]' LIMIT 1";
    $query_chitiet = mysqli_query($mysqli,$sql_chitiet);
    while($row_chitiet=mysqli_fetch_array($query_chitiet)){


?>
<div class="wrapper_chitiet">
<div class="hinhanh_sanpham">
    <img width="80%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
</div>
<form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>">
<div class="chitiet_sanpham">
    <h3>
        Tên sản phẩm: <?php echo $row_chitiet['tensanpham']?>
    </h3>
    <p>Mã sản phẩm: <?php echo $row_chitiet['masp']?></p>
    <p>Giá: <?php echo number_format($row_chitiet['giasp'],0,',','.').'VND' ?></p>
    <p>Số lượng: <?php echo $row_chitiet['soluong']?></p>
    <p>Danh mục: <?php echo $row_chitiet['ten_danhmuc']?></p>
    <p><input class ="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
</div>
</form>
</div>
<div class="clear"></div>
<!-- END tabs-content -->
    <div class="tabs">
        <ul id="tabs-nav">
            <li><a href="#chitiet">Tóm tắt sản phẩm</a></li>
            <li><a href="#noidung">Nội dung</a></li>
            <li><a href="#hinhanh">Hình ảnh</a></li>
        </ul> <!-- END tabs-nav-->

        <div id="tabs-content">
            <div id="chitiet" class="tab-content">
                <?php echo $row_chitiet['tomtat'] ?>
            </div>
            <div id="noidung" class="tab-content">
                <?php echo $row_chitiet['noidung'] ?>
            </div>
            <div id="hinhanh" class="tab-content">
                <img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
            </div>
        </div>
    </div>
<?php  
    }
?>
