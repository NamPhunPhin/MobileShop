<?php
    class binhluan{
        public function __construct()
        {
            
        }

        function insertcomment($ma_sp,$makh,$noidung)
        {
            $db = new connect();
            $date = new DateTime("now");
            $datecreate = $date->format("Y-m-d");
            $query = "insert into binhluan(ma_bl,mahh,makh,ngaybl,noidung)
                values (Null,$ma_sp,$makh,'$datecreate','$noidung')";

            $db->exec($query);
        }

        function getCount($ma_sp)
        {
            $db = new connect();
            $select = "select count(ma_bl) from binhluan where mahh=$ma_sp";
            $result = $db->getIstance($select);
            return $result[0];
        }

        function Hienthicomment($ma_sp)
        {
            $db = new connect();
            $select = "select a.tenkh, b.noidung, b.ngaybl from customer a INNER join binhluan b on a.makh=b.makh where b.mahh=$ma_sp ORDER by b.ma_bl DESC";
            
            $result = $db->getlist($select);
            return $result;
        }
    }
?>