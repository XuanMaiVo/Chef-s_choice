<?php
session_start();
include('../../admincp/config/config.php');// kết nối database
//thêm số lượng
if(isset($_GET['cong'])){
    $id=$_GET['cong'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id']!=$id){
            $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id' => $cart_item['id'],'soluong' => $cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            $_SESSION['cart'] =$product;
        }else{
            
            if($cart_item['soluong']<10){//cho tối đa 10 sản phẩm
                $tangsoluong= $cart_item['soluong'] + 1;
                $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id' => $cart_item['id'],'soluong' => $tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }else{
$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id' => $cart_item['id'],'soluong' => $cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }
            $_SESSION['cart'] =$product;
        }
    }
    header('Location:../../index.php?quanly=giohang');
}
//trừ số lượng
if(isset($_GET['tru'])){
    $id=$_GET['tru'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id']!=$id){
            $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id' => $cart_item['id'],'soluong' => $cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            $_SESSION['cart'] =$product;
        }else{
            $tangsoluong= $cart_item['soluong'] - 1;
            if($cart_item['soluong']>1){//tối thiểu 1 sản phẩm
                
                $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id' => $cart_item['id'],'soluong' => $tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }else{
$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id' => $cart_item['id'],'soluong' => $cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }
            $_SESSION['cart'] =$product;
        }
    }
    header('Location:../../index.php?quanly=giohang');
}
//xóa sản phẩm
if(isset($_GET['xoa']) && $_GET['xoa']){
    $id=$_GET['xoa'];
    $product = array();
    foreach($_SESSION['cart'] as $cart_item){

        if($cart_item['id'] != $id){  // Chỉ giữ lại sản phẩm KHÔNG trùng ID
            $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id' => $cart_item['id'],'soluong' => $cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
        }
        
        $_SESSION['cart'] =$product;
            if(empty($_SESSION['cart'])){
            unset($_SESSION['cart']);
    }
    } 
}
header('Location:../../index.php?quanly=giohang');
//xóa tất cả
if(isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
    unset($_SESSION['cart']);
    header('Location:../../index.php?quanly=giohang');
}
//thêm sản phẩm vào cart 
if(isset($_POST['themgiohang'])){
    $id=$_GET['idsanpham'];
    $soluong=1;
    $sql ="SELECT * FROM sanpham WHERE id_sanpham='".$id."' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_array($query);
    if($row){
        $new_product=array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong,'giasp'=>$row['giasp'],'hinhanh'=>$row['hinhanh'],'masp'=>$row['masp']));    
        //kiemtra session gio hang ton tai
        if(isset($_SESSION['cart'])){
            $found=false;
            foreach($_SESSION['cart'] as $cart_item){
                //nếu sản phẩm trùng
                if($cart_item['id']==$id){
                     $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$id,'soluong' => $cart_item['soluong'] + 1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);    
        $found = true;
                }else{
                    //nếu sản phẩm không trùng
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                }
            }
            if($found==false){
                //liên kết dữ liệu neww_product với product
                $_SESSION['cart']= array_merge($product,$new_product);
            }else{
                $_SESSION['cart']=$product;
            }
        }else{
            $_SESSION['cart']=$new_product;
        }
    }
    header('Location:../../index.php?quanly=giohang');

}
?>