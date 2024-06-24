<?php
// if (!isset($_SESSION["nguoidung"])) 
// header("location:../index.php");

require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/hang.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "hang";
}

$q = new QUYEN();
$dm = new DANHMUC();
$nd = new NGUOIDUNG();
$h = new HANG();

switch ($action) {
    case "hang":
        $hang = $h->layhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("hang.php");
        break;

    case "themhang":
        $hang = $h->layhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("themhang.php");
        break;

    case "xulythem":
        $moi = new HANG();
        $moi->settenhang($_POST["txttenhang"]);
        $moi->settrangthai($_POST["txttinhtrang"]);
        $h->themhang($moi);
        // load sản phẩm
        $hang = $h->layhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("hang.php");
        break;

    case "sua":
        if (isset($_GET["id"])) {
            $hang_ht = $h->layhangtheoid($_GET["id"]);
            // print_r($danhmuc_ht);
            // exit();
            include("suahang.php");
        } else {
            $hang = $h->layhang();
            include("hang.php");
        }
        break;
    case "xulysua": // lưu dữ liệu sửa mới vào db
        // gán dữ liệu từ form  
        $sua = new HANG();
        $sua->settenhang($_POST["txttenhang"]);
        $sua->settrangthai($_POST["txttrangthai"]);
        $sua->setid($_POST["id"]);
        $h->suahang($sua);
        // load danh sách
        $hang = $h->layhang();
        //$nguoidung = $nd->laydanhsachnguoidung();
        include("hang.php");
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
            $h->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $h->doitrangthai($id, $trangthai);
        }
        // load người dùng
        $quyen = $q->layquyen();
        $nguoidung = $nd->laydanhsachnguoidung();
        $hang = $h->layhang();
        include("hang.php");
        break;
    default:
        break;
}
