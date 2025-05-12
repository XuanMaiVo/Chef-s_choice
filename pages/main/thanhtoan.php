<?php
    session_start();
    include('../../admincp/config/config.php');// kết nối database
<<<<<<< HEAD
    require('../../carbon/autoload.php');
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    $now = Carbon::now('Asia/Ho_Chi_Minh');
=======
    require('../mail/sendmail.php');
>>>>>>> 45feeaa47e16814ac877cea39a3d3b199024cec1
    $id_khachhang=$_SESSION['id_khachhang'];
    $code_order=rand(0,9999);
    $insert_cart="INSERT INTO cart(id_khachhang,code_cart,cart_status,cart_date) VALUE('".$id_khachhang."','".$code_order."',1,'".$now."')";
    $cart_query= mysqli_query($mysqli,$insert_cart);
    if($cart_query){
        //thêm giỏ hàng chi tiết
        foreach($_SESSION['cart'] as $key => $value){
            $id_sanpham=$value['id'];
            $soluong=$value['soluong'];
            $insert_order_details="INSERT INTO cart_details(id_sanpham,code_cart,soluongmua) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
            mysqli_query($mysqli,$insert_order_details);
        }
        $tieude = "Đặt hàng website banhangcongnghe.net thành công!";
        $noidung = "<p>Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng : " . $code_order . "</p>";
        $noidung .= "<h4>Đơn hàng đặt bao gồm :</h4>";
        
        foreach($_SESSION['cart'] as $key => $val){
        $noidung .= '<ul style="border:1px solid blue;margin:10px;">';
        $noidung .= '<li>' . $val['tensanpham'] . '</li>';
        $noidung .= '<li>' . $val['masp'] . '</li>';
        $noidung .= '<li>' . number_format($val['giasp'],0,',','.') . 'đ</li>';
        $noidung .= '<li>' . $val['soluong'] . '</li>';
        $noidung .= '</ul>';
    }
    $maildathang = $_SESSION['email'];
    $mail = new Mailer();
    $mail->dathangmail($tieude,$noidung,$maildathang);
    }
    $tieude = "Đặt hàng thành công";
    $noidung = "Cảm ơn bạn đã đặt hàng tại Chef's Choice. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất. Mã đơn hàng của bạn là: ".$code_order.".";
    $noidung.= "<h4>Đơn hàng đặt bao gồm: </h4>";
    
    foreach($_SESSION['cart'] as $key => $val) {
        $noidung .= "<ul style='border:1px solid blue; margin:10px;'>
                     <li>".$val['tensanpham']."</li>
                     <li>".$val['masp']."</li>
                     <li>".number_format($val['giasp'], 0, ',', '.')."đ</li>
                     <li>".$val['soluong']."</li>
                     </ul>";
    }

    unset($_SESSION['cart']);
    header('Location:/Chef-s_choice/index.php?quanly=camon');
?>