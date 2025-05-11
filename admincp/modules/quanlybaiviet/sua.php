<?php
    $sql_sua_bv = "SELECT * FROM baiviet WHERE id_baiviet='$_GET[idbaiviet]'LIMIT 1";
    $query_sua_bv = mysqli_query($mysqli, $sql_sua_bv);
?>
<p>Sửa bài viết</p>
<table style="border: 1px solid black; width: 50%; border-collapse: collapse;">
<?php
while($row = mysqli_fetch_array($query_sua_bv)){
?>
<form method="POST" action="/Chef-s_choice/admincp/modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet']?>" enctype="multipart/form-data"><!--Đường dẫn trực tiếp-->
  <tr>
      <td>Tên bài viết</td>
      <td><input type="text" value="<?php echo $row['tenbaiviet'] ?>" name="tenbaiviet" ></td>
    </tr>

    <tr>
      <td >Hình ảnh</td>
      <td>
        <input type="file" name="hinhanh">
        <img src="/Chef-s_choice/admincp/modules/quanlybaiviet/uploads/<?php echo $row['hinhanh']; ?>" width="150px">
      </td>
    </tr>

    <tr>
      <td>Tóm tắt</td>
      <td><textarea rows="10" name="tomtat" style="resize:none"><?php echo $row['tomtat'] ?></textarea></td>
    </tr>

    <tr>
      <td>Nội dung</td>
      <td><textarea rows="10" name="noidung" style="resize:none"><?php echo $row['noidung'] ?></textarea></td>
    </tr>

<tr> 
      <td >Danh mục bài viết</td>
      <td>
        <select name="danhmucbv">
          <?php
          $sql_danhmuc = "SELECT * FROM danhmucbaiviet ORDER BY id_danhmucbaiviet DESC";
          $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
          while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
            if($row_danhmuc['id_danhmucbaiviet']==$row['id_danhmucbaiviet']){
            ?>
            <option selected value="<?php echo $row_danhmuc['id_danhmucbaiviet'] ?>"> <?php echo $row_danhmuc['tendanhmucbaiviet'] ?> 
            </option>
          <?php
          }else{       
          ?>
            <option value="<?php echo $row_danhmuc['id_danhmucbaiviet'] ?>"> <?php echo $row_danhmuc['tendanhmucbaiviet'] ?> 
            </option>
          <?php
          }
        }
        ?>
        </select>
      </td>
    </tr>

    <tr>
      <td >Tình trạng</td>
      <td>
        <select name="tinhtrang">
          <?php 
          if($row['tinhtrang'] == 1) {
          ?>
          <option value="1" selected>Kích hoạt</option>
          <option value="0">Ẩn</option>
          <?php
          }else{
          ?>
          <option value="1">Kích hoạt</option>
          <option value="0" selected>Ẩn</option>
          <?php
          }
          ?>
        </select>
      </td>
    </tr>

    <tr>
      <td></td>
      <td colspan="2"><input type="submit" name="suabaiviet" value="Sửa bài viết"><!--nút--></td>
    </tr>
  </form>
  <?php
}
  ?>
  </table>