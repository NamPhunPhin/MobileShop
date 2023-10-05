<?php
$act="loai";
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}
switch($act){
        case 'loai':
            include "./View/addloaisanpham.php";
            break;
        case 'loai_action':
            if(isset($_POST['submit_file']))
            {
                //b1: lay file ve 
                $file=$_FILES['file']['tmp_name'];
                //b2: loai bo nhung ky tu dac biet khi doc file csv xBB xEF xBF
                file_put_contents($file,str_replace("\xBB\xEF\xBF","",file_get_contents($file)));
                //b3: mo file ra 
                $file_open = fopen($file,"r");
                // b4: doc noi dung cua file 
                while(($csv=fgetcsv($file_open,1000,","))!==false)
                {
                    $maloai=$csv[0];
                    $tenloai=$csv[1];
                    $db=new connect();
                    $query="insert into brand(ma_hang,ten_hang) values($maloai,'$tenloai')";
                    $db->exec($query);
                }
                echo '<script> alert("Import thanh cong");</script>';
            }
        include "./View/addloaisanpham.php";
        break;
    }
?>
