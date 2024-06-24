<?php include("inc/top.php"); ?>
<form method="post" action="index.php?action=htdonhang">
    <div class="row">
        <input type="hidden" name="action" value="htdonhang">
        <h3 class="text-dark text-left">Vui lòng xác nhận thông tin</h3>
        <div class="col-6 ">
            <div class="card-header">
                <h4 class="text-info text-left">Thông tin khách hàng</h4>
            </div>
            <div class="card-body">
                <input type="hidden" name="txtid" value="<?php echo $_SESSION['khachhang']['id']; ?>">
                <input type="hidden" name="txttongtien" value="<?php echo tinhtiengiohang(); ?>">
                <div class="my-3">
                    <label for="txthoten" class="form-label">Họ tên:</label>
                    <input type="text" class="form-control" id="hoten" placeholder="Họ tên" name="txthoten" value="<?php echo $_SESSION['khachhang']['hoten']; ?>" required>
                </div>
               
                <div class="my-3">
                    <label for="txtsdt" class="form-label">Số điện thoại:</label>
                    <input type="number" class="form-control" id="sdt" placeholder="Số điện thoại" name="txtsdt" value="<?php echo $_SESSION['khachhang']['sodienthoai']; ?>" required>
                </div>
                
                <div class="my-3">
                    <label for="txtdiachi" class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" id="diachi" placeholder="Nhập địa chỉ" name="txtdiachi" value="<?php echo $_SESSION['khachhang']['diachi']; ?>" required>
                </div>
                <div class="my-3 text-left">

                   <input  style="background-color: #EE0033 !important; color: white;" class="btn btn-primary" type="submit" value="Hoàn tất đơn hàng">
										<!-- <span> Hoàn tất đơn hàng</span> -->

                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card-header">
                <h4 class="text-info text-left">Thông tin đơn hàng</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên hàng</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php foreach ($giohang as $id => $sp) : ?>
                        <tr>
                            <td><input type="hidden" name="txtid_mh" value="<?php echo $sp["id"]; ?>"><?php echo $sp["id"]; ?></td>
                            <td><img width="50" src="../fptshop/images/img/chung/<?php echo $sp["hinhanh"]; ?>" alt=""></td>
                            <td><input type="hidden" name="txttenmh" value="<?php echo $sp["tensanpham"]; ?>"><?php echo $sp["tensanpham"]; ?></td>
                            <td><input type="hidden" name="txtdongia" value="<?php echo number_format($sp["giaban"]); ?>"><?php echo number_format($sp["giaban"]); ?>đ</td>
                            <td><input type="hidden" name="txtsl" value="<?php echo $sp["soluong"]; ?>"><?php echo $sp["soluong"]; ?></td>
                            <td><input type="hidden" name="txtthanhtien" value="<?php echo number_format($sp["thanhtien"]); ?>"><?php echo number_format($sp["thanhtien"]); ?>đ</td>

                        </tr>
                    <?php endforeach; ?>
                    
                    <tr>
                        <td colspan="3"></td>
                        <td class="fw-bold">Tổng tiền</td>
                        <td class="text-danger fw-bold">
                            <?php echo number_format(tinhtiengiohang()); ?>đ

                        <input type="hidden" name="txttongtien" value="<?php echo tinhtiengiohang(); ?>"/>
                        </td>
                    </tr>
                </table>
                <div>Ghi chú
                    <br>
                    <textarea name="txtghichu" style="width: 700px;" id="ghichu" cols="50" rows="6"></textarea>
                </div>
            </div>
        </div>
    </div>
</form>
<?php include("inc/bottom.php"); ?>