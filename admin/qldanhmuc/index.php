<?php
// if (!isset($_SESSION["nguoidung"])) 
// header("location:../index.php");

require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "danhmuc";
}

$q = new QUYEN();
$dm = new DANHMUC();
$nd = new NGUOIDUNG();

switch ($action) {
    case "danhmuc":
        $danhmuc = $dm->laydanhmuc();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("danhmuc.php");
        break;

    case "themdanhmuc":
        $danhmuc = $dm->laydanhmuc();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("themdanhmuc.php");
        break;

    case "xulythem":
        $moi = new DANHMUC();
        $moi->settentbdt($_POST["txttentbdt"]);
        $moi->settrangthai($_POST["txttinhtrang"]);
        $dm->themdanhmuc($moi);
        // load sản phẩm
        $danhmuc = $dm->laydanhmuc();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("danhmuc.php");
        break;

    case "sua":
        if (isset($_GET["id"])) {
            $danhmuc_ht = $dm->laydanhmuctheoid($_GET["id"]);
            // print_r($danhmuc_ht);
            // exit();
            include("suadanhmuc.php");
        } else {
            $danhmuc = $dm->laydanhmuc();
            include("danhmuc.php");
        }
        break;
    case "xulysua": // lưu dữ liệu sửa mới vào db
        // gán dữ liệu từ form  
        $sua = new DANHMUC();
        $sua->settentbdt($_POST["txttentbdt"]);
        $sua->settrangthai($_POST["txttrangthai"]);
        $sua->setid($_POST["id"]);
        $dm->suadanhmuc($sua);
        // load danh sách
        $danhmuc = $dm->laydanhmuc();
        //$nguoidung = $nd->laydanhsachnguoidung();
        include("danhmuc.php");
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
            $dm->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $dm->doitrangthai($id, $trangthai);
        }
        // load người dùng
        $quyen = $q->layquyen();
        $nguoidung = $nd->laydanhsachnguoidung();
        $danhmuc = $dm->laydanhmuc();
        include("danhmuc.php");
        break;
    default:
        break;
}
