<p>Quản lý thông tin website</p>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
</head>
<body>
    <div class="container">
        <h1>Thêm liên hệ mới</h1>
        <?php
        $sql_lh = "SELECT * FROM lienhe WHERE id=1";
        $query_lh = mysqli_query($mysqli, $sql_lh);
        ?>
        <?php
            while($dong = mysqli_fetch_array($query_lh)){
        ?>
        <form method="POST" action="/Chef-s_choice/admincp/modules/thongtinweb/xuly.php" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="thongtinlienhe">Thông tin liên hệ: </label>
                <textarea rows="10" id="thongtinlienhe" name="thongtinlienhe" required><?php echo $dong['thongtinlienhe'] ?></textarea>
            </div>

            <button type="submit" name="suathongtinlienhe" class="submit-btn">Cập nhật</button>
        <?php
            }
        ?>
        </form>
    </div>
</body>
</html>