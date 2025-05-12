<?php
    $sql_pro = "SELECT * FROM baiviet WHERE baiviet.id_danhmuc='$_GET[id]' ORDER BY baiviet.id_baiviet DESC";
    $query_pro = mysqli_query($mysqli,$sql_pro);
    //get tên danh mục
    $sql_cate = "SELECT * FROM danhmucbaiviet WHERE danhmucbaiviet.id_danhmucbaiviet='$_GET[id]' LIMIT 1";
    $query_cate = mysqli_query($mysqli,$sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
?>
<h3>Danh mục bài viết: <span style="text-transform: uppercase;"><?php echo $row_title['tendanhmucbaiviet']?></span> </h3><!-- nếu chưa có sản phẩm sẽ không hiện tên danh mục-->
<div class="row">
        <?php 
            while($row_pro = mysqli_fetch_array($query_pro)){
        ?>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <a href="index.php?quanly=baiviet&id=<?php echo $row_pro['id_baiviet'] ?>">
            <img width="100%" class="img img-responsive" src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_pro['hinhanh']?>">
            <p class="title_baiviet">Tên bài viết: <?php echo $row_pro['tenbaiviet']?></p>
            <p class="tomtat_baiviet"><?php echo $row_pro['tomtat']?></p>
            </a>
            </div>
        <?php
        }
        ?>
</div>    