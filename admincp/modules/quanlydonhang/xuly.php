<?php
    include('../../config/config.php');
    if(isset($_GET['code'])){
        $code_cart = $_GET['code'];
        $sql = "UPDATE cart SET cart_status=0 WHERE code_cart='".$code_cart."' ";
        $query = mysqli_query($mysqli, $sql);
        header('Location:/Chef-s_choice/admincp/modules/ad_index.php?action=quanlydonhang&query=lietke');
        exit;
    }
?>