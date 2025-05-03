<!--để in ra màn hình-->
<?php
    $sql_lietke_sp = "SELECT * FROM sanpham, danhmuc WHERE sanpham.id_danhmuc=danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
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
    <th>Danh mục</th>
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
    <td ><img src="/Chef-s_choice/admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']; ?>" width="150px"></td>
    <td ><?php echo $row['giasp'] ?></td>
    <td ><?php echo $row['soluong'] ?></td>
    <td ><?php echo $row['ten_danhmuc'] ?></td>
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
        <a href="/Chef-s_choice/admincp/modules/quanlysp/xuly.php?xoa&idsanpham=<?php echo $row['id_sanpham']; ?>">Xóa</a> | 
        <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham']; ?>">Sửa</a>
    </td>
</tr>
<?php
}
?>
</table>
