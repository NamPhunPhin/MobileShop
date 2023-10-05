<?php
    class dangnhap{
        function __construct()
        {

        }
        // kiểm tra admin có tồn tại không
        function getAdmin($user,$pass)
        {
            $db=new connect();
            $select="select * from admin where user='$user' and password='$pass'";
            // echo $select;
            $result=$db->getInstance($select);
            return $result;
        }

    }
?>