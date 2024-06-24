<?php include("inc/top.php"); 
// Số mặt hàng trên mỗi trang
$itemsPerPage = 10;

// Tính toán số trang dựa trên tổng số mặt hàng và số mặt hàng trên mỗi trang
$totalItems = count($sanpham);
$totalPages = ceil($totalItems / $itemsPerPage);

// Xác định trang hiện tại từ tham số 'page' trong URL
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Xác định chỉ mục bắt đầu và kết thúc của mặt hàng trên trang hiện tại
$startIndex = ($currentPage - 1) * $itemsPerPage;
$endIndex = min($startIndex + $itemsPerPage - 1, $totalItems - 1);

// Lấy mảng mặt hàng cho trang hiện tại
$pagedsanpham = array_slice($sanpham, $startIndex, $itemsPerPage);
?>

<h3 class="text-dark" style="padding-left: 150px;"><?php echo $tendm; ?></h3 >
<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" >
    <?php
    if ($sanpham != null) {
        foreach ($sanpham as $sp) :
    ?>
            <div class="col mb-5 justify-content-center" style="margin-right: -39px; margin-left: -39px; padding-left:60px;">
                    <div  style="width: 277px; height:300px; margin-right: 10px;"  style="border-radius: 25px;" class="card h-100 shadow">
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
                    <img src="../fptshop/images/img/chung/<?php echo $sp["hinhanh"]; ?>"  width="100%" height="300px" alt="" srcset="">

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
        endforeach;
    } else {
        echo 
        "<div style='padding-left: 60px; '><p>Danh mục này hiện chưa có sản phẩm.</p></div>";
    }
    ?>
</div>
<!-- Hiển thị phân trang -->
<!-- <div class="pagination justify-content-center" style="margin:20px 0">
<li class="page-item"><a class="page-link" href="#"><i class="bi bi-caret-left-fill"></i></a></li>
	<php for ($i = 1; $i <= $totalPages; $i++) : ?>
		<php if ($i == $currentPage) : ?>
        <li class="page-item"><a class="page-link" href="#"><php echo $i; ?></a></li>
		<php else : ?>
			<a href="index.php?page=<php echo $i; ?>"><php echo $i; ?></a>	
		<php endif; ?>
	<php endfor; ?>
    <li class="page-item"><a class="page-link" href="#"><i class="bi bi-caret-right-fill"></i></a></li>

</div> -->

<?php include("inc/bottom.php"); ?>