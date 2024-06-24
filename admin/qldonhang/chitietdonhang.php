<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">CHI TIẾT ĐƠN HÀNG</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã Đơn Hàng</th>
                            <th>Tên Khách Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Ngày Đặt Hàng</th>
                            <th>Ngày Giao Hàng</th>
                            <th>Đã Thanh Toán</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã Đơn Hàng</th>
                            <th>Tên Khách Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Ngày Đặt Hàng</th>
                            <th>Ngày Giao Hàng</th>
                            <th>Đã Thanh Toán</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($donhang as $dh) :
                            foreach ($khachhang as $kh) :
                                if ($kh["id"] == $dh["id"]) { ?>
                                    <tr>
                                        <td><?php echo $dh["id"]; ?></td>
                                        <td><?php echo $kh["hoten"]; ?></td>
                                        <td><?php echo $kh["sodienthoai"]; ?></td>
                                        <td><?php echo $kh["diachi"]; ?></td>
                                        <td><?php echo $dh["ngaygiao"]; ?></td>
                                        <td><?php echo $dh["ngaynhan"]; ?></td>
                                        <?php if ($dh["trangthai"] == 2) { ?>
                                            <td class="text-success"><i class="bi bi-check-circle-fill"></i></td>
                                        <?php } else { ?>
                                            <td class="text-danger"><i class="bi bi-x-circle-fill"></i></td>
                                        <?php } ?>
                                        <!-- <php if ($dh["trangthai"] == 1) { ?>
                                    <-- 1- chuẩn bị hàng, 2- đang vận chuyển, 3-hoàn tất đơn hàng, vận chuyển thất bại ->
                                    <td class="text-success">Chuẩn Bị Hàng</td>
                                <php } else { >
                                    <td class="text-danger">Khóa</td>
                                <php }  > -->
                                        <!-- cột trạng thái -->
                                        <?php if ($dh["trangthai"] == 0) { ?>
                                            <td class="text-success">Chuẩn bị hàng </td>
                                        <?php } elseif ($dh["trangthai"] == 1) { ?>
                                            <td class="text-success">Đang vận chuyển</td>
                                        <?php } elseif ($dh["trangthai"] == 2) { ?><td class="text-success">Hoàn tất đơn hàng</td>
                                        <?php } elseif ($dh["trangthai"] == 3) { ?>
                                            <td class="text-danger">Đơn đã hủy</td>
                                        <?php } ?>

                                        <td>
                                            <?php if ($dh["trangthai"] == 0) { ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="index.php?action=khoa&id=<?php echo $dh['id']; ?>&trangthai=<?php echo $dh['trangthai']; ?>" class="btn btn-warning">Xác nhận</a>
                                                    </div>
                                                    <div class="col">
                                                        <a href="index.php?action=huydon&id=<?php echo $dh['id']; ?>&trangthai=<?php echo $dh['trangthai']; ?>" class="btn btn-secondary">Hủy đơn</a>
                                                    </div>
                                                </div>
                                            <?php } elseif ($dh["trangthai"] == 1) { ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="index.php?action=hoantat&id=<?php echo $dh['id']; ?>&trangthai=<?php echo $dh['trangthai']; ?>" class="btn btn-warning">Hoàn tất</a>
                                                    </div>
                                                    <div class="col">
                                                        <a href="index.php?action=huydon&id=<?php echo $dh['id']; ?>&trangthai=<?php echo $dh['trangthai']; ?>" class="btn btn-secondary">Hủy đơn</a>
                                                    </div>
                                                </div>
                                            <?php } elseif ($dh["trangthai"] == 2) { ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="index.php?action=detail&id=<?php echo $dh['id']; ?>" class="btn btn-info">Xem chi tiết</a>
                                                    </div>
                                                </div>
                                            <?php } elseif ($dh["trangthai"] == 3) { ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="index.php?action=detail&id=<?php echo $dh['id']; ?>" class="btn btn-info ">Xem chi tiết</a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                        <?php
                                } //end if
                            endforeach;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include("../inc/bottom.php") ?>