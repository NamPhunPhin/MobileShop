<?php
    session_start();
    include("Models/connect.php") ;
    include("Models/sanpham.php") ;
    include("Models/cart.php") ;
    include("Models/user.php") ;
    include("Models/hoadon.php") ;
    include("Models/page.php") ;
    include("Models/binhluan.php") ;
    include("Models/hang.php");
    include("Models/class.phpmailer.php");
    include("Models/class.smtp.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("View/header.php") ;
        include("Controller/show.php") ;
        // include("View/product.php") ;
        include("View/footer.php")
    ?>
</body>
</html>