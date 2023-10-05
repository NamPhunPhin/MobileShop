<?php
    // include "./View/hanghoa.php";
    $act="hanghoa";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch($act){
        case 'hanghoa':
            include "./View/hanghoa.php";
            break;
        case 'edit':
            include "./View/edithanghoa.php";
            break;
        case 'themsp':
            include "./View/edithanghoa.php";
            break;  
        case 'themsp_action':
                $tenhh=$_POST['tenhh'];
                $dongia = $_POST['dongia'];
                $giamgia = $_POST['giamgia'];
                $hinh = $_FILES['image']['name'];
                $maloai = $_POST['maloai'];
                $mota = $_POST['mota'];
                $soluongton = $_POST['slt'];
                $mausac = $_POST['mausac'];
                $cauhinh = $_POST['cauhinh'];
                // lay gia tri xong, luc mnay insetr vao database
                $hh=new hanghoa();
                $check=$hh->insertsp($tenhh,$dongia,$giamgia,$hinh,$maloai,$mota,$mausac,$cauhinh,$soluongton);
                if($check!==false)
                {
                    uploadimage();
                    echo '<script> alert("Insert thanh cong")</script>';
                    include "./View/hanghoa.php";
                } else {
                    echo '<script> alert("Insert no thanh cong")</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=themsp"/>';
                }
            break;  
        case 'edit_action':
            if(isset($_GET['id']))
            {
                $mahh=$_GET['id'];
                $tenhh=$_POST['tenhh'];
                $dongia = $_POST['dongia'];
                $giamgia = $_POST['giamgia'];
                $hinh = $_FILES['image']['name'];
                $maloai = $_POST['maloai'];
                $mota = $_POST['mota'];
                $soluongton = $_POST['slt'];
                $mausac = $_POST['mausac'];
                $cauhinh = $_POST['cauhinh'];
                // lay gia tri xong, luc mnay insetr vao database
                $hh=new hanghoa();
                $checkup=$hh->updatesp($mahh,$tenhh,$dongia,$giamgia,$hinh,$maloai,$mota,$mausac,$cauhinh,$soluongton);
                if($checkup!==false)
                {
                    uploadimage();
                    echo '<script> alert("Update thành công")</script>';
                    include "./View/hanghoa.php";
                } else {
                    echo '<script> alert("Update ko thành công")</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=themsp"/>';
                }
            break;  
        }
        case 'xoa_sp':
            if (isset($_GET['id'])) {
                $hh = new hanghoa();
                $check=$hh->delete_sp($_GET['id']);
                if($check!==false)
                {
                    echo '<script> alert("Xóa thành công")</script>';
                    include "./View/hanghoa.php";
                }else{
                    echo '<script> alert("Xóa ko thành công")</script>';
                }
            }
            break;
    }
?>
