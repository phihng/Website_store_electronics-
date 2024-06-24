<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">THÔNG TIN KHÁCH HÀNG</h6>
        </div>
  

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tài khoản</th>      
                            <th>Mật Khẩu</th>
                            <th>Số Điện Thoại</th>
                            <th>Họ và Tên</th>
                            <th>Địa Chỉ</th>
                            <th>Hình Ảnh</th>
                           
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tài khoản</th>      
                            <th>Mật Khẩu</th>
                            <th>Số Điện Thoại</th>
                            <th>Họ và Tên</th>
                            <th>Địa Chỉ</th>
                            <th>Hình Ảnh</th>
                          
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($khachhang as $kh) : ?>
                                    <tr>
                                        <td><?php echo $kh["id"]; ?></td>
                                        <td><?php echo $kh["taikhoankh"]; ?></td>
                                        <td><?php echo $kh["matkhau"]; ?></td>
                                        <td><?php echo $kh["sodienthoai"]; ?></td>
                                        <td><?php echo $kh["hoten"]; ?></td>
                                        <td><?php echo $kh["diachi"]; ?></td>
                                        <td><img width="150px" src="../../img/khachhang/<?php echo $kh["hinhanh"]; ?>" alt="<?php echo $kh["hinhanh"]; ?>" ></td>
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