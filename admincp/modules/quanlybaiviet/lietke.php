<!--để in ra màn hình--> 
<?php
    $sql_lietke_bv = "SELECT * FROM baiviet, danhmucbaiviet WHERE baiviet.id_danhmuc=danhmucbaiviet.id_danhmucbaiviet ORDER BY id_baiviet DESC";
    $query_lietke_bv = mysqli_query($mysqli, $sql_lietke_bv);
?>

<p>Liệt kê bài viết</p>
<table style="border: 1px solid black; width: 100%; border-collapse: collapse; text-align:center">
<tr>
    <th>ID</th>
    <th>Tên bài viết</th>
    <th>Hình ảnh</th>
    <th>Danh mục</th>
    <th>Tóm tắt</th>
    <th>Nội dung</th>
    <th>Trạng thái</th>
    <th>Quản lý</th>
</tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($query_lietke_bv)){
    $i++;
?> 
<tr>
    <td ><?php echo $i; ?></td>
    <td ><?php echo $row['tenbaiviet'] ?></td>
    <td ><img src="/Chef-s_choice/admincp/modules/quanlybaiviet/uploads/<?php echo $row['hinhanh']; ?>" width="150px"></td>
    <td ><?php echo $row['tendanhmucbaiviet'] ?></td>
    <td ><?php echo $row['tomtat'] ?></td>
    <td ><?php echo $row['noidung'] ?></td>
    <td ><?php if ($row['tinhtrang']==1)
    {
        echo 'Kích hoạt';
    }else{
        echo 'Ẩn';
    } ?>
    </td>
    <td>
        <a href="/Chef-s_choice/admincp/modules/quanlybaiviet/xuly.php?xoa&idbaiviet=<?php echo $row['id_baiviet']; ?>">Xóa</a> | 
        <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet']; ?>">Sửa</a>
    </td>
</tr>
<?php
}
?>
</table>
