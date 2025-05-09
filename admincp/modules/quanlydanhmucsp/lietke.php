<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liệt kê danh mục sản phẩm</title>
    <link rel="stylesheet" href="../../css/list.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1 class="page-title">Liệt kê danh mục sản phẩm</h1>
        <?php
        $sql_lietke_danhmucsp = "SELECT * FROM danhmuc ORDER BY thutu DESC";
        $query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
        ?>
        <table class="list-table">
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Thứ tự</th>
                <th>Thao tác</th>
            </tr>
            <?php
            $i = 0;
            while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
                $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['ten_danhmuc']; ?></td>
                <td><?php echo $row['thutu']; ?></td>
                <td class="action-buttons">
                    <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc']; ?>" class="action-btn edit-btn">
                        <i class="fas fa-edit"></i> Sửa
                    </a>
                    <a href="/Chef-s_choice/admincp/modules/quanlydanhmucsp/xuly.php?xoa&iddanhmuc=<?php echo $row['id_danhmuc']; ?>" class="action-btn delete-btn" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>