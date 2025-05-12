<<<<<<< HEAD

    <h4 >Danh mục sản phẩm</h4>
    <ul class="list_sidebar">
        <?php
            $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_danhmuc DESC";
            $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
            while($row= mysqli_fetch_array($query_danhmuc)){        
        ?>
        <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc']?>"><?php echo $row['ten_danhmuc']?></a></li>
        <?php
        }
        ?>              
    </ul>

    <h4 >Danh mục bài viết</h4>
    <ul class="list_sidebar">
        <?php
            $sql_danhmucbv = "SELECT * FROM danhmucbaiviet ORDER BY id_danhmucbaiviet DESC";
            $query_danhmucbv = mysqli_query($mysqli,$sql_danhmucbv);
            while($row= mysqli_fetch_array($query_danhmucbv)){        
        ?>
        <li style="text-transform: uppercase;"><a href="index.php?quanly=danhmucbaiviet&id=<?php echo $row['id_danhmucbaiviet']?>"><?php echo $row['tendanhmucbaiviet']?></a></li>
        <?php
        }
        ?>              
    </ul>
=======
>>>>>>> 45feeaa47e16814ac877cea39a3d3b199024cec1
