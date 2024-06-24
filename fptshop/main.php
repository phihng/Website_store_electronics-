<?php include("inc/top.php"); ?>



            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
				<?php foreach ($giaodien as $gd):
					if($gd["id"]==4){?>
                <div class="carousel-item active">
                    <img src="../img/carousel/<?php echo $gd["hinhanh"]?>" alt="" class="d-block w-100">
                </div>
				<?php } endforeach; ?>
			</div>
			
                
            



</div>
<!-- Start Hero Section -->
<div style="background-color: #eff2f1 !important; " class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1 style="color: #787676;">YOUR WAY</h1>
					<p class="mb-4">
					<h4 style="color: #787676;">Thế giới công nghệ trong tầm tay.</h4>
					</p>
					<!-- <p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p> -->
				</div>
			</div>

			<div class="col-lg-6">
				<div class="hero-img-wrap">
					<img src="images/bannerapple.png" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Hero Section -->

<!-- Start Product Section -->
<div class="product-section">
	<div class="container">
		<div class="row">

			<!-- Start Column 1 -->
			<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
				<P></p>
				<h4 class="mb-4 section-title">Thoải mái tận hưởng.</h4>
				<p class="mb-4">Với những thiết kế mới, đường nét mạnh mẽ, màu sắc tinh tế, hãy chào đón năm 2024 với những tinh hoa của công nghệ mới... </p>
				<p><a href="index.php?action=shop" class="btn">Xem ngay</a></p>
			</div>
			<!-- End Column 1 -->

			<!-- Start Column 2 -->
			<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
				<a class="product-item" href="index.php?action=shop">
					<img src="images/ip15_1.png" class="img-fluid product-thumbnail">
					<h3 class="product-title">iPhone 15 Pro Max</h3>
					<strong class="product-price">36.000.000VNĐ</strong>

					<span class="icon-cross">
						<img src="images/cross.svg" class="img-fluid">
					</span>
				</a>
			</div>
			<!-- End Column 2 -->

			<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
				<a class="product-item" href="index.php?action=shop">
					<img src="images/1.png" class="img-fluid product-thumbnail">
					<h3 class="product-title">iPhone 14 Pro Max</h3>
					<strong class="product-price">33.000.000VNĐ</strong>

					<span class="icon-cross">
						<img src="images/cross.svg" class="img-fluid">
					</span>
				</a>
			</div>

		</div>
	</div>
</div>
<!-- End Product Section -->

<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-6">
				<h2 class="section-title"><i>IPHONE 15 PRO MAX CÓ GÌ MỚI?</i></h2>
				<p>iPhone 15 Pro Max - Sự kết hợp hoàn hảo giữa màn hình siêu sắc nét, camera vượt trội và hiệu suất mạnh mẽ, đem đến trải nghiệm công nghệ tuyệt vời cho người dùng.</p>

				<div class="row my-5">
					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/truck.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Thiết kế mới với viền Titanium</h3>
							<p>Thiết kế nổi bật với viền làm bằng Titanium cạnh vuông được vát tròn, sử dụng Grade 5 Titanium mang đến cái nhìn bóng loáng, sang trọng và cao cấp.</p>
						</div>
					</div>

					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/bag.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Camera tiềm vọng lên đến 5x</h3>
							<p>Tăng gấp đôi khả năng thu phóng quang học của thiết bị, nhờ đó, người dùng có thể chụp những vật ở khoảng cách xa hơn mà vẫn sắc nét.</p>
						</div>
					</div>

					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/support.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Màn hình tràn viền mỏng nhất thế giới</h3>
							<p>Màn hình của iPhone 15 Pro Max có kích thước lớn 6.7 inch và đặc biệt với tính năng ProMotion 120Hz, mang đến trải nghiệm mượt mà và đáng kinh ngạc.</p>
						</div>
					</div>

					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/return.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Xuất hiện phím vật lý mới</h3>
							<p>Loại bỏ hoàn toàn các nút âm lượng và im lặng vật lý truyền thống, thay vào đó sử dụng tính năng tiên tiến là Action Button.</p>
						</div>
					</div>

				</div>
			</div>

			<div class="col-lg-5">
				<a class="product-item" href="index.php?action=shop">
					<img src="images/iphone15.png" class="img-fluid product-thumbnail">
					<span class="icon-cross">
						<img src="images/cross.svg" class="img-fluid">
					</span>
				</a>
			</div>

		</div>
	</div>
</div>
<!-- End Why Choose Us Section -->
<div class="popular-product">
	<div class="container">
		<div class="row">

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img style="height: 100px; width: 70px;" src="images/ip15pink.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>iPhone 15 Plus</h3>
						<p>Sắc hồng tô điểm</p>
						<p><a href="index.php?action=shop">Xem thêm</a></p>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img style="height: 100px; width: 70px;" src="images/ip15blue.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>iPhone 15 Plus</h3>
						<p>Làn gió biển tươi mát </p>
						<p><a href="index.php?action=shop">Xem thêm</a></p>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img style="height: 100px; width: 70px;" src="images/ip15yellow.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>iPhone 15 Plus</h3>
						<p>Hơi thở sự sống </p>
						<p><a href="index.php?action=shop">Xem thêm</a></p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- banner -->

<div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
    
				<?php foreach ($giaodien as $gd):
					if($gd["id"]==5){?>
                <div class="carousel-item active">
                    <img src="../img/carousel/<?php echo $gd["hinhanh"]?>" alt="" class="d-block w-100">
                </div>
				<?php } endforeach; ?>
                
                
                <?php foreach ($giaodien as $gd):
					if($gd["id"]==6){?>
                <div class="carousel-item">
                    <img src="../img/carousel/<?php echo $gd["hinhanh"]?>" alt="" class="d-block w-100">
                </div>
				<?php } endforeach; ?>
			

            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>


<!-- Start We Help Section -->
<div class="we-help-section">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-7 mb-5 mb-lg-0">
				<div class="imgs-grid">
					<div class="grid grid-1"><img src="images/samsungbanner1.png" alt="Untree.co"></div>
					<div class="grid grid-2"><img src="images/samsungbanner3.jpeg" alt="Untree.co"></div>
					<div class="grid grid-3"><img src="images/samsungbanner.png" alt="Untree.co"></div>

				</div>
			</div>
			<div class="col-lg-5 ps-lg-5">
				<h2 class="section-title mb-4">“IMAGINE” </h2>
				<p>Hãy tưởng tượng những điều tuyệt vời mà chúng ta có thể thực hiện cùng với những gương mắt mới của Samsung</p>

				<ul class="list-unstyled custom-list my-4">
					<li>Flex window cùng Samsung GALAXY Z Flip5</li>
					<li>Tinh tế, trang nhã như Samsung GALAXY S24 Ultra</li>
					<li>Camera sắc nét, bắt trọn từng khoảng khắc</li>
					<li>Ngày mới sôi động cùng đa nhiệm Samsung</li>
				</ul>
				<p><a href="index.php?action=shop" class="btn">Xem ngay</a></p>

			</div>
		</div>
	</div>
</div>
<!-- End We Help Section -->



<!-- Start Testimonial Slider -->
<div class="testimonial-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 mx-auto text-center">
				<h2 class="section-title"><strong>SẢN PHẨM ĐẶC SẮC</strong></h2>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="testimonial-slider-wrap text-center">

					<div id="testimonial-nav">
						<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
						<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
					</div>

					<div class="testimonial-slider">

						<div class="item">
							<div class="row justify-content-center">
								<div class="col-lg-8 mx-auto">

									<div class="testimonial-block text-center">
										<blockquote class="mb-5">
											<p>&ldquo;Sở hữu ngay một bờ biển xanh biếc cùng sắc trong bầu trời trên mặt lưng điện thoại, cùng với những ánh sáng kim sa tựa như bọt biển trên đầu những ngọn sóng.&rdquo;</p>
										</blockquote>

										<div class="author-info">
											<div class="thumbnail">
												<img src="images/oppo11f1.png" alt="Image" class="img-fluid">
											</div>
											<h3 class="font-weight-bold">OPPO</h3>
											<span class="position d-block mb-3">OPPO Reno11 5G.</span>
										</div>
									</div>
								</div>
							</div>

							<p><a href="index.php?action=shop" class="btn">Xem ngay</a></p>

						</div>
						<!-- END item -->

						<div class="item">
							<div class="row justify-content-center">
								<div class="col-lg-8 mx-auto">

									<div class="testimonial-block text-center">
										<blockquote class="mb-5">
											<p>&ldquo;iPhone 14 - một bước tiến đáng chú ý trong công nghệ di động, mang đến nhiều cải tiến và tính năng đáng kinh ngạc..&rdquo;</p>
										</blockquote>
										<div class="author-info">
											<div class="thumbnail">
												<img src="images/ip14banner.png" alt="Image" class="img-fluid">
											</div>
											<h3 class="font-weight-bold">iPHONE</h3>
											<span class="position d-block mb-3">iPhone 14 Pro Max.</span>
										</div>
									</div>
								</div>
							</div>

							<p><a href="index.php?action=shop" class="btn">Xem ngay</a></p>

						</div>
						<!-- END item -->

					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Start Blog Section -->
<div class="blog-section">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md-6">
				<h2 class="section-title">Tin tức khuyến mãi</h2>
			</div>

		</div>

		<div class="row">

			<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
				<div class="post-entry">
					<a href="https://fptshop.com.vn/tin-tuc/tin-khuyen-mai/dong-hanh-cung-si-tu-188343" class="post-thumbnail"><img src="images/post2.1.jpg" alt="Image" class="img-fluid"></a>
					<div class="post-content-entry">
						<h3><a href="https://fptshop.com.vn/tin-tuc/tin-khuyen-mai/dong-hanh-cung-si-tu-188343">Đồng Hành Cùng Sĩ Tử: FPT Shop tặng voucher đến 2 triệu đồng</a></h3>
						<div class="meta">
							<span> <a>2 ngày trước</a></span></a></span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
				<div class="post-entry">
					<a href="https://fptshop.com.vn/tin-tuc/tin-khuyen-mai/sieu-qua-game-thu-fpt-shop-tang-ngay-balo-gaming-cao-cap-va-chuot-choi-game-188312" class="post-thumbnail"><img src="images/post3.1.jpg" alt="Image" class="img-fluid"></a>
					<div class="post-content-entry">
						<h3><a href="https://fptshop.com.vn/tin-tuc/tin-khuyen-mai/sieu-qua-game-thu-fpt-shop-tang-ngay-balo-gaming-cao-cap-va-chuot-choi-game-188312">SIÊU QUÀ GAME THỦ: FPT Shop tặng ngay balo Gaming cao cấp và chuột chơi game</a></h3>
						<div class="meta">
							<span> <a>3 ngày trước</a></span></a></span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
				<div class="post-entry">
					<a href="https://fptshop.com.vn/tin-tuc/tin-khuyen-mai/me-smart-watch-san-deal-chop-nhoang-cung-fpt-shop-183181" class="post-thumbnail"><img src="images/post1.1.jpg" alt="Image" class="img-fluid"></a>
					<div class="post-content-entry">
						<h3><a href="https://fptshop.com.vn/tin-tuc/tin-khuyen-mai/me-smart-watch-san-deal-chop-nhoang-cung-fpt-shop-183181">Mê Smart Watch – Săn deal chớp nhoáng cùng FPT Shop, Đồng hồ thông minh giá chỉ từ 690.000 đồng</a></h3>
						<div class="meta">
							<span> <a>2 tháng trước</a></span></a></span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">

			</div>
			<div class="col-md-6 text-start text-md-end">
				<a href="https://fptshop.com.vn/tin-tuc/Tin-khuyen-mai" class="more"><i>Xem tất cả ></i></a>
			</div>
		</div>
	</div>
</div>
<!-- End Blog Section -->


<?php include("inc/bottom.php"); ?>