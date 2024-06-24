<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">CHI TIẾT ĐƠN HÀNG</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-1">
                    <p style="font-weight: 600;">Mã ĐH: <?php echo $donhang_ht["id"]; ?></p>
                </div>
                <div class="col-1">
                    <p style="font-weight: 600;">Mã KH: <?php echo $khachhang_ht["Makh"]; ?></p>
                </div>
                <div class="col-3">
                    <p style="font-weight: 600; ">Tên khách hàng: <?php echo $khachhang_ht["hoten"]; ?></p>
                </div>
                <div class="col-2">
                    <p style="font-weight: 600;">Ngày đặt: <?php echo date('d/m/Y', strtotime($donhang_ht["ngaygiao"])); ?></p>
                </div>
                <div class="col-2">
                    <p style="font-weight: 600;">Đã thanh toán:
                        <?php if ($donhang_ht["trangthai"] == 2) { ?>
                            <i class=" text-success bi bi-check-circle-fill"></i>
                        <?php } else { ?>
                            <i class="text-danger bi bi-x-circle-fill"></i>
                        <?php } ?>
                    </p>
                </div>
                <div class="col-1">
                    <p style="font-weight: 600;">Đã giao:
                        <?php if ($donhang_ht["trangthai"] == 2) { ?>
                            <i class=" text-success bi bi-check-circle-fill"></i>
                        <?php } else { ?>
                            <i class="text-danger bi bi-x-circle-fill"></i>
                        <?php } ?>
                    </p>
                </div>
                <div class="col-2">
                    <p style="font-weight: 600;">Ngày giao:
                        <?php if ($donhang_ht["trangthai"] == 2) {
                            echo date('d/m/Y', strtotime($donhang_ht["NgayGiaoHang"]));
                        } elseif ($donhang_ht["trangthai"] == 3) {
                            echo "<span class='text-secondary'>Đơn đã hủy</span>";
                        } ?></p>
                </div>
            </div>



            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Số Sim</th>
                            <th>Đơn Giá</th>
                            <th>Thành Tiền</th>
                            <!-- <th rowspan="3">Tổng Tiền</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donhang_ct as $d) :
                            foreach ($sanpham as $sp) :
                                if ($sp["id"] == $d["sanpham_id"] && $donhang_ht["id"] == $d["donhang_id"]) { ?>
                                    <tr>
                                        <td><?php echo $s["SoSim"]; ?></td>
                                        <td><?php echo number_format($d["dongia"]);  ?></td>
                                        <td><?php echo number_format($d["thanhtien"]); ?></td>

                                    </tr>
                        <?php
                                } //end if
                            endforeach;
                        endforeach; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td colspan="3">
                                <h6>Tổng tiền: <?php echo number_format($donhang_ht["TongTien"]); ?> vnđ</h6>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="md-3 mt-3">
                    <a href="index.php?action=xem" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <!-- <input type="reset" value="Hủy" class="btn btn-warning"></input> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include("../inc/bottom.php") ?>