<?php
// if (!isset($_SESSION["nguoidung"]))
//     header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/giaodien.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$q = new QUYEN();
$nd = new NGUOIDUNG();
$gd = new GIAODIEN();

switch ($action) {
    case "xem":
        $giaodien = $gd->laygiaodien();
        include("giaodien.php");
        break;
    case "themgd":
        include("themgiaodien.php");
        break;
    case "xulythemgd":
        //xử lý load ảnh
        $hinhanh = basename($_FILES["fileanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../img/carousel/" . $hinhanh; //nơi lưu file upload
        move_uploaded_file($_FILES["fileanh"]["tmp_name"], $duongdan);
        //xử lý thêm 
        $giaodienmoi = new GIAODIEN();
        $giaodienmoi->seturl($_POST["txturl"]);
        $giaodienmoi->settrangthai($_POST["txttrangthai"]);
        $giaodienmoi->sethinhanh($hinhanh);
        // thêm
        $gd->themgiaodien($giaodienmoi);
        // load người dùng
        $giaodien = $gd->laygiaodien();
        include("giaodien.php");
        break;
    case "suagd":
        if (isset($_GET["id"])) {
            $giaodien_ht = $gd->laygiaodientheoid($_GET["id"]);
            include("suagiaodien.php");
        } else {
            $giaodien = $gd->laygiaodien();
            include("giaodien.php");
        }
        break;
    case "xulysuagd": // lưu dữ liệu sửa mới vào db

        // gán dữ liệu từ form

        $sua = new GIAODIEN();
        $sua->setid($_POST["id"]);
        $sua->sethinhanh($_POST["hinhanh"]);
        $sua->seturl($_POST["txtduongdan"]);
        $sua->settrangthai($_POST["txttrangthai"]);

        if ($_FILES["filehinhanh"]["name"] != "") {
            //xử lý load ảnh
            $hinhanh = basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
            $sua->sethinhanh($hinhanh);
            $duongdan = "../../img/carousel/" . $hinhanh; //nơi lưu file upload
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        // sửa
        $gd->suagiaodien($sua);
        // load danh sách
        $giaodien = $gd->laygiaodien();
        include("giaodien.php");
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
            $gd->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $gd->doitrangthai($id, $trangthai);
        }
        // load người dùng
        $quyen = $q->layquyen();
        $nguoidung = $nd->laydanhsachnguoidung();
        $giaodien = $gd->laygiaodien();
        include("giaodien.php");
        break;
    default:
        break;
}
