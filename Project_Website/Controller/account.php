<?php
$act = "";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'signin':
        if (isset($_POST['name_login']) && isset($_POST['password'])) {
            $username = $_POST['name_login'];
            $userpass = md5($_POST['password']);
            $ur = new user();
            $c_name = $ur->check_user($username);
            if ($c_name == null) {
                echo "<script>alert('Tên đăng nhập không đúng')</script>";
                include('View/account.php');
            } else {
                $c_pass = $ur->check_pass($username);
                if ($c_pass[0] == $userpass) {
                    echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Login Successfully',
                        showConfirmButton: false,
                        timer: 1500
                      })</script>";
                    $info = $ur->user_info($username);
                    $_SESSION['makh'] = $info['makh'];
                    $_SESSION['tenkh'] = $info['tenkh'];
                    $_SESSION['username'] = $info['username'];
                    include('View/home.php');
                } else {
                    echo "<script>alert('Mật khẩu không đúng')</script>";
                    include('View/login.php');
                }
            }
        }
        break;

    case 'signout':
        unset($_SESSION['makh']);
        unset($_SESSION['tenkh']);
        unset($_SESSION['username']);
        include('View/home.php');
        break;

    case 'signup':
        if (isset($_POST['user-name']) && isset($_POST['login-name']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['email'])) {
            $tenkh = $_POST['user-name'];
            $username = $_POST['login-name'];
            $matkhau = $_POST['password'];
            $email = $_POST['email'];
            $diachi = $_POST['address'];
            $sdt = $_POST['tel'];
            $crypt = md5($matkhau);
            $ur = new user();
            $check = $ur->check_user($username);
            $err = 0;

            if (empty($tenkh)) {
                $nameErr = "Tên người dùng không được rỗng";
                $err = 1;
            } else { //mss12345
                $name = $tenkh;
                if (!preg_match("/[^0-9]$/", $name)) {
                    $nameErr = "Tên người dùng phải là ký tự";
                    $err = 1;
                }
            }
            
            if (empty($username)) {
                $unameErr = "Tên tài khoản không được rỗng";
                $err = 1;
            }

            if (empty($diachi)) {
                $diachiErr = "Địa chỉ không được rỗng";
                $err = 1;
            }

            if (empty($email)) {
                $emailErr = "Email không được rỗng";
                $err = 1;
            } else { //mss12345
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Email chưa đúng định dạng";
                    $err = 1;
                }
            }

            if (empty($sdt)) {
                $phoneErr = "SĐT không được rỗng";
                $err = 1;
            } else { //mss12345
                $phone = $sdt;
                if (!preg_match("/^[0]{1}\d{9,10}$/", $phone)) {
                    $phoneErr = "Phone phải có số 0 và từ 10-11 số";
                    $err = 1;
                }
            }

            if (empty($matkhau)) {
                $passErr = "Pass không được rỗng";
                $err = 1;
            } else { //mss12345
                if (!preg_match("/^[A-Z]{1}([\w\.@$%^&*()]+){7}$/", $matkhau)) {
                    $passErr = "Pass không hợp lệ (độ dài mật khẩu tối thiểu là 8 chứa ít 1 ký tự hoa )";
                    $err = 1;
                }
            }

            if ($check == null&&$err==0) {
                $ur->insert_user($tenkh, $username, $crypt, $email, $diachi, $sdt);
                echo '<script> alert("Đăng ký thành công"); </script>';
                include('View/home.php');
            } else if($check == null&&$err!=0){
                echo '<script> alert("Đăng ký thất bại"); </script>';
                include('View/account.php');
            }else{
                echo '<script> alert("Tài khoản đã tồn tại"); </script>';
                include('View/account.php');
            }
        }
        break;

    default:
        include("View/account.php");
        break;
}
