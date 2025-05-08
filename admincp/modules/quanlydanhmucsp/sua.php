<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa danh mục sản phẩm</title>
    <link rel="stylesheet" href="../../css/admin.css">
</head>
<body>
    <div class="container">
        <p class="themdanhmuc_ten">Sửa danh mục sản phẩm</p>
        <?php
        $sql_sua_danhmucsp = "SELECT * FROM danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
        $query_sua_danhmucsp = mysqli_query($mysqli, $sql_sua_danhmucsp);
        ?>
        <form class="form_tdm" method="POST" action="/Chef-s_choice/admincp/modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
            <table>
                <?php
                while($dong = mysqli_fetch_array($query_sua_danhmucsp)){
                ?>
                <tr>
                    <td>Tên danh mục</td>
                    <td><input type="text" value="<?php echo $dong['ten_danhmuc']?>" name="tendanhmuc" required></td>
                </tr>
                <tr>
                    <td>Thứ tự</td>
                    <td><input type="number" value="<?php echo $dong['thutu']?>" name="thutu" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </form>
    </div>
</body>
</html>