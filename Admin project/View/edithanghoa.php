<?php
    if(isset($_GET['act'])){
    if($_GET['act']=='edit'){
        $ac=1;
    }
    if($_GET['act'] == 'themsp')
    {
        $ac=2;
    }
}
?>
<!-- Them tieu de -->
<?php
    if($ac==1){
    echo '<div  class="col-md-4 col-md-offset-4"><h3 ><b>CẬP NHẬT SẢN PHẨM</b></h3></div>';
    }
    if($ac==2)
    {
    echo '<div  class="col-md-4 col-md-offset-4"><h3 ><b>THÊM SẢN PHẨM</b></h3></div>';
    } 
?>
<div class="row col-md-4 col-md-offset-4">
    <?php
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $hh= new hanghoa();
            $result=$hh->getHangHoaId($id);
            $mahh=$result['ma_sp'];
            $tenhh=$result['ten_sp'];
            $dongia=$result['gia_sp'];
            $giamgia=$result['giam_gia'];
            $hinh=$result['img_sp'];
            $maloai=$result['mahang_sp'];
            $mota=$result['mota_sp'];
            $soluongton=$result['soluongton'];
            $mausac=$result['mau_sac'];
            $cauhinh=$result['cau_hinh'];
        }
    ?>
    <?php
        if($ac==1){
            echo '<form action="index.php?action=hanghoa&act=edit_action&id='.$id.'" method="post" enctype="multipart/form-data">';
        }
        if($ac==2)
        {
            echo '<form action="index.php?action=hanghoa&act=themsp_action" method="post" enctype="multipart/form-data">';
        }
    ?>
    <table class="table" style="border: 0px;">

        <tr>
            <td>Mã hàng</td>
            <td> <input type="text" class="form-control" name="mahh" value="<?php if(isset($mahh)) echo $mahh; ?>"
                    readonly /></td>
        </tr>
        <tr>
            <td>Tên hàng</td>
            <td><input type="text" class="form-control" name="tenhh" value="<?php if(isset($tenhh)) echo $tenhh; ?>"
                    maxlength="100px"></td>
        </tr>
        <tr>
            <td>Đơn giá</td>
            <td><input type="text" class="form-control" name="dongia" value="<?php if(isset($dongia)) echo $dongia; ?>">
            </td>
        </tr>
        <tr>
            <td>Giảm giá</td>
            <td><input type="text" class="form-control" name="giamgia"
                    value="<?php if(isset($giamgia)) echo $giamgia; ?>"></td>
        </tr>
        <tr>
            <td>Hình</td>
            <td>

                <label><img width="50px" height="50px" src="../../../projectphp/PHP2/Project_Website/General/img/<?php if(isset($hinh)) echo $hinh; ?>"></label>
                Chọn file để upload:
                <input type="file" name="image" id="fileupload">

            </td>
        </tr>
        <tr>
            <td>Mã loại</td>
            <td>
                <select name="maloai" class="form-control" style="width:150px;">
                    <?php
                        $loai=new loai();
                        $result=$loai->getLoai();
                        while($set=$result->fetch()):
                    ?>
                    <option <?php if(isset($maloai)&&$maloai==$set['ma_hang']) echo "selected"; ?> value="<?php echo $set['ma_hang']; ?>">
                        <?php echo $set['ten_hang'] ?></option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td><input type="text" class="form-control" name="mota" value="<?php if(isset($mota)) echo $mota; ?>">
            </td>
        </tr>
        <tr>
            <td>Số lượng tồn</td>
            <td><input type="text" class="form-control" name="slt"
                    value="<?php if(isset($soluongton)) echo $soluongton; ?>">
            </td>
        </tr>
        <tr>
            <td>Màu sắc</td>
            <td><input type="text" class="form-control" name="mausac" value="<?php if(isset($mausac)) echo $mausac; ?>">
            </td>
        </tr>
        <tr>
            <td>Cấu hình</td>
            <td><input type="text" class="form-control" name="cauhinh" value="<?php if(isset($cauhinh)) echo $cauhinh; ?>">
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="submit" value="submit">


            </td>
        </tr>

    </table>
    </form>
</div>
