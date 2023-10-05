<?php
    class connect{
        var $db = null ;

        public function __construct()
        {
            $dsn = 'mysql:host=localhost; dbname=mobile_shop' ;
            $user = 'root' ;
            $pass = '' ;
            $this->db = new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")) ;
        }

        public function getlist($select)
        {
            $result = $this->db->query($select) ;
            return $result ;
        }

        public function getIstance($select)
        {
            $result=$this->db->query($select) ;
            $result=$result->fetch() ;
            return $result ;
        }

        public function exec($query){
            $result = $this->db->exec($query);
            return $result ;
        }
    }
?>