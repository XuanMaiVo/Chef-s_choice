<?php
    $sql_sua_danhmucbv = "SELECT * FROM danhmucbaiviet WHERE id_danhmucbaiviet ='$_GET[iddanhmucbv]'LIMIT 1";
    $query_sua_danhmucbv = mysqli_query($mysqli, $sql_sua_danhmucbv);
?>


<p>Sửa danh mục bài viết</p>
 <table style="border: 1px solid black; width: 50%; border-collapse: collapse;">
<form method="POST" action="/Chef-s_choice/admincp/modules/quanlydanhmucbaiviet/xuly.php?iddanhmucbv=<?php echo $_GET['iddanhmucbv']?>"><!--Đường dẫn trực tiếp-->
<?php
  while($dong = mysqli_fetch_array($query_sua_danhmucbv)){
  ?>
  <tr>
      <td>Tên danh mục</td>
      <td><input type="text" value ="<?php echo $dong['tendanhmucbaiviet']?>" name="tendanhmucbaiviet"></td>
    </tr>
    <tr>
      <td>Thứ tự</td>
      <td><input type="text" value="<?php echo $dong['thutu']?>" name="thutu"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="suadanhmucbaiviet" value="Sửa danh mục bài viết"></td>
    </tr>
    <?php
  }
    ?>
  </form>
  </table>