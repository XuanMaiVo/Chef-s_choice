<!--để in ra màn hình-->
<?php
    
    $sql_lietke_danhmucbv = "SELECT * FROM danhmucbaiviet ORDER BY thutu DESC";
    $query_lietke_danhmucbv = mysqli_query($mysqli, $sql_lietke_danhmucbv);
?>

<p>Liệt kê danh mục bài viết</p>
<table style="border: 1px solid black; width: 50%; border-collapse: collapse; text-align:center;">
<tr>
    <th>ID</th>
    <th>Tên danh mục</th>
    <th>Thứ tự</th>
    <th>Quản lý</th>
</tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($query_lietke_danhmucbv)){
    $i++;
?>
<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['tendanhmucbaiviet']; ?></td>
    <td><?php echo $row['thutu']; ?></td>
    <td>
        <a href="/Chef-s_choice/admincp/modules/quanlydanhmucbaiviet/xuly.php?xoa&iddanhmucbv=<?php echo $row['id_danhmucbaiviet']; ?>">Xóa</a> | 
        <a href="?action=quanlydanhmucbaiviet&query=sua&iddanhmucbv=<?php echo $row['id_danhmucbaiviet']; ?>">Sửa</a>
    </td>
</tr>
<?php
}
?>
</table>
