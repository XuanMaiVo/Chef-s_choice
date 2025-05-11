<p>Liệt kê đơn hàng</p>
<!--để in ra màn hình-->
<?php
    
    $sql_lietke_dh = "SELECT * FROM cart, dangky WHERE cart.id_khachhang=dangky.id_dangky ORDER BY cart.id_cart DESC";
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>

<table style="border: 1px solid black; width: 100%; border-collapse: collapse; text-align:center;">
<tr>
    <th>ID</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Tình trạng</th>   
    <th>Quản lý</th>
    
</tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($query_lietke_dh)){
    $i++;
?>
<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['code_cart']; ?></td>
    <td><?php echo $row['tenkhachhang']; ?></td>
    <td><?php echo $row['diachi']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['dienthoai']; ?></td>
    <td>
        <?php 
        if ($row['cart_status'] == 1){
            echo '<a href="../modules/quanlydonhang/xuly.php?code='.$row['code_cart'].' "> Đơn hàng mới </a>';
        }else{
            echo ' Đã xem ';
        }
        ?>
    </td>
    <td>
        <a href="ad_index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart']; ?>">Xem đơn hàng</a> 
    </td>
</tr>
<?php
}
?>
</table>
