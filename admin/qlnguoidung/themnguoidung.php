<?php include("../inc/top.php"); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold">THÊM NGƯỜI DÙNG</h6>
        </div>
        <div class="card-body">
            <form class="was-validated" method="post" enctype="multipart/form-data" action="index.php">
                <input type="hidden" name="action" value="xulythemnd">

                <div class="row">
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="optquyen" class="form-label">Phân quyền</label>
                            <select class="form-select" required name="optquyen">
                                <option value="">Chọn quyền người dùng</option>
                                <?php foreach ($quyen as $q) : ?>
                                    <option value="<?php echo $q['id']; ?>"><?php echo $q['tenquyen']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Vui lòng chọn loại quyền</div>
                        </div>
                    </div>
                
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txttendangnhap" class="form-label">Tên đăng nhập</label>
                            <input class="form-control has-validation" type="text" name="txttaikhoan"  required>
                            <div class="valid-feedback">Hợp lệ.</div>
                            <div class="invalid-feedback">Vui lòng nhập tên đăng nhập hợp lệ.</div>
                        </div>
                    </div>
                    
                </div>
                
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtmatkhau" class="form-label">Mật khẩu</label>
                            <input class="form-control has-validation" type="text" name="txtmatkhau"  required></input>
                            <div class="valid-feedback">Hợp lệ.</div>
                            <div class="invalid-feedback">Vui lòng nhập mật khẩu.</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txttrangthai" class="form-label">Trạng thái</label>
                            <input class="form-control" type="number" name="txttrangthai" value="1"></input>
                        </div>
                  
                </div>
                <div class="md-3 mt-3">
                    <a href="index.php?action=xem" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input type="submit" value="Lưu" class="btn btn-success"></input>
                    <input type="reset" value="Hủy" class="btn btn-warning"></input>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("../inc/bottom.php"); ?>