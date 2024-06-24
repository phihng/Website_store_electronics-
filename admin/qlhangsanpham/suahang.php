<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">SỬA HÃNG SẢN PHẨM</h6>
        </div>
        <div class="card-body">
            <form  method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulysua">
                <input type="hidden" name="id" value="<?php echo $hang_ht["id"]; ?>">

                <div class="col md-3 mt-3">
                        <label for="txttentbdt" class="form-label">Tên danh mục</label>
                        <input class="form-control" type="text" name="txttenhang" value="<?php echo $hang_ht["tenhang"]; ?>" >
                    </div>
                      
                    <div class="col md-1 mt-1">
                        <label for="txttrangthai" class="form-label">Trạng Thái</label>
                        <input class="form-control" name="txttrangthai" value="<?php echo $hang_ht['trangthai']; ?>"></input>
                    </div>
                    </div>

                    <div class="md-3 mt-3">
                    <a href="index.php?action=danhmuc" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input type="submit" value="Lưu" class="btn btn-success"></input>
                    <input type="reset" value="Hủy" class="btn btn-warning"></input>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

<?php include("../inc/bottom.php"); ?>