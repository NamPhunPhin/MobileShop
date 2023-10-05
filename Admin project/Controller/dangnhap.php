<?php
    $act="dangnhap";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'dangnhap':
            include "./View/dangnhap.php";
            break;
        
        case 'dangnhap_action':
            if(isset($_POST['txtusername']) && isset($_POST['txtpassword']))
            {
                $user=$_POST['txtusername'];
                $pass=$_POST['txtpassword'];
                // kiểm tra xem user và pass có tồn tại ko
                $dn=new dangnhap();
                $check=$dn->getAdmin($user,$pass);
                if($check!=false)
                {
                    $_SESSION['admin']=$check[0];
                    echo '<script> alert("Đăng nhập thành công");</script>';
                    // nếu đăng nhập thành công thì hiển thị trang hàng hóa
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa"/>';
                }
                else
                {
                    echo '<script> alert("Đăng nhập ko thành công");</script>';
                    include "./View/dangnhap.php";
                }
            }
            break;
    }
?>
