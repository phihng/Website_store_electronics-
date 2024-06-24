<?php
// if (!isset($_SESSION["nguoidung"]))
//     header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$q = new QUYEN();
$nd = new NGUOIDUNG();

switch ($action) {
    case "xem":
        $quyen = $q->layquyen();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("main.php");
        break;
    case "themnd":
        $quyen = $q->layquyen();
        include("themnguoidung.php");
        break;
    case "xulythemnd":
    
            //xử lý thêm 
            $nguoidungmoi = new NGUOIDUNG();
            $nguoidungmoi->settaikhoan($_POST["txttaikhoan"]);
            $nguoidungmoi->setmatkhau($_POST["txtmatkhau"]);
            $nguoidungmoi->setloaiquyen($_POST["optquyen"]);

            $nguoidungmoi->settrangthai($_POST["txttrangthai"]);

            // thêm
            $nd->themnguoidung($nguoidungmoi);
            // load người dùng
            $quyen = $q->layquyen();
            $nguoidung = $nd->laydanhsachnguoidung();
            include("main.php");
        
        
        break;
    case "khoa":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["TrangThai"]))
            $trangthai = $_REQUEST["TrangThai"];
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
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;
    default:
        break;
}
