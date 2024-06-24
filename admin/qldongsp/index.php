<?php
// if (!isset($_SESSION["nguoidung"])) 
// header("location:../index.php");

require("../../model/database.php");

require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/dongsp.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "dongsp";
}

$q = new QUYEN();

$nd = new NGUOIDUNG();
$dsp = new DONGSP();

switch ($action) {
    case "dongsp":
        $dongsp = $dsp->laydongsp();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("dongsp.php");
        break;

    case "themdongsp":
        $dongsp = $dsp->laydongsp();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("themdongsp.php");
        break;

    case "xulythem":
        $moi = new dongsp();
        $moi->settendong($_POST["txttendong"]);
        $moi->settrangthai($_POST["txttinhtrang"]);
        $dsp->themdongsp($moi);
        // load sản phẩm
        $dongsp = $dsp->laydongsp();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("dongsp.php");
        break;

    case "sua":
        if (isset($_GET["id"])) {
            $dongsp_ht = $dsp->laydongsptheoid($_GET["id"]);
            // print_r($dongsp_ht);
            // exit();
            include("suadongsp.php");
        } else {
            $dongsp = $dsp->laydongsp();
            include("dongsp.php");
        }
        break;
    case "xulysua": // lưu dữ liệu sửa mới vào db
        // gán dữ liệu từ form  
        $sua = new dongsp();
        $sua->settendong($_POST["txttendong"]);
        $sua->settrangthai($_POST["txttrangthai"]);
        $sua->setid($_POST["id"]);
        $dsp->suadongsp($sua);
        // load danh sách
        $dongsp = $dsp->laydongsp();
        //$nguoidung = $nd->laydanhsachnguoidung();
        include("dongsp.php");
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
            $dsp->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $dsp->doitrangthai($id, $trangthai);
        }
        // load người dùng
        $quyen = $q->layquyen();
        $nguoidung = $nd->laydanhsachnguoidung();
        $dongsp = $dsp->laydongsp();
        include("dongsp.php");
        break;
    default:
        break;
}
