<?php
    class sanpham{
        public function __construct()
        {

        }

        public function getsanpham()
        {
            $db = new connect() ;
            $select = "SELECT * FROM `product`" ;
            $result = $db->getlist($select) ;
            return $result ;
        }
        
        public function gethangsanpham($id)
        {
            $db = new connect() ;
            $select = "SELECT ten_hang FROM `product`,`brand` where mahang_sp=ma_hang and ma_sp=$id" ;
            $result = $db->getIstance($select) ;
            return $result ;
        }

        public function getsanphamID($id)
        {
            $db = new connect() ;
            $select = "SELECT * FROM `product` where ma_sp=$id" ;
            $result = $db->getIstance($select) ;
            return $result ;
        }
        
        public function getsanphamBrand($brand)
        {
            $db = new connect() ;
            $select = "SELECT * FROM `product` where mahang_sp='{$brand}'" ;
            $result = $db->getlist($select) ;
            return $result ;
        }

        public function getcauhinh($brand)
        {
            $db = new connect() ;
            $select = "SELECT DISTINCT cau_hinh FROM `product` WHERE mahang_sp='{$brand}'";
            $result = $db->getlist($select) ;
            return $result ;
        }

        public function topsell() {
            $db = new connect() ;
            $select = "SELECT a.ma_sp, COUNT(*) as 'qty'  FROM product a, detail_bill b WHERE a.ma_sp=b.mahh GROUP BY a.ma_sp DESC LIMIT 3";
            $result = $db->getlist($select);
            return $result;
        }

        function getListpageHH($start,$limit)
        {
            $db = new connect() ;
            $select = "select * from product limit ".$start.",".$limit ;

            $result=$db->getlist($select) ;
            return $result ;
        }
        
        function getListpageHHwBrand($start,$limit,$brand)
        {
            $db = new connect() ;
            $select = "select * from product where mahang_sp='$brand' limit ".$start.",".$limit ;

            $result=$db->getlist($select) ;
            return $result ;
        }

        public function timkiem($txtsearch)
        {
            $db= new connect();
            $select = "SELECT * FROM `product` WHERE ten_sp LIKE '%$txtsearch%'";
            $result=$db->getlist($select);
            return $result ;
        }
    }
?>