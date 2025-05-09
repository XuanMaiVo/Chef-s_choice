<?php
    // Lấy tham số trang từ URL
    if(isset($_GET['trang'])) {
        $page = $_GET['trang'];
    } else {
        $page = '1';
    }

    // Tính toán vị trí bắt đầu
    if($page == '' || $page == 1) {
        $begin = 0;
    } else {
        $begin = ($page - 1) * 3;
    }

    // Truy vấn sản phẩm theo danh mục với phân trang
    $sql_pro = "SELECT * FROM sanpham WHERE sanpham.id_danhmuc='$_GET[id]' ORDER BY sanpham.id_sanpham DESC LIMIT $begin, 5";
    $query_pro = mysqli_query($mysqli, $sql_pro);

    // Lấy tên danh mục
    $sql_cate = "SELECT * FROM danhmuc WHERE danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
    $query_cate = mysqli_query($mysqli, $sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
?>
<h3>Danh mục sản phẩm: <?php echo $row_title['ten_danhmuc']?></h3>
<ul class="product_list">
    <?php 
        while($row_pro = mysqli_fetch_array($query_pro)) {
    ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']?>">
            <p class="title_product">Tên sản phẩm: <?php echo $row_pro['tensanpham']?></p>
            <p class="price_product">Giá: <?php echo number_format($row_pro['giasp'], 0, ',', '.').'VND' ?></p>
        </a>
    </li>
    <?php
        }
    ?>
</ul>
<div style="clear:both;"></div>

<!-- Phần phân trang -->
<style>
    ul.list_trang {
        padding: 0;
        margin: 0;
        list-style: none;
    }
    ul.list_trang li {
        float: left;
        padding: 5px 13px;
        margin: 5px;
        background: burlywood;
    }
    ul.list_trang li a {
        color: black;
        text-align: center;
        text-decoration: none;
        padding: 5px;
        margin: 5px;
    }
</style>
<p>Trang: </p>
<?php
    // Đếm tổng số sản phẩm trong danh mục
    $sql_trang = mysqli_query($mysqli, "SELECT * FROM sanpham WHERE sanpham.id_danhmuc='$_GET[id]'");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count / 3); // 3 sản phẩm mỗi trang
?>
<ul class="list_trang">
    <?php
        for($i = 1; $i <= $trang; $i++) {
    ?>
    <li>
        <a <?php if($i == $page) { echo 'style="background:red"'; } ?> 
           href="index.php?quanly=danhmucsanpham&id=<?php echo $_GET['id'] ?>&trang=<?php echo $i ?>">
           <?php echo $i ?>
        </a>
    </li>
    <?php
        }
    ?>
</ul>