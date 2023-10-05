<?php
    class hang{
        public function __construct()
        {

        }

        function gethang() {
            $db = new connect() ;
            $select = "select * from brand";
            $result = $db->getlist($select);
            return $result;
        }

        function count_sp($brand) {
            $db = new connect() ;
            $select = "SELECT COUNT(*) as 'qty' FROM product WHERE mahang_sp='$brand'";
            $result = $db->getlist($select);
            return $result;
        }

        function count_spAll() {
            $db = new connect();
            $select = "Select count(*) as 'quantity' from product";
            $result = $db->getlist($select);
            return $result ;
        }
    }
?>