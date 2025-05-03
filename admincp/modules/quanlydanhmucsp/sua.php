<?php
    $sql_sua_danhmucsp = "SELECT * FROM danhmuc WHERE id_danhmuc='$_GET[id]'LIMIT 1";
    $query_sua_danhmucsp = mysqli_query($mysqli, $sql_sua_danhmucsp);
?>

<p>Thêm danh mục sản phẩm</p><!--danh mục sản phẩm-->
 <table style="border: 1px solid black; width: 50%; border-collapse: collapse;">
<form method="POST" action="/chef-choices/admincp/modules/quanlydanhmucsp/xuly.php?id=<?php echo $_GET['id']?>">
  <?php
  while($doing = mysqli_fetch_array($query_sua_danhmucsp)){
  ?>
  <tr>
      <td style="border: 1px solid black; padding: 5px;">Tên danh mục</td>
      <td style="border: 1px solid black; padding: 5px;">
        <input type="text" name="tendanhmuc" style="width: 98%;">
      </td>
    </tr>

    <tr>
      <td style="border: 1px solid black; padding: 5px;">Thứ tự</td>
      <td style="border: 1px solid black; padding: 5px; ">
        <input type="text" name="thutu" style="width: 98%;">
      </td>
    </tr>

    <tr>
      <td style="border: none;"></td>
      <td style="border: none; padding-top: 10px;">
        <input type="submit" name="themdanhmuc" value="Thêm danh mục sản phẩm">
      </td>
    </tr>
    <?php
  }
    ?>
  </form>
  </table>