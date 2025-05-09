<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
</head>
<body>
    <div class="container">
        <h1>Thêm sản phẩm mới</h1>
        <form method="POST" action="/Chef-s_choice/admincp/modules/quanlysp/xuly.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="tensanpham">Tên sản phẩm</label>
                <input type="text" id="tensanpham" name="tensanpham" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="masp">Mã sản phẩm</label>
                    <input type="text" id="masp" name="masp" required>
                </div>

                <div class="form-group">
                    <label for="giasp">Giá sản phẩm</label>
                    <input type="number" id="giasp" name="giasp" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="soluong">Số lượng</label>
                    <input type="number" id="soluong" name="soluong" required>
                </div>

                <div class="form-group">
                    <label for="hinhanh">Hình ảnh</label>
                    <input type="file" id="hinhanh" name="hinhanh" required>
                </div>
            </div>

            <div class="form-group">
                <label for="tomtat">Tóm tắt</label>
                <textarea id="tomtat" name="tomtat" required></textarea>
            </div>

            <div class="form-group">
                <label for="noidung">Nội dung</label>
                <textarea id="noidung" name="noidung" required></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="danhmuc">Danh mục sản phẩm</label>
                    <select id="danhmuc" name="danhmuc" required>
                        <?php
                        $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_danhmuc DESC";
                        $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                        while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                        ?>
                        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"> 
                            <?php echo $row_danhmuc['ten_danhmuc'] ?> 
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tinhtrang">Tình trạng</label>
                    <select id="tinhtrang" name="tinhtrang" required>
                        <option value="1">Kích hoạt</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
            </div>

            <button type="submit" name="themsanpham" class="submit-btn">Thêm sản phẩm</button>
        </form>
    </div>
</body>
</html>