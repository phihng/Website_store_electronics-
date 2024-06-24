<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">SỬA DÒNG SẢN PHẨM</h6>
        </div>
        <div class="card-body">
            <form  method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulysua">
                <input type="hidden" name="id" value="<?php echo $dongsp_ht["id"]; ?>">

                <div class="col md-3 mt-3">
                        <label for="txttendong" class="form-label">Tên dòng</label>
                        <input class="form-control" type="text" name="txttendong" value="<?php echo $dongsp_ht["tendong"]; ?>" >
                    </div>
                      
                    <div class="col md-1 mt-1">
                        <label for="txttrangthai" class="form-label">Trạng Thái</label>
                        <input class="form-control" name="txttrangthai" value="<?php echo $dongsp_ht['trangthai']; ?>"></input>
                    </div>
                    </div>

                    <div class="md-3 mt-3">
                    <a href="index.php?action=dongsp" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input type="submit" value="Lưu" class="btn btn-success"></input>
                    <input type="reset" value="Hủy" class="btn btn-warning"></input>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

<?php include("../inc/bottom.php"); ?>