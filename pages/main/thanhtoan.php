<?php
    session_start();
    include('../../admincp/config/config.php');// kết nối database
    $id_khachhang=$_SESSION['id_khachhang'];
    $code_order=rand(0,9999);
    $insert_cart="INSERT INTO cart(id_khachhang,code_cart,cart_status) VALUE('".$id_khachhang."','".$code_order."',1)";
    $cart_query= mysqli_query($mysqli,$insert_cart);
    if($cart_query){
        //thêm giỏ hàng chi tiết
        foreach($_SESSION['cart'] as $key => $value){
            $id_sanpham=$value['id'];
            $soluong=$value['soluong'];
            $insert_order_details="INSERT INTO cart_details(id_sanpham,code_cart,soluong) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
            mysqli_query($mysqli,$insert_order_details);
        }
    }
    unset($_SESSION['cart']);
    header('Location:/Chef-s_choice/index.php?quanly=camon');
?>