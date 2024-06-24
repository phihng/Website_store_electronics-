<?php
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/khachhang.php");

$isLogin = isset($_SESSION["nguoidung"]);
// Kiểm tra hành động $action: yêu cầu đăng nhập nếu chưa xác thực
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} elseif ($isLogin == FALSE) {
    $action = "dangnhap";
    // } 
    // elseif($_SESSION["nguoidung"]["MaQ"] == 2){
    //     header("Location:../../public/");
} else {
    $action = "macdinh";
}



$nd = new NGUOIDUNG();
$q = new QUYEN();
$kh = new KHACHHANG();
switch ($action) {
    case "macdinh":
        include("main.php");
        break;
        case "dangnhap":
            include("login.php");
            break;
    
        case "xulydangnhap":
            $taikhoan = $_POST["txtdangnhap"];
            $matkhau = $_POST["txtmatkhau"];
            
            if ($kh->kiemtrakhachhanghople($taikhoan, $matkhau) == TRUE ) {
                $_SESSION["khachhang"] = $kh->laythongtinkhachhang($taikhoan);
                header("Location: ../../public/index.php");
            } else
            if ($nd->kiemtranguoidunghople($taikhoan, $matkhau) == TRUE) {
                $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($taikhoan);
                
                include("main.php");
            } else {
                include("login.php");
            }
            break;
    default:
        break;
}
