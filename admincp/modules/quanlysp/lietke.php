<!--để in ra màn hình-->
<?php
    $sql_lietke_sp = "SELECT * FROM sanpham ORDER BY ID_sanpham DESC";
    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>

<p>Liệt kê phẩm</p>
<table style="border: 1px solid black; width: 100%; border-collapse: collapse;">
<tr>
    <th>ID</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Giá sp</th>
    <th>Số lượng</th>
    <th>Mã sp</th>
    <th>Tóm tắt</th>
    <th>Trạng thái</th>
    <th>Quản lý</th>
</tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($query_lietke_sp)){
    $i++;
?>
<tr>
    <td ><?php echo $i; ?></td>
    <td ><?php echo $row['tensanpham'] ?></td>
    <td ><img src="/chef-choices/admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']; ?>" width="150px"></td>
    <td ><?php echo $row['giasp'] ?></td>
    <td ><?php echo $row['soluong'] ?></td>
    <td ><?php echo $row['masp'] ?></td>
    <td ><?php echo $row['tomtat'] ?></td>
    <td ><?php if ($row['tinhtrang']==1)
    {
        echo 'Kích hoạt';
    }else{
        echo 'Ẩn';
    } ?>
    </td>
    <td>
        <a href="/chef-choices/admincp/modules/quanlysp/xuly.php?idsanpham=<?php echo $row['ID_sanpham']; ?>">Xóa</a> | 
        <a href="?action=quanlysp&query=sua&idsanpham=<?php echo isset($row['id_danhmuc']) ? $row['ID_sanpham'] : ''; ?>">Sửa</a>
    </td>
</tr>
<?php
}
?>
</table>
