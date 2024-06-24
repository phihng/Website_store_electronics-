<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">DANH SÁCH SẢN PHẨM</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <p><a style="background-color: #EA0029; color: white;" class="btn " href="index.php?action=themsanpham">Thêm</a></p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Tên hãng sản phẩm</th>
                            <th scope="col">Tên dòng sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá gốc</th>
                            <th scope="col">Giá bán</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Lượt xem</th>
                            <th scope="col">Lượt mua</th>
                            <th scope="col">Thông số kỹ thuật</th>
                            <th scope="col">Phân khúc</th>
                            <th scope="col">Nhân viên thực hiện</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th scope="col">Tên danh mục</th>
                            <th scope="col">Tên hãng sản phẩm</th>
                            <th scope="col">Tên dòng sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá gốc</th>
                            <th scope="col">Giá bán</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Lượt xem</th>
                            <th scope="col">Lượt mua</th>
                            <th scope="col">Thông số kỹ thuật</th>
                            <th scope="col">Phân khúc</th>
                            <th scope="col">Nhân viên thực hiện</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col"></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($sanpham as $sp) :

                            foreach ($danhmuc as $dm) :
                                foreach ($hang as $h) :
                                    foreach($dongsp as $dsp):
                                if ($sp["danhmuc_id"] == $dm["id"] && $sp["hang_id"] == $h["id"] && $sp["tendong_id"] == $dsp["id"]) { ?>
                                    <tr>
                                        <td><?php echo $dm["tentbdt"] ?></td>

                                        <td><?php echo $h["tenhang"] ?></td>

                                        <td><?php echo $dsp["tendong"] ?></td>

                                        <td><?php echo $sp["tensanpham"] ?></td>
                                        <td><?php echo $sp["giagoc"] ?></td>
                                        <td><?php echo $sp["giaban"] ?></td>
                                        <td><?php echo  substr($sp["mota"], 0,  150) . "..."?></td> 
                                        <td><?php echo $sp["soluongton"] ?></td>
                                        <td><img width="150px" src="../../viettelstore1/images/img/chung/<?php echo $sp["hinhanh"]; ?>" alt="<?php echo $sp["hinhanh"]; ?>" ></td>
                                        <td><?php echo $sp["luotxem"] ?></td>
                                        <td><?php echo $sp["luotmua"] ?></td>
                                        <td><?php echo $sp["thongsokythuat"] ?></td>
                                        <td><?php echo $sp["phankhuc"] ?></td>
                                        <td><?php echo $sp["nv_id"] ?></td>
                                        <!-- Tình Trạng -->
                                        <?php if ($sp["trangthai"] == 1) { ?>
                                            <td class="text-success font-weight-bold"> Còn Hàng</td>
                                        <?php } else { ?>
                                            <td class="text-danger font-weight-bold"> Hết Hàng</td>
                                        <?php } ?>
                                        <td>
                                            <a href="index.php?action=sua&id=<?php echo $sp['id']; ?>" class="btn btn-warning">Sửa</a>
                                            <!-- <a href="index.php?action=xoa&id=<php echo  $sp['MaSim']; ?>" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')">Xóa</a> -->
                                        </td>
                                    </tr>
                        <?php
                                } //end if
                            endforeach;
                        endforeach;
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