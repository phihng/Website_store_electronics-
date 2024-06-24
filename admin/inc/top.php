<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trang Quản Trị</title>
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../admin/inc/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../admin/inc/css/sb-admin-2.min.css" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>

    <!-- <script src="ckeditor5/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script> -->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script> -->


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- bg-gradient-primary -->
        <!-- Sidebar -->
        <ul style="background-color: #E7E7E7;" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a href="#" class="navbar-brand">
                <img class="mx-auto d-block" src="../../img/logo.png" width="130" height="50" alt="LogoViettel">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if (strpos($_SERVER["REQUEST_URI"], "ktnguoidung") != false) echo "active"; ?>">
                <a style="color: #576C8F;" class="nav-link" href="../ktnguoidung">
                    <i style="color: #576C8F;" class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Bảng điều khiển</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div style="color: #576C8F;" class="sidebar-heading">
                Quản Lý
            </div>

            <li class="nav-item
            <?php if (strpos($_SERVER["REQUEST_URI"], "qldanhmuc") != false) echo "active"; ?>
            ">
                <a style="color: #576C8F;" class="nav-link" href="../qldanhmuc/index.php?action=danhmuc">
                    <i style="color: #576C8F;" class="bi bi-folder-fill"></i>
                    <span>Quản lí danh mục</span></a>
            </li>

            <li class="nav-item
            <?php if (strpos($_SERVER["REQUEST_URI"], "qlhangsanpham") != false) echo "active"; ?>
            ">
                <a style="color: #576C8F;" class="nav-link" href="../qlhangsanpham/index.php?action=hang">
                    <i style="color: #576C8F;" class="bi bi-archive-fill"></i>
                    <span>Quản lí hãng</span></a>
            </li>

            <li class="nav-item
            <?php if (strpos($_SERVER["REQUEST_URI"], "qlhdongsp") != false) echo "active"; ?>
            ">
                <a style="color: #576C8F;" class="nav-link" href="../qldongsp/index.php?action=dongsp">
                    <i style="color: #576C8F;" class="bi bi-archive-fill"></i>
                    <span>Quản lí dòng sản phẩm</span></a>
            </li>

            <!-- Nav Item - MYPHAM -->
            <li class="nav-item
            <?php if (strpos($_SERVER["REQUEST_URI"], "qlsanpham") != false) echo "active"; ?>
            ">
                <a style="color: #576C8F;" class="nav-link" href="../qlsanpham/index.php?action=sanpham">
                <i style="color: #576C8F;" class="bi bi-smartwatch"></i>
                    <span>Quản lý sản phẩm</span></a>
            </li>

            <!-- Nav Item - NGUOIDUNG -->
            <li class="nav-item
            <?php if (strpos($_SERVER["REQUEST_URI"], "qlnguoidung") != false) echo "active"; ?>
            ">
                <a style="color: #576C8F;" class="nav-link" href="../qlnguoidung/index.php?action=xem">
                    <i style="color: #576C8F;" class="bi bi-person-badge-fill"></i>
                    <span>Quản lý người dùng</span></a>
            </li>
                    <li class="nav-item
            <?php if (strpos($_SERVER["REQUEST_URI"], "qlkhachhang") != false) echo "active"; ?>
            ">
                <a style="color: #576C8F;" class="nav-link" href="../qlkhachhang/index.php?action=xem">
                    <i style="color: #576C8F;" class="bi bi-people-fill"></i>
                    <span>Quản lý khách hàng</span></a>
            </li>
            
            
            <!-- Nav Item - DONHANG -->
            <li class="nav-item
            <?php if (strpos($_SERVER["REQUEST_URI"], "qldonhang") != false) echo "active"; ?>
            ">
                <a style="color: #576C8F;" class="nav-link" href="../qldonhang/index.php?action=xem">
                    <i style="color: #576C8F;" class="bi bi-calendar-check-fill"></i>
                    <span>Quản lý đơn hàng</span></a>
            </li>

            <!-- Nav Item - PHAN HOI TU NGUOI DUNG -->
            <li class="nav-item
            <?php if (strpos($_SERVER["REQUEST_URI"], "phanhoinguoidung") != false) echo "active"; ?>
            ">
            <a style="color: #576C8F;" class="nav-link" href="../phanhoinguoidung/index.php?action=xem">
                    <i style="color: #576C8F;" class="bi bi-chat-left-dots-fill"></i>
                    <span>Phản hồi người dùng</span></a>
            </li>
            
            <!-- Nav Item - QUANGCAO -->
            <li class="nav-item
            <?php if (strpos($_SERVER["REQUEST_URI"], "qlquangcao") != false) echo "active"; ?>
            ">
                <a style="color: #576C8F;" class="nav-link" href="../qlquangcao/index.php?action=xem">
                    <i style="color: #576C8F;" class="bi bi-badge-ad-fill"></i>
                    <span>Banner quảng cáo</span></a>
            </li>
            <!-- Nav Item - DANHMUC -->
           
            <!-- Nav Item - CHUONG TRINH KHUYEN MAI -->
            <!-- <li class="nav-item
            <php if (strpos($_SERVER["REQUEST_URI"], "qlkhuyenmai") != false) echo "active"; ?>
            ">
                <a style="color: #576C8F;" class="nav-link" href="../qlkhuyenmai/index.php?action=xem">
                    <i style="color: #576C8F;" class="bi bi-gift-fill"></i>
                    <span>Chương trình khuyến mãi</span></a>
            </li> -->
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav style="background-color: #E7E7E7;" class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["nguoidung"]["taikhoan"] ?></span>
                         
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                               
                                <div class="dropdown-divider"></div>
                                <!-- data-toggle="modal" -->
                                <a class="dropdown-item" href="../ktnguoidung/index.php?action=dangnhap">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->