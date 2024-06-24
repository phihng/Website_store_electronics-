<?php
// if (!isset($_SESSION["nguoidung"])) 
// header("location:../index.php");

require("../model/database.php");
require("../model/nguoidung.php");
require("../model/quyen.php");
require("../model/sanpham.php");
require("../model/danhmuc.php");
require("../model/hang.php");
require("../model/dongsp.php");
require("../model/phankhucsp.php");
require("../model/khachhang.php");
require("../model/chuongtrinhkhuyenmai.php");
require("../model/danhgiasp.php");
require("../model/traloidanhgia.php");
require("../model/giohang.php");
require("../model/detail_donhang.php");
require("../model/donhang.php");
require("../model/giaodien.php");


// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);
// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "home";
}

$sp = new SANPHAM();
$dm = new DANHMUC();
$h = new HANG();
$dsp = new DONGSP();
$pk = new PHANKHUCSANPHAM();
$km = new CHUONGTRINHKHUYENMAI();
$nd = new NGUOIDUNG();
$kh = new KHACHHANG();
$dg = new DANHGIASP();
$tl = new TRALOIDANHGIA();
$dhct = new DONHANGCT();
$dh = new DONHANG();
$gd = new GIAODIEN();



switch ($action) {
    case "home":
        $sanpham = $sp->laysanpham();
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();
        $giaodien = $gd->laygiaodien();

        include("main.php");
        break;

    case "group":
        if (isset($_REQUEST["id"])) {
            $madm = $_REQUEST["id"];
            $dmuc = $dm->laydanhmuctheoid($madm);
            $tendm =  $dmuc["tentbdt"];
            $sanpham = $sp->laysanphamtheodanhmuc($madm);
            $danhmuc = $dm->laydanhmuc();
            $hang    = $h->layhang();
            $dongsp  = $dsp->laydongsp();
            $phankhuc  = $pk->layphankhucsp();
            $ctkhuyenmai = $km->laykhuyenmai();
            $nguoidung = $nd->laydanhsachnguoidung();

            include("group.php");
        } else if (isset($_REQUEST["id_hang"]) && !(isset($_REQUEST["id_pk"]))) {
            $mahang = $_REQUEST["id_hang"]; //Truyền mã hàng vào 1 biến tạm
            $layhangtheoid = $h->layhangtheoid($mahang); //lấy hàng theo mã hàng ở biến tạm
            $tenhang =  $layhangtheoid["tenhang"];
            $sanpham = $sp->laysanphamtheohang($mahang);
            $danhmuc = $dm->laydanhmuc();
            $hang    = $h->layhang();
            $dongsp  = $dsp->laydongsp();
            $phankhuc  = $pk->layphankhucsp();
            $ctkhuyenmai = $km->laykhuyenmai();
            $nguoidung = $nd->laydanhsachnguoidung();
            $giaodien = $gd->laygiaodien();

            include("grouphang.php");
        } else if (isset($_REQUEST["id_hang"]) && (isset($_REQUEST["id_pk"]))) {
            $mahang = $_REQUEST["id_hang"]; //Truyền mã hàng vào 1 biến tạm
            $mapk = $_REQUEST["id_pk"]; //Truyền mã hàng vào 1 biến tạm
            $layhangtheoid = $h->layhangtheoid($mahang); //lấy hàng theo mã hàng ở biến tạm
            $tenhang =  $layhangtheoid["tenhang"];
            $sanpham = $sp->laysanphamtheophankhucvahang($mahang,$mapk);
            $danhmuc = $dm->laydanhmuc();
            $hang    = $h->layhang();
            $dongsp  = $dsp->laydongsp();
            $phankhuc  = $pk->layphankhucsp();
            $ctkhuyenmai = $km->laykhuyenmai();
            $nguoidung = $nd->laydanhsachnguoidung();
            $giaodien = $gd->laygiaodien();
            include("grouphang_pk.php");
        }
        else {
            include("main.php");
        }

        break;
    case "search":
        if (isset($_POST["timkiem"])) {
            $ten_tk = $_POST["txtsearch"];
            if ($ten_tk != "") {
                // lấy thông tin sản phẩm
                $sanpham = $sp->timkiemsanpham($ten_tk);
                $giaodien = $gd->laygiaodien();
                $danhmuc = $dm->laydanhmuc();
                $hang = $h->layhang();
                include("timkiem.php");
            } else {
                $sanpham = $sp->laysanpham();
                include("main.php");
            }
        }
        break;

    case "shop":
        $sanpham = $sp->laysanpham();
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("shop.php");

        break;


    case "about":
        $sanpham = $sp->laysanpham();
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("about.php");
        break;


    case "baohanh":
        $sanpham = $sp->laysanpham();
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("baohanh.php");
        break;

    case "giaohang":
        $sanpham = $sp->laysanpham();
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("giaohang.php");
        break;

    case "doitra":
        $sanpham = $sp->laysanpham();
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("doitra.php");
        break;


    case "cart":
        $giohang = laygiohang();
        $sanpham = $sp->laysanpham();
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();
        $dh_dadat = $dhct->laydonhangct();
        $donhang = $dh->laydonhang();
        $khachhang = $kh->laydanhsachkhachhang();
        


        include("cart.php");
        break;

    case "thanhtoan":
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        // Kiểm tra hành động $action: yêu cầu đăng nhập nếu chưa xác thực
        // if ($isLogin == FALSE) {
        //     include("dangnhap.php");
        // } else {
        
            $giohang = laygiohang();
            include("thanhtoan.php");
        
      
        break;

    case "chovaogio":

        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["soluong"]))
            $soluong = $_REQUEST["soluong"];
        else
            $soluong = "1";
        if (isset($_REQUEST["danhmuc"]))
            $dm = $_GET["danhmuc"];
        if (isset($_SESSION["giohang"][$id])) {
            $soluong += $_SESSION["giohang"][$id];
            $_SESSION["giohang"][$id] = $soluong;
        } else {
            themhangvaogio($id, $soluong);
        }
        $giohang = laygiohang();

        $dh_dadat = $dhct->laydonhangct();
        $sanpham = $sp->laysanpham();

        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();
        $donhang = $dh->laydonhang();
        $khachhang = $kh->laydanhsachkhachhang();



        include("cart.php");
        break;
    case "xemgiohang":
        $giohang = laygiohang();

        $dh_dadat = $dhct->laydonhangct();
        $sanpham = $sp->laysanpham();
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $khachhang = $kh->laydanhsachkhachhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        $donhang = $dh->laydonhang();



        include("cart.php");
        break;
    case "capnhatgio":
        $sanpham = $sp->laysanpham();
        if (isset($_REQUEST["sp"])) {
            $sp = $_REQUEST["sp"];
           
            foreach ($sp as $id => $soluong) {
                if ( $soluong > 0 ) 
                    capnhatsoluong($id, $soluong);
                else
                    xoamotsanpham($id);
            }
       
        }
 
        $giohang = laygiohang();

        $dh_dadat = $dhct->laydonhangct();
        // $sanpham = $sp->laysanpham();
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();
        $donhang = $dh->laydonhang();
     
        $khachhang = $kh->laydanhsachkhachhang();


        include("cart.php");
        break;
    case "xoagiohang":
        xoagiohang();
        $giohang = laygiohang();
        $dh_dadat = $dhct->laydonhangct();
        $sanpham = $sp->laysanpham();
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();
        $donhang = $dh->laydonhang();
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $khachhang = $kh->laydanhsachkhachhang();
        
        $giohang = laygiohang();


        include("cart.php");
        break;

    case "services":
        $sanpham = $sp->laysanpham();
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("services.php");
        break;

    case "contact":
        $sanpham = $sp->laysanpham();
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("contact.php");
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

    case "dangnhap":
        $danhmuc = $dm->laydanhmuc();
        $hang = $h->layhang();
        $sanpham = $sp->laysanpham();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        include("dangnhap.php");
        break;

    case "xldangnhap":
        $taikhoan = $_POST["txttaikhoan"];
        $matkhau = $_POST["txtmatkhau"];
        
        if ($kh->kiemtrakhachhanghople($taikhoan, $matkhau) == TRUE) {
            $_SESSION["khachhang"] = $kh->laythongtinkhachhang($taikhoan);
            $sanpham = $sp->laysanpham();
            $danhmuc = $dm->laydanhmuc();
            $hang    = $h->layhang();
            $dongsp  = $dsp->laydongsp();
            $phankhuc  = $pk->layphankhucsp();
            $ctkhuyenmai = $km->laykhuyenmai();
            $nguoidung = $nd->laydanhsachnguoidung();
            $giaodien = $gd->laygiaodien();
            include("main.php");
        } else {
            include("dangnhap.php");
        }
        break;

    case "hoso":
        $danhmuc = $dm->laydanhmuc();
        $hang = $h->layhang();
        $sanpham = $sp->laysanpham();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        include("hoso.php");
        break;

    case "xlhoso":
        $id = $_POST["txtid"];
        $taikhoankh = $_POST["txttaikhoan"];
        $sodienthoai = $_POST["txtsdt"];
        $matkhau = $_POST["txtmatkhau"];
        $hoten = $_POST["txthoten"];
        $hinhanh = $_POST["txthinhanh"];
        $diachi = $_POST["txtdiachi"];

        if ($_FILES["fhinhanh"]["name"] != null) {
            $hinhanh = basename($_FILES["fhinhanh"]["name"]);
            $duongdan = "../img/khachhang/" . $hinhanh;
            move_uploaded_file($_FILES["fhinhanh"]["tmp_name"], $duongdan);
        }
        $kh->capnhatkhachhang($id, $taikhoankh, $sodienthoai, $matkhau, $hoten, $hinhanh, $diachi);
        $_SESSION["khachhang"] = $kh->laythongtinkhachhang($taikhoankh);
        $danhmuc = $dm->laydanhmuc();
        $hang = $h->layhang();
        $sanpham = $sp->laysanpham();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        include("hoso.php");
        break;

    case "dangxuat":
        unset($_SESSION["khachhang"]);
        include("dangnhap.php");
        break;

    case "dangky":
        $hang = $h->layhang();
        include("dangky.php");
        break;

    case "xldangky":

        //xử lý load ảnh
        $hinhanh = basename($_FILES["fhinhanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../img/khachhang/" . $hinhanh; //nơi lưu file upload
        move_uploaded_file($_FILES["fhinhanh"]["tmp_name"], $duongdan);
        //xử lý thêm mặt hàng
        $khachhanggmoi = new KHACHHANG();
        $khachhanggmoi->settaikhoankh($_POST["txttaikhoan"]);
        $khachhanggmoi->setmatkhau($_POST["txtmatkhau"]);
        $khachhanggmoi->setsodienthoai($_POST["txtsodienthoai"]);

        $khachhanggmoi->sethoten($_POST["txthoten"]);


        $khachhanggmoi->setdiachi($_POST["txtdiachi"]);
        $khachhanggmoi->sethinhanh($hinhanh);

        // thêm
        $kh->themkhachhang($khachhanggmoi);
        // load 
        $sp = $sp->laysanpham();
        $_SESSION["khachhang"] = $kh->laythongtinkhachhang($_POST["txttaikhoan"]);
        $giaodien = $gd->laygiaodien();
        include("main.php");
        break;

    case "detail":
        if (isset($_REQUEST["id"])) {
            $sanphamid = $_REQUEST["id"];

            // tăng lượt xem lên 1
            $sp->tangluotxem($sanphamid);
            // lấy thông tin chi tiết mặt hàng
            $mhct = $sp->laysanphamtheoid($sanphamid);
            // lấy các mặt hàng cùng danh mục
            $madm = $mhct["danhmuc_id"];
            $danhmuc = $dm->laydanhmuc();
            $hang = $h->layhang();
            $dmuc = $dm->laydanhmuctheoid($madm);
            $khachhang = $kh->laydanhsachkhachhang();

            $tendm =  $dmuc["tentbdt"];
            $sanpham = $sp->laysanphamtheodanhmuc($madm);
            $danhgia = $dg->laydanhgiasp();
            $traloidanhgia = $tl->laydanhsachtraloidanhgia();

            include("detail.php");
        }
        break;


    case "thankyou":
        $sanpham = $sp->laysanpham();
        $danhmuc = $dm->laydanhmuc();
        $hang    = $h->layhang();
        $dongsp  = $dsp->laydongsp();
        $phankhuc  = $pk->layphankhucsp();
        $ctkhuyenmai = $km->laykhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("thankyou.php");
        break;

        case "thanks":
            $sanpham = $sp->laysanpham();
            $danhmuc = $dm->laydanhmuc();
            $hang    = $h->layhang();
            $dongsp  = $dsp->laydongsp();
            $phankhuc  = $pk->layphankhucsp();
            $ctkhuyenmai = $km->laykhuyenmai();
            $nguoidung = $nd->laydanhsachnguoidung();
            include("thanks.php");
            break;


    case "danhgia":

        if (isset($_POST["danhgia"]) && !empty($_POST["danhgia"])) {
            $khachhang_dg = $_POST["danhgia"];
            $ngaydg = date("Y-m-d");

            $moi = new DANHGIASP();
            $moi->setnhanxet($khachhang_dg);
            $moi->setid_kh($_SESSION["khachhang"]["id"]);

            $moi->setid_sp($_POST["id"]);

            $moi->setngaydanhgia($ngaydg);
            // Thêm đánh giá mới vào cơ sở dữ liệu
            $dg->themdanhgiasp($moi);
        } else {
            echo "Không có đánh giá nào được nhập.";
        }

        $sanphamid = $_POST["id"];
        $khachhang =  $_POST["makh"];

        // tăng lượt xem lên 1
        $sp->tangluotxem($sanphamid);
        // lấy thông tin chi tiết mặt hàng
        $khachhangid = $kh->laykhachhangtheoid($khachhang);

        $mhct = $sp->laysanphamtheoid($sanphamid);
        // lấy các mặt hàng cùng danh mục
        $madm = $mhct["danhmuc_id"];
        $dmuc = $dm->laydanhmuctheoid($madm);
        $tendm =  $dmuc["tentbdt"];
        $sanpham = $sp->laysanphamtheodanhmuc($madm);
        $khachhang = $kh->laydanhsachkhachhang();
        $danhgia = $dg->laydanhgiasp();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();

        include("detail.php");
        break;
    case "sua":
        if (isset($_GET["id"])) {
            $sanpham_ht = $sp->laysanphamtheoid($_GET["id"]);
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

    case "htdonhang":
        $giohang = laygiohang();
        // Thêm đơn hàng
        $donhangmoi = new DONHANG();
        $ngay = date("Y-m-d");
        $donhangmoi->setkhachhang_id($_SESSION['khachhang']['id']);
        $donhangmoi->setngaygiao(date("Y/m/d"));
        $donhangmoi->setngaynhan(date("Y/m/d"));
        $donhangmoi->settongtien($_POST["txttongtien"]);
        $donhangmoi->settrangthai(0);
       

        $ghichu = $_POST["txtghichu"];
        $donhangmoi->setghichu($ghichu);
        // Thêm
        $dh->themdonhang($donhangmoi);

        // Thêm đơn hàng chi tiết và giảm số lượng sản phẩm

        // Lấy ID của đơn hàng vừa được tạo
        $dbcon = DATABASE::connect();
        
        $txtid = $_POST["txtid_mh"]; // Lưu giá trị của $_POST["txtid"] vào biến $txtid

        if (!is_array($txtid)) {
            $txtid = [$txtid]; // Chuyển đổi giá trị $txtid thành một mảng
        }

        $so_luong_id = count($txtid); // Đếm số lượng phần tử trong mảng $txtid

        for ($i = 0; $i < $so_luong_id; $i++) {
            $donhang_id = $dbcon->lastInsertId();

            $id = $txtid[$i];
            $dhctmoi = new DONHANGCT();
            $dhctmoi->setdonhang_id($donhang_id);
            $dhctmoi->setsanpham_id($id);
            $dhctmoi->setdongia($_POST["txtdongia"][$i]);
            $dhctmoi->setsoluong($_POST["txtsl"][$i]);
            $dhctmoi->setthanhtien($_POST["txtthanhtien"][$i]);
            $dhct->themdonhangct($dhctmoi);

            // Giảm số lượng sản phẩm
            $sp->giamsoluong($id, $_POST["txtsl"][$i]);
        }

        
        xoagiohang();

        // $sanpham = $sp->laysanpham();
        // $sanpham= $sp->laysanphamtheoid();
        // $giohang = laygiohang();
        // $khachhang = $kh->laykhachhangtheoid();
        include("thanks.php");

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
