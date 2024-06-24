<?php
include("inc/top.php");
?>
<?php
foreach ($danhmuc as $dm) {
    $i = 0;
?>
    <h3><a class="text-decoration-none text-dark" href="index.php?action=group&id=<?php echo $dm["id"]; ?>" style="padding: 185px;">
            <?php echo $dm["tentbdt"]; ?></a></h3>
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php
        foreach ($sanpham as $sp) {
            if ($sp["danhmuc_id"] == $dm["id"] && $i < 4) {
                $i++;

        ?>
                <div class="col mb-5 justify-content-center" style="margin-right: -50px; margin-left: -50px; padding-left:60px;">
                    <div style="width: 277px; height:300px; margin-right: 10px;" style="border-radius: 25px;" class="card h-100 shadow">
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
                        <a href="index.php?action=detail&danhmuc=<?php echo $sp["danhmuc_id"]; ?>&id=<?php echo $sp["id"]; ?>">
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
                                <strong>
                                    <h6 class="product-price" style="color: red;"><?php echo number_format($sp["giaban"]); ?>VNĐ</h6>
                                </strong>

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
        }
        ?>

    </div>
    <div style="padding-left: 150px;">
        <?php
        if ($i == 0)
            echo "<p>Danh mục hiện chưa có sản phẩm.</p>";
        else
        ?>
    </div>


    <style>
        .button-wrapper {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .button-wrapper button {
            background-color: #dee2e1;
            border: none;
            border-radius: 5px;
        }
    </style>

    <div class="button-wrapper">
        <button><a class="text-decoration-none" href="index.php?action=group&id=<?php echo $sp["danhmuc_id"]; ?>">Xem tất cả</a></button>
    </div>

    <!-- <button style="background-color: #dee2e1; border:#dee2e1; border-radius: 5px;"><a class=" text-decoration-none" href="index.php?action=group&id=<?php echo $sp["danhmuc_id"]; ?>">Xem tất cả </a></button> -->
<?php
}
?>

<?php
include("inc/bottom.php");
?>