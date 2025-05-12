<?php
    $sql_pro = "SELECT * FROM baiviet WHERE baiviet.id_baiviet='$_GET[id]' LIMIT 1";
    $query_pro = mysqli_query($mysqli,$sql_pro);
    $quey_pro_all = mysqli_query($mysqli,$sql_pro);

    $row_title = mysqli_fetch_array($query_pro);
?>
<div class="row">
<h3>Bài viết: <span style="text-transform: uppercase;"><?php echo $row_title['tenbaiviet']?></span> </h3><!-- nếu chưa có sản phẩm sẽ không hiện tên danh mục-->
        <?php 
            while($row_pro = mysqli_fetch_array($quey_pro_all)){
        ?>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <img width="100%" class="img img-responsive" src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_pro['hinhanh']?>">
            <p class="tomtat_baiviet_chitiet">Tóm tắt: <?php echo $row_pro['tomtat']?></p>
            <p class="noidung_baiviet_chitiet">Nội dung: <?php echo $row_pro['noidung']?></p>
            </a>
        </div>
        <?php
        }
        ?>
</div>   
<div style="clear:both;"></div>