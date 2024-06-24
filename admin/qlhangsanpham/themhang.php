<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">THÊM HÃNG</h6>
        </div>
        <div class="card-body">
            <form class="was-validated" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulythem">

                <div class="col md-3 mt-3">
                        <label for="txttenhang" class="form-label">Tên hãng</label>
                        <input class="form-control" type="text" name="txttenhang" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Hãy điền tên hãng.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txttinhtrang" class="form-label">Trạng Thái</label>
                        <input class="form-control" type="number" name="txttinhtrang" value="1" readonly>
                    </div>
                    <div class="md-3 mt-3">
                    <a href="index.php?action=hang" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input type="submit" value="Lưu" class="btn btn-success"></input>
                    <input type="reset" value="Hủy" class="btn btn-warning"></input>
                </div>
        </div>

        </form>
    </div>
</div>
</div>

<?php include("../inc/bottom.php"); ?>