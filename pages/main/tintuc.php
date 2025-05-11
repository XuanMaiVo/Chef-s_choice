<p style="text-align: center; text-transform: uppercase; font-weight: bold;">Tin tức mới nhất</p> 
<?php
    $sql_pro = "SELECT * FROM baiviet WHERE tinhtrang=1 ORDER BY baiviet.id_baiviet DESC";
    $query_pro = mysqli_query($mysqli,$sql_pro);

?>
    <ul class="product_list">
        <?php 
            while($row_pro = mysqli_fetch_array($query_pro)){
        ?>
        <li>
            <a href="index.php?quanly=baiviet&id=<?php echo $row_pro['id_baiviet'] ?>">
                <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_pro['hinhanh']?>">
                <p class="title_baiviet">Tên bài viết: <?php echo $row_pro['tenbaiviet']?></p>
            </a>
            <p style="margin:10px" class="title_baiviet"><?php echo $row_pro['tomtat'] ?></p>
        </li>
        <?php
        }
        ?>
    </ul>       