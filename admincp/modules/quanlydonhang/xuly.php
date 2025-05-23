<?php
require($_SERVER['DOCUMENT_ROOT'].'/Chef-s_choice/carbon/autoload.php');
include('../../config/config.php');

use Carbon\Carbon;
use Carbon\CarbonInterval;
$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

if (isset($_GET['code'])) {
    $code_cart = $_GET['code'];
    $sql_update = "UPDATE cart SET cart_status = 0 WHERE code_cart = '".$code_cart."'";
    $query = mysqli_query($mysqli, $sql_update);
    $sql_lietke_dh = "SELECT * FROM cart_details, sanpham 
                      WHERE cart_details.id_sanpham = sanpham.id_sanpham 
                      AND cart_details.code_cart = '$code_cart' 
                      ORDER BY cart_details.id_cart_details DESC";
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);

    $sql_thongke = "SELECT * FROM thongke WHERE ngaydat = '$now'";
    $query_thongke = mysqli_query($mysqli, $sql_thongke);
    
    $soluongmua = 0;
    $doanhthu = 0;

    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $soluongmua += $row['soluongmua'];
        $doanhthu += $row['giasp'];
    }

    if(mysqli_num_rows($query_thongke) == 0){
        $soluongban = $soluongmua;
        $doanhthu = $doanhthu;
        $donhang = 1;
        $sql_update_thongke = mysqli_query($mysqli, "INSERT INTO thongke(ngaydat, soluongban, doanhthu, donhang) VALUE('$now', '$soluongban', '$doanhthu', '$donhang')");
    }elseif(mysqli_num_rows($query_thongke) != 0){
        while($row_tk = mysqli_fetch_array($query_thongke)){
            $soluongban = $row_tk['soluongban'] + $soluongban;
            $doanhthu = $row_tk['doanhthu'] + $doanhthu;
            $donhang = $row_tk['donhang'] + 1;
            $sql_update_thongke = mysqli_query($mysqli, "UPDATE thongke SET soluongban = '$soluongban', doanhthu = '$doanhthu', donhang = '$donhang' WHERE ngaydat = '$now'");
           }
    }
    header('Location:/Chef-s_choice/admincp/modules/ad_index.php?action=quanlydonhang&query=lietke');
}
?>
