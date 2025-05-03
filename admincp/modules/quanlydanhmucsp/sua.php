<?php
    $sql_sua_danhmucsp = "SELECT * FROM danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]'LIMIT 1";
    $query_sua_danhmucsp = mysqli_query($mysqli, $sql_sua_danhmucsp);
?>

<p>Sửa danh mục sản phẩm</p><!--danh mục sản phẩm-->
 <table style="border: 1px solid black; width: 50%; border-collapse: collapse;">
<form method="POST" action="/Chef-s_choice/admincp/modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
  <?php
  while($dong = mysqli_fetch_array($query_sua_danhmucsp)){
  ?>
  <tr>
      <td>Tên danh mục</td>
      <td><input type="text" value ="<?php echo $dong['ten_danhmuc']?>" name="tendanhmuc"></td>
    </tr>
    <tr>
      <td>Thứ tự</td>
      <td><input type="text" value="<?php echo $dong['thutu']?>" name="thutu"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
    </tr>
    <?php
  }
    ?>
  </form>
  </table>