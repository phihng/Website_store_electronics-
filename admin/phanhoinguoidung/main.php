<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">DANH SÁCH PHẢN HỒI</h6>
        </div>
        <div class="card-body">
            <!-- <p><a style="background-color: #EA0029; color: white;" class="btn " href="index.php?action=themnd">Thêm</a></p> -->

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã Khách Hàng</th>
                            <th>Tên Khách Hàng</th>
                            <th>Nội Dung</th>
                            <th>Sản Phẩm</th>
                            <th>Hình Ảnh</th>
                            <!-- <th>Trả Lời</th> -->
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($danhgia as $dg) :
                            $traLoiFlag = false; // Biến flag để kiểm tra xem đã có phản hồi cho bản ghi hiện tại hay chưa
                            foreach ($khachhang as $kh) :
                                foreach ($sanpham as $sp) :
                                if ($kh["id"] == $dg["id_kh"]&& $sp['id']==$dg["id_sp"]) { ?>
                                    <tr>
                                        <td><?php echo $kh["id"]; ?></td>
                                        <td><?php echo $kh["hoten"]; ?></td>
                                        <td><?php echo $dg["nhanxet"]; ?></td>
                                        <td><?php echo $sp["tensanpham"]; ?></td>
                                        <td><img width="150px" src="../../viettelstore1/images/img/chung/<?php echo $sp["hinhanh"]; ?>" alt="<?php echo $sp["hinhanh"]; ?>" ></td>

                                        <?php foreach ($traloidanhgia as $t) :
                                            if ($t["traloi"] != null && $t["dg_id"] == $dg["id"]) {
                                                $traLoiFlag = true; // Đánh dấu đã có phản hồi cho bản ghi hiện tại
                                            }
                                        endforeach; ?>

                                        <td>
                                            <?php if ($traLoiFlag) { ?>
                                                <span class="text-success"><i class="bi bi-check-circle-fill"></i> Đã trả lời</span>
                                            <?php } else { ?>
                                                <span class="text-warning"><i class="bi bi-x-circle-fill"></i> Chưa trả lời</span>
                                            <?php } ?>
                                        </td>
                                        <td><a class="btn btn-primary" href="index.php?action=phanhoi&id=<?php echo $dg["id"] ?>">Phản Hồi</a></td>
                                    </tr>
                        <?php
                                } //end if
                            endforeach;
                        endforeach;
                    endforeach; 
                        ?>

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