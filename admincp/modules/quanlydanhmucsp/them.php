<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục sản phẩm</title>
    <link rel="stylesheet" href="../../css/admin.css">
</head>
<body>
    <div class="container">
        <p class="themdanhmuc_ten">Thêm danh mục sản phẩm</p>
        <form class="form_tdm" method="POST" action="/Chef-s_choice/admincp/modules/quanlydanhmucsp/xuly.php">
            <table>
                <tr>
                    <td>Tên danh mục</td>
                    <td><input type="text" name="tendanhmuc" required></td>
                </tr>
                <tr>
                    <td>Thứ tự</td>
                    <td><input type="number" name="thutu" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="themdanhmuc" value="Thêm danh mục sản phẩm"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>