<?php
    $act = "" ;

    if (isset($_GET['act'])) {
        $act = $_GET['act'] ;
    }

    switch ($act) {
        case 'comment':
            if(isset($_POST['txtmahh']))
            {
                $ma_sp = $_POST['txtmahh'];
                $makh = $_SESSION['makh'];
                $noidung = $_POST['comment'];

                $bl = new binhluan();
                $bl->insertcomment($ma_sp,$makh,$noidung);
            }
            include("View/product.php") ;
            break;
        
        default:
            include("View/product.php") ;
            break;
    }
?>