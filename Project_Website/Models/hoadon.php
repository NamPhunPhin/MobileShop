<?php
    class hoadon{
        public function __construct()
        {
            
        }

        function insertOrder($mahh)
        {
            $db = new connect() ;
            $date = new DateTime('now') ;
            $datecreate = $date->format('Y-m-d') ;

            $makh = $_SESSION['makh'] ;
            $query = "insert into bill(masohd,makh,ngaydat,tongtien)values(NULL,$makh,'$datecreate',0)";

            $db->exec($query) ;

            $select = "select masohd from bill order by masohd desc limit 1";
            $int=$db->getIstance($select);
            return $int[0] ;
        }

        function insertOrderDetail($masohd,$mahh,$soluong,$mausac,$cauhinh,$thanhtien)
        {
            $db=new connect();
            $query="insert into detail_bill(masohd,mahh,soluongmua,mausac,cauhinh,thanhtien,tinhtrang)values($masohd,$mahh,$soluong,'$mausac','$cauhinh',$thanhtien,0)";
            $db->exec($query);
        }

        function updateOrderTotal($sohdid,$total)
        {
            $db = new connect() ;
            $query="update bill set tongtien=$total where masohd=$sohdid";
            $db->exec($query);
        }

        function getOrder($sohdid)
        {
            $db = new connect();
            $select = "select b.masohd,a.tenkh,a.diachi,a.sodienthoai,b.ngaydat from customer a INNER join bill b on a.makh=b.makh where b.masohd=$sohdid";
            $result = $db->getIstance($select) ;
            return $result ;
        }

        function getOrderDetail($sohdid)
        {
            $db = new connect() ;
            $select = "Select a.ten_sp,a.gia_sp,b.mausac,b.cauhinh,b.soluongmua,b.thanhtien from product a INNER join detail_bill b on a.ma_sp=b.mahh where masohd=$sohdid";
            $result=$db->getlist($select);
            return $result ;
        }
    }
?>