<!--để in ra màn hình-->
<?php
    
    $sql_lietke_danhmucsp = "SELECT * FROM danhmuc ORDER BY thutu DESC";
    $query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
?>

<p>Liệt kê danh mục sản phẩm</p>
<table style="border: 1px solid black; width: 50%; border-collapse: collapse;">
<tr>
    <th>ID</th>
    <th>Tên danh mục</th>
    <th>Thứ tự</th>
    <th>Quản lý</th>
</tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
    $i++;
?>
<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['ten_danhmuc']; ?></td>
    <td><?php echo $row['thutu']; ?></td>
    <td>
        <a href="/Chef-s_choice/admincp/modules/quanlydanhmucsp/xuly.php?xoa&iddanhmuc=<?php echo $row['id_danhmuc']; ?>">Xóa</a> | 
        <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc']; ?>">Sửa</a>
    </td>
</tr>
<?php
}
?>
</table>
