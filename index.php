<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/style.css?v=<?= time(); ?>">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Web phụ kiện điện thoại</title>   
</head>
<body>
    <div class="container-fluid">
        <div class="row">
        <?php
        session_start();
            include("admincp/config/config.php");
            include("pages/header.php");
            include("pages/menu.php");
            include("pages/main.php");
            include("pages/footer.php");
        ?>
        </div>
        
        
    </div>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script type="text/javascript">
        // Show the first tab and hide the rest
        $('#tabs-nav li:first-child').addClass('active');
        $('.tab-content').hide();
        $('.tab-content:first').show();

        // Click function
        $('#tabs-nav li').click(function(){
        $('#tabs-nav li').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();
        
        var activeTab = $(this).find('a').attr('href');
        $(activeTab).fadeIn();
        return false;
        });


        // responsive arrow
        /**/

    jQuery( document ).ready(function() {
            
            var back =jQuery(".prev");
            var	next = jQuery(".next");
            var	steps = jQuery(".step");
            
            next.bind("click", function() { 
                jQuery.each( steps, function( i ) {
                    if (!jQuery(steps[i]).hasClass('current') && !jQuery(steps[i]).hasClass('done')) {
                        jQuery(steps[i]).addClass('current');
                        jQuery(steps[i - 1]).removeClass('current').addClass('done');
                        return false;
                    }
                })		
            });
            back.bind("click", function() { 
                jQuery.each( steps, function( i ) {
                    if (jQuery(steps[i]).hasClass('done') && jQuery(steps[i + 1]).hasClass('current')) {
                        jQuery(steps[i + 1]).removeClass('current');
                        jQuery(steps[i]).removeClass('done').addClass('current');
                        return false;
                    }
                })		
            });

        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
 integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html> 