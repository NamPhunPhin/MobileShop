<?php
$act = "cart";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'cart':
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_POST['masp'])) {
            $up = 0;
            $mahh = $_POST['masp'];
            $soluong = $_POST['soluong'];
            $mausac = $_POST['mausac'];
            $cauhinh = $_POST['cauhinh'];
            $cart = new cart();

            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['ma'] == $mahh) {
                    $cart->update($key, $soluong);
                    $up = 1;
                }
            }

            if ($up == 0) {
                $cart->add_items($mahh, $soluong, $mausac, $cauhinh);
            }
        }
        include("View/home.php");
        break;

    case 'detail':
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_POST['masp'])) {
            $up = 0;
            $mahh = $_POST['masp'];
            $soluong = $_POST['soluong'];
            $mausac = $_POST['mausac'];
            $cauhinh = $_POST['cauhinh'];
            $cart = new cart();

            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['ma'] == $mahh) {
                    $cart->update($key, $soluong);
                    $up = 1;
                }
            }

            if ($up == 0) {
                $cart->add_items($mahh, $soluong, $mausac, $cauhinh);
            }
        }
        include("View/checkout.php");
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $cart = new cart();
            $id = $_GET['id'];
            $cart->delete_items($id);
        }
        include("View/checkout.php");
        break;

    case 'delete_mini':
        if (isset($_GET['id'])) {
            $cart = new cart();
            $id = $_GET['id'];
            $cart->delete_items($id);
        }
        include("View/home.php");
        break;
}
