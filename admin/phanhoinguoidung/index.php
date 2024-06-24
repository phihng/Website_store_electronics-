<?php
// session_start();

// if (!isset($_SESSION["nguoidung"]))
//     header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/danhgiasp.php");
require("../../model/traloidanhgia.php");
require("../../model/khachhang.php");
require("../../model/sanpham.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$q = new QUYEN();
$nd = new NGUOIDUNG();
$dg = new DANHGIASP();
$tl = new TRALOIDANHGIA();
$kh = new KHACHHANG();
$sp = new SANPHAM();

switch ($action) {
    case "xem":
        $nguoidung = $nd->laydanhsachnguoidung();
        $danhgia = $dg->laydanhgiasp();
        $khachhang = $kh->laydanhsachkhachhang();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $sanpham = $sp->laysanpham();
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["traloi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("main.php");
        break;
    case "chuyentrang":
        header("Location:../../public/index.php");
        break;
    case "phanhoi":
        if (isset($_GET["id"])) {
            $danhgia_ht = $dg->laydanhgiasptheoid($_GET["id"]);
            $danhgia = $dg->laydanhgiasp();
            $khachhang = $kh->laydanhsachkhachhang();
            $traloidanhgia = $tl->laydanhsachtraloidanhgia();
            $sanpham = $sp->laysanpham();
          
            include("phanhoi.php");
        } else {
            $nguoidung = $nd->laydanhsachnguoidung();
            $khachhang = $kh->laydanhsachkhachhang();
            $danhgia = $dg->laydanhgiasp();
            $traloidanhgia = $tl->laydanhsachtraloidanhgia();
            $sanpham = $sp->laysanpham();
            // Đánh giá chưa được phản hồi 
          
            include("main.php");
        }

        break;
    case "xulyphanhoi":
        //xử lý thêm 
        $moi = new TRALOIDANHGIA();
        $ngaytl = date("Y-m-d");
        $moi->settraloi($_POST["txttraloi"]);
        $moi->setdg_id($_POST["dg_id"]);

        $moi->setngaytl($ngaytl);
        // thêm
        $tl->themtraloidanhgia($moi);
        // load người dùng
        $danhgia = $dg->laydanhgiasp();
        $khachhang = $kh->laydanhsachkhachhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $sanpham = $sp->laysanpham();
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $t) {
            if ($t["traloi"] == null
            ) {
                $luotdg = $luotdg + 1;
            }
        }
        include("main.php");
        break;
    case "khoa":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["trangthai"]))
            $trangthai = $_REQUEST["trangthai"];
        else
            $trangthai = "1";
        if ($trangthai == "1") {
            $trangthai = 0;
            $nd->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $nd->doitrangthai($id, $trangthai);
        }
        // load người dùng
        $quyen = $q->layquyen();
        $khachhang = $kh->laydanhsachkhachhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        $danhgia = $dg->laydanhgiasp();
        $sanpham = $sp->laysanpham();
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $t) {
            if ($t["traloi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("main.php");
        break;
    default:
        break;
}
