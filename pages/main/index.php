<?php
    if(isset($_GET['trang'])){
        $page=$_GET['trang'];
    }else{
        $page='1';
    }
    if($page==''|| $page==1){
        $begin=0;
    }else{
        $begin=($page-1)*5;
    }
    $sql_pro = "SELECT * FROM sanpham, danhmuc WHERE sanpham.id_danhmuc= danhmuc.id_danhmuc ORDER BY sanpham.id_sanpham DESC LIMIT $begin,5";// giới hạn sản phẩm trên 1 trang
    $query_pro = mysqli_query($mysqli,$sql_pro);
?>
<h3>Sản phẩm mới nhất</h3>
    <ul class="product_list">
        <?php
            while($row= mysqli_fetch_array($query_pro)){
        ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>">
            <p class="title_product">Tên sản phẩm: <?php echo $row['tensanpham']?></p>
            <p class="price_product">Giá: <?php echo number_format($row['giasp'],0,',','.').'VND' ?></p>
            <p style= "text-align: center; color:#d1d1d1"><?php echo $row['ten_danhmuc']?></p>
            </a>
        </li>
        <?php 
            }
        ?>
    </ul>
    <div style="clear:both;"></div>
    <style>
        ul.list_trang{
            padding: 0;
            margin: 0;
            list-style: none;
           
            
        }

        ul.list_trang li{
            float: left;
            padding: 5px 13px;
            margin: 5px;
            background: burlywood;
            
        }

        ul.list_trang li a{
            color: black;
            text-align: center;
            text-decoration: none;
            padding: 5px;
            margin: 5px;
        }
    </style>
    <p>Trang: </p>
    <?php
        $sql_trang=mysqli_query($mysqli,"SELECT * FROM sanpham");
        $row_count=mysqli_num_rows($sql_trang);
        $trang= ceil($row_count/5);//5 sản phẩm mỗi trang
    ?>
        <ul class="list_trang">
            <?php
            for($i=1;$i<=$trang;$i++){
            ?>
            <li><a <?php if($i==$page){echo 'style="background:red"';}else{echo'';} ''?>href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php
            }
            ?>
        </ul>
    <div class="banner1"></div>