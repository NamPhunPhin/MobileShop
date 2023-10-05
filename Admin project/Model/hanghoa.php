<?php
    class hanghoa{
        function __construct(){}
            // phuong thuc lay hang hoa all
            function getHangHoaAll(){
                $db=new connect();
                $select="select * from product";
                $result=$db->getList($select);
                return $result;
            }

             // phương thức insert vào database
        function insertsp($tenhh,$dongia,$giamgia,$hinh,$hang,$mota,$mausac,$cauhinh,$soluongton)
        {
            $db=new connect();
            $query="insert into product(ma_sp,mahang_sp,ten_sp,gia_sp,giam_gia,mau_sac,cau_hinh,mota_sp,img_sp,soluongton)
                    values (NULL,'$hang','$tenhh',$dongia,$giamgia,'$mausac','$cauhinh','$mota','$hinh',$soluongton)";
            $db->exec($query);
        }
            // phuong thuc lay thong tin cua 1 sp
        function getHangHoaId($id)
        {
            $db=new connect();
            $select="select * from product where ma_sp=$id";
            $result=$db->getInstance($select);
            return $result;
        }

            // phương thức cập nhật hàng hóa
        function updatesp($id,$tenhh,$dongia,$giamgia,$hinh,$hang,$mota,$mausac,$cauhinh,$soluongton)
        {
            $db=new connect();
            $query="update product
                    set mahang_sp='$hang',
                    ten_sp='$tenhh',
                    gia_sp=$dongia,
                    giam_gia=$giamgia,
                    mau_sac='$mausac',
                    cau_hinh='$cauhinh',
                    mota_sp='$mota',
                    img_sp='$hinh',
                    soluongton=$soluongton
                    where ma_sp=$id
            ";
            $db->exec($query);
        }

        // pt thong ke
        function getThongKeHangHoa()
        {
            $db=new connect();
            $select="select a.ten_sp,sum(b.soluongmua) as soluong from product a, detail_bill b where a.ma_sp=b.mahh group by a.ten_sp";
            $result=$db->getList($select);
            return $result;
        }

        function delete_sp($id)
        {
            $db = new connect();
            $select = "delete from product where ma_sp=$id";
            $db->exec($select);
        }

        function getListpageHH($start,$limit)
        {
            $db = new connect() ;
            $select = "select * from product limit ".$start.",".$limit ;

            $result=$db->getlist($select) ;
            return $result ;
        }


    }
?>
