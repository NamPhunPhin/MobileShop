<?php



    if(isset($_SESSION['makh']))
    {
        $makh=$_SESSION['makh'];
        $or = new hoadon();
        $sohd=$or->insertOrder($makh);


        $total=0;
        foreach($_SESSION['cart'] as $key => $item)
        {
            $or->insertOrderDetail($sohd,$item['ma'],$item['soluong'],$item['mausac'],$item['cauhinh'],$item['total']);
            $total+=$item['total'];
        }

        $or->updateOrderTotal($sohd,$total);

        $_SESSION['masohd']=$sohd ;

        $usr = new user();
            $result = $usr->user_info($_SESSION['username']);
            $email = $result['email'];
            $address = $result['diachi'];

            $checkemail = $usr->getemail($email);
            if (!empty($checkemail)) {
                $code = random_int(1000, 10000);
                $mail = new PHPMailer;
                $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
                $mail->Host = 'smtp.gmail.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
                $mail->Port = 587;                                //Sets the default SMTP server port
                $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
                $mail->Username = 'shagara258@gmail.com';                    //Sets SMTP username
                $mail->Password = 'mjgduxpuyplpzxoc'; //Phplytest20@php					//Sets SMTP password
                $mail->SMTPSecure = 'tls';                            //Sets connection prefix. Options are "", "ssl" or "tls"
                $mail->From = 'shagara258@gmail.com';                    //Sets the From email address for the message
                $mail->FromName = 'Ly';                //Sets the From name of the message
                $mail->AddAddress($email, 'User');        //Adds a "To" address
                //$mail->AddCC($_POST["email"], $_POST["name"]);	//Adds a "Cc" address
                // $mail->WordWrap = 50;                            //Sets word wrapping on the body of the message to a given number of characters
                $mail->IsHTML(true);                            //Sets message type to HTML				
                $mail->Subject = "Thank you for purchase #".$code;                //Sets the Subject of the message
                $mail->Body = "Xác nhận thành công. Đơn hàng sẽ được vận chuyển đến ".$address;                //An HTML or plain text message body
                if ($mail->Send())                                //Send an Email. Return true on success or false on error
                {
                    echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Xác nhận thành công',
                        text: 'Hãy kiểm tra email của bạn'
                      })</script>";
                } else {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Xác nhận thất bại',
                        text: 'Oops...'
                      })</script>";
                }
              
            } else {
                echo '<script> alert("Địa chỉ email ko tồn tại")</script>';
                include("./View/forgetpassword.php");
            }
        

        include("View/home.php");
    }
    else
    {
        echo "<script>alert('Vui lòng đăng nhập để thực hiện thanh toán')</script>";
        include("View/account.php");
    }
?>