<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../admin_css/admin.css?v=<?= time(); ?>">
    <!-- JS cho biểu đồ thống kê -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
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

    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    
    <script type="text/javascript">
		CKEDITOR.replace('tomtat');
        CKEDITOR.replace('noidung');
        CKEDITOR.replace('thongtinlienhe');
	</script>

    <script type="text/javascript">
    new Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'chart',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
        { year: '2024-10-12',order: 5, sales: 15000, quantity: 20 },
        { year: '2024-12-12',order: 5, sales: 15000, quantity: 20 },
        { year: '2025-01-05',order: 5, sales: 15000, quantity: 20 }
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'year',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['order','sales','quantity'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Đơn hàng', 'Doanh thu', 'Số lượng bán ra']
    });
</script>
</body>
</html>