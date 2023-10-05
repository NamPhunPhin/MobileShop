<?php
class cart
{
    function add_items($key, $quantity, $color, $settings)
    {
        $sp = new sanpham();
        $result = $sp->getsanphamID($key);
        $hinh = $result['img_sp'];
        $ten = $result['ten_sp'];
        $gia = $result['gia_sp'];
        $gg = $result['giam_gia'];
        $total = ($gia - $gg) * $quantity;
        $flag=false;
        foreach($_SESSION['cart'] as $vt=>$item1)
        {
            if($item1['ma']==$key && $item1['mausac']==$color && $item1['cauhinh']==$settings)
            {
                $quantity+=$item1['soluong'];
                $gh=new cart();
                $gh->update($vt, $quantity);
                $flag=true;

            }
        }
        if($flag==false)
        {
            $item = array(
                'ma' => $key,
                'hinh' => $hinh,
                'ten' => $ten,
                'gia' => $gia,
                'giamgia' => $gg,
                'soluong' => $quantity,
                'mausac' => $color,
                'cauhinh' => $settings,
                'total' => $total
            );
    
            $_SESSION['cart'][] = $item;
        }
      
    }

    function update($vitri, $soluong)
    {
        $_SESSION['cart'][$vitri]['soluong'] += $soluong;
        $new_total = $_SESSION['cart'][$vitri]['gia'] * $_SESSION['cart'][$vitri]['soluong'];
        $_SESSION['cart'][$vitri]['total'] = $new_total;
    }

    function delete_items($vitri)
    {
        unset($_SESSION['cart'][$vitri]);
    }

    function gettotal()
    {
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $item) {
            $subtotal += $item['total'];
        }
        return $subtotal;
    }
}
