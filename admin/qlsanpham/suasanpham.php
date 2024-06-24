<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">SỬA THÔNG TIN SẢN PHẨM</h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulysua">
                <input type="hidden" name="id" value="<?php echo $sanpham_ht["id"]; ?>">

                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="optdanhmuc" class="form-label">Danh Mục</label>
                        <select class="form-control form-select" required name="optdanhmuc">
                            <option value="">Chọn danh mục</option>
                            <?php foreach ($danhmuc as $dm) : ?>
                                <option value="<?php echo $dm["id"]; ?>" <?php if ($dm["id"] == $sanpham_ht["danhmuc_id"]) echo "selected"; ?>><?php echo $dm['tentbdt']; ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <div class="col md-3 mt-3">
                        <label for="optdong" class="form-label">Dòng Sản Phẩm</label>
                        <select class="form-control form-select" required name="optdong">
                            <option value="">Chọn dòng</option>
                            <?php foreach ($dongsp as $dsp) : ?>
                                <option value="<?php echo $dsp['id']; ?>" <?php if ($dsp["id"] == $sanpham_ht["tendong_id"]) echo "selected"; ?>><?php echo $dsp['tendong']; ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <div class="col md-3 mt-3">
                        <label for="opthang" class="form-label">Hãng</label>
                        <select class="form-control form-select" required name="opthang">
                            <option value="">Chọn hãng</option>
                            <?php foreach ($hang as $h) : ?>
                                <option value="<?php echo $h['id']; ?>" <?php if ($h["id"] == $sanpham_ht["hang_id"]) echo "selected"; ?>><?php echo $h['tenhang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txttensanpham" class="form-label">Tên sản phẩm</label>
                        <input class="form-control" type="text" name="txttensanpham" value="<?php echo $sanpham_ht["tensanpham"]; ?>">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="optphankhuc" class="form-label">Phân Khúc</label>
                        <select class="form-control form-select" required name="optphankhuc">
                            <option value="">Chọn phân khúc</option>
                            <?php foreach ($phankhuc as $pk) : ?>
                                <option value="<?php echo $pk['id']; ?>" <?php if ($pk["id"] == $sanpham_ht["phankhuc"]) echo "selected"; ?>><?php echo $pk['giatritoithieu'] . '-' . $pk['giatritoida']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txtgiagoc" class="form-label">Giá Gốc</label>
                        <input class="form-control" type="number" name="txtgiagoc" value="<?php echo $sanpham_ht["giagoc"]; ?>">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtgiaban" class="form-label">Giá Bán</label>
                        <input class="form-control" type="number" name="txtgiaban" value="<?php echo $sanpham_ht["giaban"]; ?>">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="optctkm" class="form-label">Chương trình khuyến mãi</label>
                        <select class="form-control form-select" required name="optctkm">
                            <option value="">Chọn chương trình khuyến mãi</option>
                            <?php foreach ($ctkhuyenmai as $km) : ?>
                                <option value="<?php echo $km['id']; ?>" <?php if ($km["id"] == $sanpham_ht["khuyenmai_id"]) echo "selected"; ?>><?php echo $km['ten_km']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtsoluongton" class="form-label">Số Lượng</label>
                        <input class="form-control" type="number" name="txtsoluongton" value="<?php echo $sanpham_ht["soluongton"]; ?>">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txttinhtrang" class="form-label">Trạng Thái</label>
                        <input class="form-control" type="number" name="txttinhtrang" value="<?php echo $sanpham_ht["trangthai"]; ?>">

                    </div>

                    <div class="row g-3">
                        <div class="col my-3">
                            <label>Hình ảnh</label><br>
                            <input type="hidden" name="hinhanh" value="<?php echo $sanpham_ht["hinhanh"]; ?>">
                            <img src="../../img/tbdt/<?php echo $sanpham_ht["hinhanh"]; ?>" width="100px" class="img-thumbnail">
                            <p>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Đổi hình ảnh
                                </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <input type="file" class="form-control" name="filehinhanh">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col md-3 mt-3">
                        <label for="txtmota" class="form-label">Mô Tả</label>
                        <!-- <input class="form-control" id="editor" type="text" name="txtmota" value="<php echo isset($MoTa) ? $MoTa : ''; ?>" > -->
                        <textarea id="editor" rows="5" class="form-control" name="txtmota"><?php echo $sanpham_ht['mota']; ?></textarea>
                    </div>

                    <div class="col md-3 mt-3">
                        <label for="txtthongsokythuat" class="form-label">Thông số kỹ thuật</label>
                        <!-- <input class="form-control" id="editor" type="text" name="txtmota" value="<php echo isset($MoTa) ? $MoTa : ''; ?>" > -->
                        <textarea id="editor1" rows="5" class="form-control" name="txtthongsokythuat"><?php echo $sanpham_ht['thongsokythuat']; ?></textarea>
                    </div>

                </div>
                <div class="col md-3 mt-3">
                    <label for="optnhanvien" class="form-label">Nhân viên thực hiện</label>
                    <select class="form-control form-select" required name="optnhanvien">
                        <option value="">Chọn Nhân viên</option>
                        <?php foreach ($nguoidung as $nd) : ?>
                            <option value="<?php echo $nd['id']; ?>" <?php if ($nd["id"] == $sanpham_ht["nv_id"]) echo "selected"; ?>><?php echo $nd['taikhoan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="md-3 mt-3">
                    <a href="index.php?action=sanpham" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input type="submit" value="Lưu" class="btn btn-success"></input>
                    <input type="reset" value="Hủy" class="btn btn-warning"></input>
                </div>
        </div>

        </form>
    </div>
</div>
</div>

<?php include("../inc/bottom.php"); ?>