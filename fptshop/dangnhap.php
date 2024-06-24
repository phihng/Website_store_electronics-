<?php include("inc/top.php"); ?>
<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">
                            <h1 class="h2">Xin chào!</h1>
                            <p class="lead">Vui lòng đăng nhập để tiếp tục</p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    <form action="index.php" method="post">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="text" name="txttaikhoan" placeholder="Nhập tài khoản" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mật khẩu</label>
                                            <input class="form-control form-control-lg" type="password" name="txtmatkhau" placeholder="Nhập mật khẩu" />
                                        </div>
                                        <div class="d-grid gap-2 my-3">
                                            <input type="hidden" name="action" value="xldangnhap">
                                            <input type="submit"  style="background-color:#EE0033;" class="btn btn-lg btn-primary" value="Đăng nhập">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            Chưa có tài khoản? <a href="index.php?action=dangky" style="color:#0A6AD3">Đăng ký</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<?php include("inc/bottom.php"); ?>