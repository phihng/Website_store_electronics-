<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">SỬA THÔNG TIN QUẢNG CÁO</h6>
        </div>
        <div class="card-body">
            <form method="post" action="index.php" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulysuagd">
                <input type="hidden" name="id" value="<?php echo $giaodien_ht["id"]; ?>">
                <div class="row g-3">
                    <div class="col md-1 mt-1">
                        <label for="txtduongdan" class="form-label">Đường dẫn</label>
                        <input class="form-control" name="txtduongdan" value="<?php echo $giaodien_ht['url']; ?>"></input>
                    </div>
                    <div class="row g-3">    
                    <div class="col md-1 mt-1">
                        <label for="txttrangthai" class="form-label">Trạng Thái</label>
                        <input class="form-control" name="txttrangthai" value="<?php echo $giaodien_ht['trangthai']; ?>"></input>
                    </div>
                    </div>
                </br>
                <div class="row g-3">
                    <div class="col my-3">
                        <label>Hình ảnh</label><br>
                        <input type="hidden" name="hinhanh" value="<?php echo $giaodien_ht["hinhanh"]; ?>">
                        <img src="../../img/carousel/<?php echo $giaodien_ht["hinhanh"]; ?>" width="500px" class="img-thumbnail">
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
                <div class="my-3">
                    <a href="index.php?action=xem" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input class="btn btn-primary" type="submit" value="Lưu">
                    <input class="btn btn-warning" type="reset" value="Hủy">
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php include("../inc/bottom.php"); ?>