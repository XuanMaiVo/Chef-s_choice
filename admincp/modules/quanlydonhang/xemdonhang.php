<p>Xem đơn hàng</p>
<!--để in ra màn hình-->
<?php
    
    $sql_lietke_dh = "SELECT * FROM cart_details, sanpham WHERE cart_details.id_sanpham=sanpham.id_sanpham AND cart_details.code_cart='$_GET[code]' ORDER BY cart_details.id_cart_details  DESC";
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>

<table style="border: 1px solid black; width: 100%; border-collapse: collapse; text-align:center;">
<tr>
    <th>ID</th>
    <th>Mã đơn hàng</th>
    <th>Sản phẩm</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>
</tr>
<?php
$i = 0;
$tongtien = 0;
while($row = mysqli_fetch_array($query_lietke_dh)){
    $i++;
    $tongtien += $row['giasp']*$row['soluongmua'];
?>
<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['code_cart']; ?></td>
    <td><?php echo $row['tensanpham']; ?></td>
    <td><?php echo $row['soluongmua']; ?></td>
    <td><?php echo number_format($row['giasp'], 0, ',', '.').'vnđ' ; ?></td>
    <td><?php echo number_format(($row['giasp']*$row['soluongmua']), 0, ',', '.' ).'vnđ'; ?></td>
    
</tr>
<?php
}
?>
<td colspan="6">
        <p>Tổng tiền: <?php echo number_format($tongtien,  0, ',', '.') ?> </p>
    </td>
</table>
