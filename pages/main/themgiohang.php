<?php
session_start();
include('../../admincp/config/config.php');// kết nối database
//thêm số lượng
//trừ số lượng
//xóa
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
                     $product[]=array(array('tensanpham'=>$cart_item['tensanpham'],'id'=>$id,'soluong'=>$soluong+1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']));    
        $found = true;
                }else{
                    //nếu sản phẩm khoogn trùng
                    $product[]=array(array('tensanpham'=>$cart_item['tensanpham'],'id'=>$id,'soluong'=>$soluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']));    
        
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
<!--Nếu như bấm thêm giỏ hàng lần nữa thì nó ko cần biết trùng hay ko thì nó lại thêm sp đó vào giỏ hàng-->