<?php
// if (!isset($_SESSION["nguoidung"])) 
// header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/sanpham.php");
require("../../model/danhmuc.php");
require("../../model/hang.php");
require("../../model/dongsp.php");
require("../../model/phankhucsp.php");
require("../../model/chuongtrinhkhuyenmai.php");


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "sanpham";
}

$sp = new SANPHAM();
$dm = new DANHMUC();
$h = new HANG();
$dsp = new DONGSP();
$pk = new PHANKHUCSANPHAM();
$km = new CHUONGTRINHKHUYENMAI();
$nd = new NGUOIDUNG();

switch ($action) {
    case "sanpham":
        $sanpham = $sp->laysanpham();
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();
        
        include("sanpham.php");
        break;
    case "themsanpham":
        $danhmuc = $dm->laydanhmuc();
        $hang = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("themsanpham.php");
        break;
    case "xulythem":
        //xử lý thêm mặt hàng
        //xử lý load ảnh
        $hinhanh = basename($_FILES["fileanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../img/tbdt/" . $hinhanh; //nơi lưu file upload
        $moi = new SANPHAM();
        $moi->settensanpham($_POST["txttensanpham"]);
        $moi->setdanhmuc_id($_POST["optdanhmuc"]);
        $moi->sethang_id($_POST["opthang"]);
        $moi->setmota($_POST["txtmota"]);
        $moi->setgiaGoc($_POST["txtgiagoc"]);
        $moi->setgiaBan($_POST["txtgiaban"]);
        $moi->setsoluongton($_POST["txtsoluongton"]);
        $moi->sethinhanh($hinhanh);
        $moi->setkhuyenmai_id($_POST["optctkm"]);
        $moi->setthongsokythuat($_POST["txtthongsokythuat"]);
        $moi->setphankhuc($_POST["optphankhuc"]);
        $moi->settendong_id($_POST["optdong"]);
        $moi->setnv_id($_POST["optnhanvien"]);
        $moi->settrangthai($_POST["txttinhtrang"]);
        
        // thêm
        $sp->themsanpham($moi);



        // load sản phẩm
        $danhmuc = $dm->laydanhmuc();
        $hang = $h->layhang();
        $sanpham = $sp->laysanpham();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();


        include("sanpham.php");
        break;
    // case "xoa":
    //     $xoa = new sanpham();
    //     $xoa->setMasanpham($_GET["id"]);
    //     $sanpham = $s->xoasanpham($xoa);
    //     $loaisanpham = $ls->layloaisanpham();
    //     $sanpham = $s->laysanpham();
    //     include("sanpham.php");
    //     break;
    case "sua":
        if (isset($_GET["id"])) {
            $sanpham_ht = $sp ->laysanphamtheoid($_GET["id"]);
            $danhmuc = $dm->laydanhmuc();
            $hang = $h->layhang();
            $dongsp  = $dsp->laydongsp();
            $phankhuc  = $pk->layphankhucsp();
            $ctkhuyenmai = $km->laykhuyenmai();
            $nguoidung = $nd->laydanhsachnguoidung();


            include("suasanpham.php");
        } else {
            $danhmuc = $dm->laydanhmuc();
            $hang = $h->layhang();
            $dongsp  = $dsp->laydongsp();
            $phankhuc  = $pk->layphankhucsp();
            $ctkhuyenmai = $km->laykhuyenmai();
            $nguoidung = $nd->laydanhsachnguoidung();


            include("suasanpham.php");
        }
        break;
    case "xulysua": // lưu dữ liệu sửa mới vào db

        // gán dữ liệu từ form
        
        $sua = new SANPHAM();
        $sua->setid($_POST["id"]);
        $sua->settensanpham($_POST["txttensanpham"]);
        $sua->setdanhmuc_id($_POST["optdanhmuc"]);
        $sua->sethang_id($_POST["opthang"]);
        $sua->setmota($_POST["txtmota"]);
        $sua->setgiaGoc($_POST["txtgiagoc"]);
        $sua->setgiaBan($_POST["txtgiaban"]);
        $sua->setsoluongton($_POST["txtsoluongton"]);
        $sua->sethinhanh($_POST["hinhanh"]);
        $sua->setkhuyenmai_id($_POST["optctkm"]);
        $sua->setthongsokythuat($_POST["txtthongsokythuat"]);
        $sua->setphankhuc($_POST["optphankhuc"]);
        $sua->settendong_id($_POST["optdong"]);
        $sua->setnv_id($_POST["optnhanvien"]);
        $sua->settrangthai($_POST["txttinhtrang"]);

        if ($_FILES["filehinhanh"]["name"] != "") {
            //xử lý load ảnh
            $hinhanh = basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
            $sua->sethinhanh($hinhanh);
            $duongdan = "../../img/tbdt/" . $hinhanh; //nơi lưu file upload
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        // sửa
        $sp->suasanpham($sua);
        // load danh sách
        $danhmuc = $dm->laydanhmuc();
        $hang = $h->layhang();
        $sanpham = $sp->laysanpham();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();


        include("sanpham.php");
        break;
    // case "xoagc":
    //     $xoa = new GOICUOC();
    //     $xoa->setMaGC($_GET["id"]);
    //     $goicuoc = $gc->xoagoicuoc($xoa);
    //     $goicuoc = $gc->laygoicuoc();
    //     include("goicuoc.php");
    //     break;
    
    default:
        break;
}
