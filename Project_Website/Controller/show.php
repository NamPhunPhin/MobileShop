<?php
    $ctrl = "home" ;
    if (isset($_GET['action'])) {
        $ctrl = $_GET['action'] ;
    }
    
    switch ($ctrl) {
        case 'home':
            include("View/home.php");
            break;
        
        case 'store':
            include("View/store.php");
            break;
        
        case 'cart':
            include("Controller/cart.php");
            break;
        
        case 'detail':
            include("Controller/product.php");
            break;
        
        case 'account':
            include("Controller/account.php");
            break;
        
        case 'order':
            include("Controller/order.php");
            break;
        
        default:
            # code...
            break;
    }
?>