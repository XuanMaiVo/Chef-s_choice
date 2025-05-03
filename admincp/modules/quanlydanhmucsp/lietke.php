<!--để in ra màn hình-->
<?php
    $sql_lietke_danhmucsp = "SELECT * FROM danhmuc ORDER BY thutu DESC";
    $query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
?>

<p>Liệt kê danh mục sản phẩm</p>
<table style="border: 1px solid black; width: 50%; border-collapse: collapse;">
<tr>
    <th style="border: 1px solid black; padding: 5px;">ID</th>
    <th style="border: 1px solid black; padding: 5px;">Tên danh mục</th>
    <th style="border: 1px solid black; padding: 5px;">Thứ tự</th>
    <th style="border: 1px solid black; padding: 5px;">Quản lý</th>
</tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
    $i++;
?>
<tr>
    <td style="border: 1px solid black; padding: 5px;"><?php echo $i; ?></td>
    <td style="border: 1px solid black; padding: 5px;"><?php echo $row['ten_danhmuc']; ?></td>
    <td style="border: 1px solid black; padding: 5px;"><?php echo $row['thutu']; ?></td>
    <td style="border: 1px solid black; padding: 5px;">
        <a href="/chef-choices/admincp/modules/quanlydanhmucsp/xuly.php?xoa&id=<?php echo $row['id_danhmuc']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a> | 
        <a href="?action=quanlydanhmucsanpham&query=sua&id=<?php echo $row['id_danhmuc']; ?>">Sửa</a>
    </td>
</tr>
<?php
}
?>
</table>
