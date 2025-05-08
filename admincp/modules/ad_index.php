<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin.css">
    <title>Admin</title>
</head>
<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('Location: /Chef-s_choice/admincp/modules/login.php');
    }
?>
<body>
    <h3 class="title_admin">Welcome to Admin</h3>
    <div class="wrapper">
    <?php
        include('../config/config.php');
        include('../modules/ad_header.php');
        include('../modules/ad_menu.php');
        include('../modules/ad_main.php');
        include('../modules/ad_footer.php');
    ?>
    </div>
</body>
</html>