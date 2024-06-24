<?php include("inc/top.php"); ?>

<div class="row" style="padding-left: 300px;">
	<div class="col-sm-9">
		<div class="row">
			<div class="col-md-6">
				<h3 class="text-dark"><?php echo $mhct["tensanpham"]; ?></h3>
				<div><img style="border-radius: 20px" width="500px" src="../fptshop/images/img/chung/<?php echo $mhct["hinhanh"]; ?>"></div>
			</div>
			<div class="col-7 col-md-6" style="padding-left: 50px; padding-right: -500px;">
				<?php

				$text = "<strong>KHUYẾN MÃI:</strong><br>Mua ốp chính hãng chỉ từ 390.000đ. <br>Giảm thêm 300,000đ khi tham gia trả góp. <br>Nhập mã VST300 giảm thêm 300,000đ khi thanh toán qua VNPAY. <br>Miễn phí trả góp kỳ hạn 06 tháng trên giá khuyến mại qua thẻ tín dụng.";


				?>

				<div style="padding-left: 30px; padding-top:20px;" class="text-container">
					<?php echo $text; ?>
				</div>
				<div style="padding-left: 30px;" class="row my-5">
					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/truck.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Miễn phí vận chuyển</h3>
						</div>
					</div>

					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/bag.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Hư gì đổi nấy 12 tháng </h3>
						</div>
					</div>
					<div>

						<h6 class="text-primary">
							<span class="text-muted text-decoration-line-through"><?php echo number_format($mhct["giagoc"]); ?>VNĐ</span>

							<strong>
								<h4 class="product-price" style="color: red;"><?php echo number_format($mhct["giaban"]); ?>VNĐ</h4>
							</strong>
						</h6>
						<h7><i>Đã bao gồm thuế VAT</i></h7>

						<div class="detail-box">
							<div class="d-flex justify-content small text-warning mb-2">
								<div class="bi-star-fill"></div>
								<div class="bi-star-fill"></div>
								<div class="bi-star-fill"></div>
								<div class="bi-star-fill"></div>
								<div class="bi-star-fill"></div>
							</div>
						</div>

						<form method="post" class="form-inline">
							<input type="hidden" name="action" value="chovaogio">
							<input type="hidden" name="id" value="<?php echo $mhct["id"]; ?>">
							<div class="row">
								<div class="col">
									<input type="number" class="form-control" name="soluong" value="1">
								</div>

								<div class="col">
									<input type="submit" class="btn btn-primary rounded-pill" style=" border-radius: 20px;" value="Chọn mua">
								</div>
								<div>
									<p class="mb-0" style="padding-top: 10px;"><a href="index.php?action=baohanh"><i>Chính sách bảo hành</i></a></p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<hr />
			<div class="row mt-4" style="padding-top: 20px; padding-bottom: 50px;">
				<div class="col">
					<div class="description-container" style="width: 900px;">
						<h4 style="padding-top: 10px;" class="text-primary">ĐẶC ĐIỂM NỔI BẬT</h4>
						<p class="text-justify"><?php echo $mhct["mota"]; ?></p>
					</div>
				</div>
				<div class="col" >
					<div class="specifications-container" style="width: 900px;">
						<h4 style="padding-top: 10px;" class="text-primary">THÔNG SỐ KỸ THUẬT</h4>
						<p class="text-justify"><?php echo $mhct["thongsokythuat"]; ?></p>
					</div>
				</div>

				<style>
					.description-container {
						border: 1px solid white;
						border-radius: 10px;
						background-color: white;
						padding: 10px;
						/* Add any other desired styles */
					}

					.specifications-container {
						border: 1px solid white;
						background-color: white;
						border-radius: 10px;
						padding: 10px;
						/* Add any other desired styles */
					}
				</style>
			</div>


		</div>
		<hr />



		<h5 style="padding-top:30px; padding-bottom:15px; " class="text-dark"><strong>SẢN PHẨM TƯƠNG TỰ</strong></h5>
		<div class="row justify-content-center" style="padding-left: 100px; ">
			<?php
			$count = 0; // Biến đếm số lượng sản phẩm
			foreach ($sanpham as $sp) :
				if ($sp["id"] != $mhct["id"] and $count >= 4)
					break;
				if ($sp["danhmuc_id"] == $mhct["danhmuc_id"]) : // Kiểm tra xem sản phẩm thuộc cùng danh mục với $mhct
					$count++;
			?>
					<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
						<div class="card h-100 shadow">
							<!-- Sản phẩm hết hạn-->
							<?php if ($sp["soluongton"] == 0) { ?>
								<div class="badge bg-danger text-white position-absolute" style="text-align: center; width: 150px; align-items: center;">Hết hàng</div>
							<?php } // Kết thúc if 
							?>
							<!-- Sản phẩm giảm giá-->
							<?php if ($sp["giaban"] < $sp["giagoc"]) { ?>
								<div class="badge bg-danger text-white position-absolute" style="top: 0.25rem; right: 0.25rem; width: 80px; height: 23px; font-size: 13px;">Giảm giá</div>
							<?php } // Kết thúc if 
							?>
							<!-- Hình ảnh sản phẩm-->
							<span class="icon-cross">
								<img src="../fptshop/images/img/chung/<?php echo $sp["hinhanh"]; ?>" class="img-fluid">
							</span>
							<div class="card-body p-4 d-flex flex-column justify-content-between">
								<div class="text-center">
									<!-- Tên sản phẩm-->
									<a class="text-decoration-none" href="index.php?action=detail&danhmuc=<?php echo $sp["danhmuc_id"]; ?>&id=<?php echo $sp["id"]; ?>">
										<h7 class="product-title justify-text"><?php echo $sp["tensanpham"]; ?></h7>
									</a>
									<!-- Đánh giá sản phẩm-->

									<!-- Giá sản phẩm-->
									<?php if ($sp["giaban"] < $sp["giagoc"]) { ?>
										<span class="text-muted text-decoration-line-through"><?php echo number_format($sp["giagoc"]); ?>VNĐ</span>
									<?php } // Kết thúc if 
									?>
									<strong>
										<h7 class="product-price" style="color: red;"><?php echo number_format($sp["giaban"]); ?>VNĐ</h7>
									</strong>


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
				endif; // Kết thúc if
			endforeach;
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

		<div class="button-wrapper" style="padding-bottom: 30px;">
			<button><a class="text-decoration-none" href="index.php?action=group&id=<?php echo $sp["danhmuc_id"]; ?>">Xem tất cả</a></button>
		</div>
	</div>
</div>


<!-- HIỂN THỊ BÌNH LUẬN -->

<section style="background-color: #EFF2F1; outline-color: white; padding-left: 50px;">
	<div class="container my-5 py-5">
		<div class="row d-flex justify-content-center">
			<div class="col-md-12 col-lg-10 col-xl-8" style="background-color: #fff;">

				<?php
				foreach ($khachhang as $kh) :
					foreach ($danhgia as $dg) :
						if ($kh["id"] == $dg["id_kh"] && $dg["id_sp"] == $mhct["id"]) { ?>
							<div>
								<div class="card-body">

									<div class="d-flex flex-start align-items-center">
										<img class="rounded-circle shadow-1-strong me-3" src="../img/khachhang/<?php echo $kh["hinhanh"] ?>" alt="avatar" width="60" height="60" />
										<div>
											<h6 class="fw-bold text-primary mb-1"><?php echo $kh["hoten"]   ?></h6>
											<p class="text-muted small mb-0">
												<?php echo $dg["ngaydanhgia"]   ?>
											</p>
										</div>
									</div>

									<p class="mt-3 mb-4 pb-2">
										<?php echo $dg["nhanxet"]   ?>
									</p>
								</div>


								<?php
								foreach ($traloidanhgia as $t) :

									if ($t["dg_id"] == $dg["id"]) {
								?>
										<!-- HIỂN THỊ TRẢ LỜI -->
										<div class="ms-5 ms-lg-10">
											<div id="kt_post_comment_96" data-kt-comment-id="96">
												<div class="rounded-3 w-100 p-7 p-lg-10 mb-10 mt-2">
													<div class="d-flex align-items-center mt-2 ml-2">
														<!--begin::Author-->
														<div class="symbol symbol-35px me-3" style="padding-left: 10px;">
															<img class="rounded-circle shadow-1-strong me-3" width="40px" height="40px" src="../fptshop/icon.png" alt="">
														</div>
														<!--end::Author-->

														<!--begin::Info-->
														<div class="d-flex flex-column">
															<!--begin::Username-->
															<span class="text-dark fw-bold fs-7 me-3 lh-1" style="padding-left: -10px;">
																ViettelStore
															</span>
															<!--end::Username-->

															<!--begin::Date-->
															<span class="text-gray-600 fw-semibold fs-8">
																<?php echo $t['ngaytl']; ?>
															</span>
															<!--end::Date-->
														</div>
														<!--end::Info-->
													</div>

													<div class="d-flex align-items-center mt-2 ml-2">
														<!--begin::Reply Content-->
														<div class="p-2">
															<p class="fw-normal fs-base text-gray-700 m-0" data-kt-element="comment-text">
																<?php echo $t['traloi']; ?>
															</p>
															<!-- Add any additional styling or elements for the reply content here -->
														</div>
														<!--end::Reply Content-->
													</div>

													<div data-kt-element="comment-edit"></div>
												</div>
												<div id="kt_post_comment_96_wrapper" data-parent-id="96">
													<div class="ps-5 ps-lg-10 2">
														<!-- replies for the comment -->
													</div>
												</div>
											</div>
										</div>
								<?php
									}
								endforeach;

								?>


					<?php
						}
					endforeach;
				endforeach;
					?>
<form method="post">
					<div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
						<div class="d-flex flex-start w-100">
							<div class="symbol symbol-35px me-3">
								<img class="rounded-circle shadow-1-strong me-3" width="60px" height="60px" src="../img/khachhang/<?php echo $_SESSION['khachhang']['hinhanh']; ?>" alt="">
							</div>
							
								<div data-mdb-input-init class="form-outline w-300">
									<textarea class="form-control" style="padding-right:440px" name="danhgia" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
									<!-- <label class="form-label" for="textAreaExample">Nội dung</label> -->
								</div>
						</div>
						<div class="float-end mt-2 pt-1">


							<input type="hidden" name="action" value="danhgia">
							<input type="hidden" name="id" value="<?php echo $mhct['id']; ?>">
							<input type="hidden" name="makh" value="<?php echo $_SESSION['khachhang']['id']; ?>">

							<input type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm"></input>

							<input type="reset" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-sm" value="Huỷ"></button></div>
							



						</div>

						</form>

					</div>


							</div>

			</div>
		</div>
	</div>
</section>
</div>
</div>
</div>



<?php include("inc/bottom.php"); ?>