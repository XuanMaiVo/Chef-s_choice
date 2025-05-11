<p>Thêm bài viết</p> 
 <table style="border: 1px solid black; width: 50%; border-collapse: collapse;">
<form method="POST" action="/Chef-s_choice/admincp/modules/quanlybaiviet/xuly.php" enctype="multipart/form-data"><!--Đường dẫn trực tiếp-->
  <tr>
      <td>Tên bài viết</td>
      <td><input type="text" name="tenbaiviet" ></td>
    </tr>

    <tr>
      <td >Hình ảnh</td>
      <td><input type="file" name="hinhanh" ></td>
    </tr>

    <tr>
      <td>Tóm tắt</td>
      <td><textarea rows="10" width="100%" name="tomtat" style="resize:none"></textarea></td>
    </tr>

    <tr>
      <td>Nội dung</td>
      <td><textarea rows="10" name="noidung"></textarea></td>
    </tr>

    <tr>
      <td >Danh mục bài viết</td>
      <td>
        <select name="danhmucbv">
          <?php
          $sql_danhmucbv = "SELECT * FROM danhmucbaiviet ORDER BY id_danhmucbaiviet DESC";
          $query_danhmucbv = mysqli_query($mysqli,$sql_danhmucbv);
          while($row_danhmucbv = mysqli_fetch_array($query_danhmucbv)){
            ?>
            <option value="<?php echo $row_danhmucbv['id_danhmucbaiviet'] ?>"> 
              <?php echo $row_danhmucbv['tendanhmucbaiviet'] ?> 
            </option>
          <?php
          }
          ?>
        </select>
      </td>
    </tr>

    <tr>
      <td >Tình trạng</td>
      <td>
        <select name="tinhtrang">
          <option value="1">Kích hoạt</option>
          <option value="0">Ẩn</option>
        </select>
      </td>
    </tr>

    <tr> 
      <td></td>
      <td colspan="2"><input type="submit" name="thembaiviet" value="Thêm bài viết"><!--nút--></td>
    </tr>
  </form>
  </table>