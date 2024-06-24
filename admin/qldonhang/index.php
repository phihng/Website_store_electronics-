<?php
// if (!isset($_SESSION["nguoidung"]))
//     header("location:../index.php");

require("../../model/database.php");
// require("../../mode/donhang_ct.php");
require("../../model/donhang.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/khachhang.php");

// require("../../model/donhang.php");


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$dh = new DONHANG();
$nd = new NGUOIDUNG();
$q = new QUYEN();
$kh = new KHACHHANG();

switch ($action) {
    case "xem":
        $donhang = $dh->laydonhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        $khachhang = $kh -> laydanhsachkhachhang();
        include("main.php");
        break;
    // case "xemchitiet":
    //     case "xemchitiet":
    //         if (isset($_GET["id"]) && isset($_GET["MaND"])) {
    //             $madh = $_GET["id"];
    //             $makh = $_GET["Makh"];
    //             $donhang_ht = $dh->laydonhangtheoid($madh);
    //             $khachhang_ht = $kh->laykhachhangtheoid($mand);
    //             $donhang = $dh->laydonhang();
    //             $donhang_ct = $dct->laydanhsachdonhang_ct();
    //             $sanpham = $sp->laysanpham();
    //             $khachhang = $kh->laydanhsachkhachhang();
    //             $danhgia = $dg->laydanhsachdanhgia();
    //             $traloidanhgia = $tl->laydanhsachtraloidanhgia();
    //             $nguoidung = $nd->laydanhsachnguoidung();
    //             include("chitietdonhang.php");
    //         }
    //     include("detail.php");
    //     break;
     
    case "khoa":

        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["trangthai"]))
            $tinhtrang = $_REQUEST["trangthai"];
        else
            $tinhtrang = "1";
        if ($tinhtrang == "0") {
            $tinhtrang = 1;
            $dh->doitrangthai($id, $tinhtrang);
        }
        // load hóa đơn
        $quyen = $q->layquyen();
        $nguoidung = $nd->laydanhsachnguoidung();
        $donhang = $dh->laydonhang();
        include("main.php");
        break;
    case "hoantat":

        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["trangthai"]))
            $tinhtrang = $_REQUEST["trangthai"];
        else
            $tinhtrang = "1";
        if ($tinhtrang == "1") {
            $tinhtrang = 2;
            $dh->doitrangthai($id, $tinhtrang);
        }
        //cập nhật thời gian giao hàng khi nhấn nút hoàn tất
        $donhanght = new DONHANG();
        $currentDateTime = date('Y-m-d H:i:s');
        $dh->capnhatngaygiaohang($id, $currentDateTime);

        // load hóa đơn
        $quyen = $q->layquyen();
        $nguoidung = $nd->laydanhsachnguoidung();
        $donhang = $dh->laydonhang();
        $khachhang = $kh->laydanhsachkhachhang();
        include("main.php");
        break;
    case "huydon":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["tinhtrang"]))
            $tinhtrang = $_REQUEST["tinhtrang"];
        else
            $tinhtrang = "1";
        $tinhtrang = 3;
        $dh->doitrangthai($id, $tinhtrang);
        // load hóa đơn
        $quyen = $q->layquyen();
        $nguoidung = $nd->laydanhsachnguoidung();
        $donhang = $dh->laydonhang();
        include("main.php");
        break;
    default:
        break;
}
