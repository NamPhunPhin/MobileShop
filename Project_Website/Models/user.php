<?php
    class user{
        function insert_user($tenkh,$user,$pass,$email,$diachi,$sdt)
        {
            $db = new connect() ;
            $query="insert into customer(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro)
            value(NULL,'$tenkh','$user','$pass','$email','$diachi','$sdt',default)" ;

            $db->exec($query);
        }

        function user_info($username)
        {
            $db = new connect() ;
            $query = "SELECT * FROM customer WHERE username='{$username}'" ;
            $result = $db->getIstance($query);
            return $result ;
        }

        function check_user($username)
        {
            $db = new connect();
            $query="SELECT username FROM customer WHERE username='{$username}'";

            $result = $db->getIstance($query);
            return $result;
        }

        function check_pass($username)
        {
            $db = new connect();
            $query="SELECT matkhau FROM customer WHERE username='{$username}'";

            $result = $db->getIstance($query);
            return $result;
        }

        function getemail($email)
        {
            $db = new connect();
            $select = "select * from customer where email='$email'";
            $result = $db->getIstance($select);
            return $result;
        }

    }
?>