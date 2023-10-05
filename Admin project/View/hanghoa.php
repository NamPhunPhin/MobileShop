<div class="col-md-4 col-md-offset-4 mt-4">
    <h3><b>DANH SÁCH HÀNG HÓA</b></h3>
</div>
<div class="row col-12">
    <a href="index.php?action=hanghoa&act=themsp">
        <h4>Thêm sản phẩm</h4>
    </a>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr class="table-primary">
                <th>Mã hàng</th>
                <th>Mã loại</th>
                <th>Tên hàng</th>
                <th>Đơn giá</th>
                <th>Giảm giá</th>
                <th>Màu sắc</th>
                <th>Cấu hình</th>
                <th>Mô tả</th>
                <th>Hình</th>
                <th>Số lượng tồn</th>
                <th>Cập Nhật</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $hh = new hanghoa();
            $kq = $hh->getHangHoaAll();
            $count = $kq->rowCount();

            $limit = 9;

            $p = new page();

            $page = $p->findPage($count, $limit);

            $start = $p->findStart($limit);
            $result = $hh->getListpageHH($start, $limit);
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            while ($set = $result->fetch()) :
            ?>
                <tr>
                    <td><?php echo $set['ma_sp']; ?> </td>
                    <td><?php echo $set['mahang_sp']; ?></td>
                    <td><?php echo $set['ten_sp']; ?></td>
                    <td><?php echo $set['gia_sp']; ?></td>
                    <td><?php echo $set['giam_gia']; ?></td>
                    <td><?php echo $set['mau_sac']; ?></td>
                    <td><?php echo $set['cau_hinh']; ?></td>
                    <td><?php echo $set['mota_sp']; ?></td>
                    <td><img width="50px" height="50px" src="../../../projectphp/PHP2/Project_Website/General/img/<?php echo $set['img_sp']; ?>" /></td>
                    <td><?php echo $set['soluongton']; ?></td>
                    <td><a href="index.php?action=hanghoa&act=edit&id=<?php echo $set['ma_sp']; ?>">Cập nhật</a></td>
                    <td><a href="index.php?action=hanghoa&act=xoa_sp&id=<?php echo $set['ma_sp']; ?>">Xóa</a></td>
                </tr>
            <?php
            endwhile;
            ?>

            <ul class="pagination">
                <?php
                for ($i = 1; $i <= $page; $i++) {
                ?>
                    <li><a href="index.php?action=hanghoa&page=<?php echo $i ?>"> <?php echo $i; ?> </a></li>
                <?php } ?>
            </ul>

        </tbody>
    </table>
</div>