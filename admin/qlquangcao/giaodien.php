<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">DANH SÁCH BANNER QUẢNG CÁO</h6>
        </div>
        <div class="card-body">
            <p><a style="background-color: #EA0029; color: white;" class="btn " href="index.php?action=themgd">Thêm</a></p>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã Quảng Cáo</th>
                            <th>Hình Ảnh</th>
                            <th>Đường Dẫn</th>
                            <th>Trạng Thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã Quảng Cáo</th>
                            <th>Hình Ảnh</th>
                            <th>Đường Dẫn</th>
                            <th>Trạng Thái</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($giaodien as $gd) : ?>
                                    <tr>
                                        <td><?php echo $gd["id"]; ?></td>
                                        <td><img width="300px" src="../../img/carousel/<?php echo $gd["hinhanh"]; ?>" alt="<?php echo $gd["hinhanh"]; ?>" ></td>
                                        <td><?php echo $gd["url"]; ?></td>
                                        <?php if ($gd["trangthai"] == 1) { ?>
                                            <td class="text-success">Đang hoạt động</td>
                                        <?php } else { ?>
                                            <td class="text-primary">Ngừng hoạt động</td>
                                        <?php } ?>
                                        <td>
                                            <?php if ($gd["trangthai"] == 1) { ?>
                                                <a href="index.php?action=suagd&id=<?php echo $gd['id']; ?>" class="btn btn-warning">Sửa</a>
                                                <a href="index.php?action=khoa&id=<?php echo $gd['id']; ?>&trangthai=<?php echo $gd['trangthai']; ?>" class="btn btn-danger">Khóa</a>
                                            <?php } else {
                                            ?>
                                                <a href="index.php?action=suagd&id=<?php echo $gd['id']; ?>" class="btn btn-warning">Sửa</a>
                                                <a href="index.php?action=khoa&id=<?php echo $gd['id']; ?>&trangthai=<?php echo $gd['trangthai']; ?>" class="btn btn-warning">Mở</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                        <?php endforeach; ?>
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