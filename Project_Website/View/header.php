<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="General/css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="General/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="General/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="General/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="General/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="General/css/style.css" />

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                    <?php
                    if (!isset($_SESSION['makh'])) {
                        echo "<li><a href='index.php?action=account'><i class='fa fa-user-o'></i>Sign in/Sign up</a></li>";
                    }else{
                        echo "<li><a href='#'><i class='fa fa-user-o'></i> Welcome,".$_SESSION['tenkh']."</a></li>";
                        echo "<li><a href='index.php?action=account&&act=signout'><i class='fa fa-arrow-right'></i>Sign out</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="./img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form method="post" action="index.php?action=store&&act=timkiem">
                                <input class="input input-select" name="txtsearch" placeholder="Search here">
                                <button type="submit" class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Your Cart</span>
                                    <div class="qty">
                                        <?php
                                            $dem = 0;
                                            if (isset($_SESSION['cart'])) {
                                                $dem = count($_SESSION['cart']);
                                            } else {
                                                $dem = 0;
                                            }
                                            echo $dem ;
                                        ?>
                                    </div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        <?php
                                            $cart = new cart();
                                            if(isset($_SESSION['cart']))
                                            {
                                                $subtotal = $cart->gettotal();
                                                foreach ($_SESSION['cart'] as $key=>$item) {
                                        ?>
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="./General/img/<?php echo $item['hinh'] ?>" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#"><?php echo $item['ten'] ?></a></h3>
                                                <h4 class="product-price"><span class="qty"><?php echo $item['soluong'] ?>x</span><?php echo number_format($item['total']) ?>đ</h4>
                                            </div>
                                            <a href="index.php?action=cart&act=delete_mini&id=<?php echo $key ?>"><button class="delete"><i class="fa fa-close"></i></button></a>
                                        </div>
                                        <?php
                                                }
                                        ?>                   
                                    </div>
                                    <div class="cart-summary">
                                        <small><?php echo $dem ; ?> Item(s) selected</small>
                                        <h5>SUBTOTAL: <?php echo number_format($subtotal) ?>đ</h5>
                                    </div>
                                    <?php } ?>
                                    <div class="cart-btns">
                                        <a href="#">View Cart</a>
                                        <a href="index.php?action=cart&act=detail">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li><a href="index.php?action=home">Home</a></li>
                    <li><a href="index.php?action=store">Store</a></li>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->