<?php include("inc/top.php"); ?>

<h6 class="product-price" style="margin-left: 150px;">Kết quả tìm kiếm cho: <?php echo $_POST["txtsearch"]; ?></h6>
<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
    <?php
    // Kiểm tra nếu biến $sanpham không được định nghĩa hoặc rỗng
    if (!isset($sanpham) || empty($sanpham)) {
    ?>
        <div class="col mb-5 justify-content-center">
            <p style="text-align: center;">Kết quả tìm kiếm không có! Vui lòng nhập từ khóa khác...</p>
        </div>
    <?php
    } else {
        // Duyệt và hiển thị sản phẩm tìm được
        foreach ($sanpham as $sp) :
            foreach ($danhmuc as $dm) :
                if ($sp["danhmuc_id"] == $dm["id"]) {
    ?>
                    <div class="col mb-5 justify-content-center">
                        <div style="width: 277px; height: 300px; margin-right: 10px; border-radius: 25px;" class="card h-100 shadow">
                            <!-- Expired product-->
                            <?php if ($sp["soluongton"] == 0) { ?>
                                <div class="badge bg-danger text-white position-absolute" style="text-align: center; width: 150px; align-items: center;">Hết hàng</div>
                            <?php } // end if 
                            ?>
                            <!-- Sale badge-->
                            <?php if ($sp["giaban"] < $sp["giagoc"]) { ?>
                                <div class="badge bg-danger text-white position-absolute" style="top: 0.25rem; right: 0.25rem; width: 80px; height: 23px; font-size: 13px;">Giảm giá</div>
                            <?php } // end if 
                            ?>
                            <!-- Product image-->
                            <a href="index.php?action=detail&danhmuc_id=<?php echo $sp["danhmuc_id"]; ?>&id=<?php echo $sp["id"]; ?>">
                                <img src="../fptshop/images/img/chung/<?php echo $sp["hinhanh"]; ?>" width="100%" height="300px" alt="" srcset="">
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <a class="text-decoration-none" href="index.php?action=detail&danhmuc=<?php echo $sp["danhmuc_id"];  ?>&id=<?php echo $sp["id"]; ?>">
                                        <h5 class="product-title justify-text"><?php echo $sp["tensanpham"]; ?></h5>
                                    </a>
                                    <!-- Product reviews-->

                                    <!-- Product price-->
                                    <?php if ($sp["giaban"] < $sp["giagoc"]) { ?>
                                        <span class="text-muted text-decoration-line-through"><?php echo number_format($sp["giagoc"]); ?>VNĐ</span><?php } // end if 
                                    ?>
                                    <strong><h6 class="product-price" style="color: red;"><?php echo number_format($sp["giaban"]); ?>VNĐ</h6></strong>

                                    <span class="icon-cross">
                                        <img src="images/cross.svg" class="img-fluid">
                                    </span>
                                    <div class="detail-box">
                                        <div class="d-flex justify-content small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <?php
                }
            endforeach;
        endforeach;
    }
    ?>
</div>

<?php include("inc/bottom.php"); ?>
