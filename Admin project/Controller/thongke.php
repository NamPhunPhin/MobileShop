<?php
    $act='thongke';
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }

    switch($act)
    {
        case 'thongke':
            include "./View/thongke.php";
            break;
        case 'thongkethong_ke&lich=thang':
            include "./View/thongke.php";
            break;
    }
?>
