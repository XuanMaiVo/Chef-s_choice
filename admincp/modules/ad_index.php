<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link rel="stylesheet" type="text/css" href="../admin_css/admin.css?v=<?= time(); ?>">
    
=======
    <link rel="stylesheet" href="../../css/admin.css">
>>>>>>> 6d2aaaf4474e8b560008fe6cc619053fde9e94e7
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <script>
		CKEDITOR.replace('tomtat');
        CKEDITOR.replace('noidung');
	</script>
</body>
</html>