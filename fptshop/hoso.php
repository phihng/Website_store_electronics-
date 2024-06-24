<?php include("inc/top.php"); ?>
<div class="row" style="padding-bottom: 50px;">
    <div class="col-12 col-md-10 m-auto">
        <div class="card p-5">
            <div class="card-header">
                <h4 class="section-title text-center">HỒ SƠ NGƯỜI DÙNG</h4>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="index.php">
                    <input type="hidden" name="txtid" value="<?php echo $_SESSION['khachhang']['id']; ?>">
                    <input type="hidden" name="txthinhanh" value="<?php echo $_SESSION['khachhang']['hinhanh']; ?>">
                    <input type="hidden" name="action" value="xlhoso">
                    <div class="row">
                        <div class="col-7">
                        <div class="my-3 mt-3">
                        <label for="txthoten" class="form-label">Họ tên:</label>
                        <input type="text" class="form-control" id="hoten" placeholder="Họ tên" name="txthoten" value="<?php echo $_SESSION['khachhang']['hoten']; ?>" required>
                    </div>

                    <div class="my-3">
                    <label for="txttaikhoan" class="form-label">Tài khoản:</label>
                        <input type="ext" class="form-control" id="taikhoankh" placeholder="Tài khoản" name="txttaikhoan" value="<?php echo $_SESSION['khachhang']['taikhoankh']; ?>" required>
                    </div>

                    <div class="my-3">
                    <label for="txtmatkhau" class="form-label">Mật khẩu:</label>
                        <input type="password" class="form-control" id="matkhau" placeholder="Mật khẩu" name="txtmatkhau" value="<?php echo $_SESSION['khachhang']['matkhau']; ?>" required>
                    </div>

                    <div class="my-3">
                        <label for="txtsdt" class="form-label">Số điện thoại:</label>
                        <input type="number" class="form-control" id="sdt" placeholder="Số điện thoại" name="txtsdt" value="<?php echo $_SESSION['khachhang']['sodienthoai']; ?>" required>
                    </div></div>
                        <div class="col-5">
                        <div class="text-center">
                            <img class="img-thumbnail" width="250px" height="250px" src="
                        <?php
                        if ($_SESSION['khachhang']['hinhanh'] == NULL) {
                            echo '../img/khachhang/user.png';
                        } else echo '../img/khachhang/' . $_SESSION['khachhang']['hinhanh']; ?>" alt="<?php echo $_SESSION['khachhang']['hoten'];  ?>" width="100px">
                        </div></div>
                    </div>                   
                    <div class="my-3">
                        <label for="txtdiachi" class="form-label">Địa chỉ:</label>
                        <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ" name="txtdiachi" value="<?php echo $_SESSION['khachhang']['diachi']; ?>" required>
                    </div>
                    <div class="my-3">
                        <label for="fhinhanh" class="form-label">Đổi hình đại diện</label>
                        <input type="file" class="form-control" name="fhinhanh">
                    </div>
                    <div class="form-check my-3">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
                    <div class="my-3 text-center">
                        <input style="background-color:#EE0033;" class="btn btn-primary" type="submit" value="Cập nhật">
                        <input class="btn btn-warning" type="reset" value="Không">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php include("inc/bottom.php"); ?>