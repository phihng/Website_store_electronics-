<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">DANH SÁCH NGƯỜI DÙNG</h6>
        </div>
        <div class="card-body">
            <p><a style="background-color: #EA0029; color: white;" class="btn " href="index.php?action=themnd">Thêm người dùng</a></p>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        
                            <th>Tên Đăng Nhập</th>
                            <th>Quyền</th>
                            <th>Mật Khẩu</th>
                            <th>Trạng Thái</th>
                            <th>Khoá Tài Khoản</th>
 
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($nguoidung as $nd) :
                            foreach ($quyen as $q) :
                                if ($nd["loaiquyen"] == $q["id"]) { ?>
                                    <tr>
                                        <td><?php echo $nd["taikhoan"]; ?></td>

                                        <?php if ($q["id"] == 1) { ?>
                                            <td class="text-success font-weight-bold"><?php echo $q["tenquyen"]; ?></td>
                                        <?php } else { ?>
                                            <td class="text-primary font-weight-bold"><?php echo $q["tenquyen"]; ?></td>
                                        <?php } ?>
                                        <td><?php echo $nd["matkhau"]; ?></td>
                                        <?php if ($nd["trangthai"] == 1) { ?>
                                            <td class="text-success font-weight-bold">Hoạt động</td>
                                        <?php } //end if TrangThai 
                                        else {
                                        ?>
                                            <td class="text-danger font-weight-bold">Khóa</td>
                                        <?php }  ?>

                                        <td>
                                            <?php if ($nd["trangthai"] == 1) { ?>
                                                <a href="index.php?action=khoa&id=<?php echo $nd['id']; ?>&TrangThai=<?php echo $nd['trangthai']; ?>" class="btn btn-danger">Khóa</a>
                                            <?php } else {
                                            ?>
                                                <a href="index.php?action=khoa&id=<?php echo $nd['id']; ?>&TrangThai=<?php echo $nd['trangthai']; ?>" class="btn btn-warning">Mở</a>
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