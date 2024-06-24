<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="icon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Bootstrap CSS -->
	<link href="./assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="./assets/css/tiny-slider.css" rel="stylesheet">
	<link href="./assets/css/style.css" rel="stylesheet">
	<link href="./assets/css/css1.css" rel="stylesheet">

	<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
	<df-messenger intent="WELCOME" chat-title="Fptshop" agent-id="7060fa76-9620-454d-8441-505d210f2dba" language-code="vi"></df-messenger>

	<title>Fptshop</title>
</head>

<body>



	<!-- custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark -->
	<!-- Start Header/Navigation -->
	<nav style="background-color: #EE0033 !important;" class=" top-nav navbar navbar-expand-md navbar-dark shadow" arial-label="Furni navigation bar">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse " id="navbarsFurni">
			<ul class="navbar-nav me-auto ms-auto mb-2 mb-md-0">
				<a href="index.php?action=home" class="navbar-brand">
				<img class="mx-auto d-block" src="images/LogoFPT.png" width="70" height="60" style="margin-top: -15px;">
				</a>

				<li class="nav-item active">
					<a class="nav-link" href="index.php?action=home" style="color: white;">Trang Chủ</a>
				</li>

				<li><a class="nav-link" href="index.php?action=shop" style="color: white;">Cửa Hàng</a></li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">Danh mục</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="color: black importaint!;">
						<?php foreach ($danhmuc as $d) :
						?>
							<li><a class="dropdown-item" href="?action=group&id=<?php echo $d["id"]; ?>">
									<?php echo $d["tentbdt"]; ?></a></li>

						<?php endforeach; ?>
					</ul>
				</li>

				<li><a class="nav-link" href="index.php?action=about" style="color: white;">Về Chúng Tôi</a></li>
				<li><a class="nav-link" href="index.php?action=contact" style="color: white;">Liên Hệ</a></li>
				<li><a class="nav-link" href="index.php?action=baohanh" style="color: white;">Bảo hành</a></li>

				<form class="d-flex" method="post" action="index.php?action=search">
					<div class="input-group">
						<input type="text" class="form-control " placeholder="Bạn cần tìm gì?" name="txtsearch">
						<!-- <input type="submit" class="form-control bg-info btn btn-outline-light" name="timkiem" value="tìm kiếm"> -->
						<button style="background-color: white !important; width:15px ;" type="submit" class=" form-control btn-outline-light" name="timkiem"><i class="bi-search"></i></button>
					</div>
				</form>

				<li class="d-flex">
					<?php
					if (isset($_SESSION["khachhang"])) { ?>
						<a class="nav-link" href="index.php?action=dangnhap"><img src="images/user.svg"></a>
						<a href="index.php?action=hoso&id=<?php echo $_SESSION["khachhang"]["id"]; ?>" class="text-decoration-none text- btn" style="color: white; background-color:#EE0033; border-color:#EE0033;"> <?php echo $_SESSION["khachhang"]["hoten"] ?> &nbsp; <img style=" border-radius: 50%; width:30px; height:30px;" src="../img/khachhang/<?php echo $_SESSION["khachhang"]["hinhanh"] ?>" alt=""> </a>&nbsp;
						<a href="index.php?action=dangxuat" class="btn btn-outline-light" style="color: white; background-color:#EE0033; border-color:#EE0033; padding-left:10px"><i class="bi bi-box-arrow-left"></i></a>&nbsp;
					<?php } else { ?>
						<a class="nav-link" href="index.php?action=dangnhap"><img src="images/user.svg"></a>

					<?php } ?>



				</li>
				<li><a class="nav-link" href="index.php?action=cart"><img src="images/cart.svg"></a></li>

			</ul>
		</div>
	</nav>
	<nav style="background-color: #EFF2F1 !important;" class=" bottom-nav navbar navbar-expand-md " arial-label="Furni navigation bar">
		<div class="collapse navbar-collapse justify-content-center" id="navbarsFurni">
			<ul class="custom-navbar-nav navbar-nav  mb-2 mb-md-1">
			<?php foreach ($hang as $h) : ?>
							<ul><a style="text-decoration: none;" href="?action=group&id_hang=<?php echo $h["id"]; ?>">
									<?php echo $h["tenhang"]; ?></a></ul>
						<?php endforeach; ?></a>
				
		</div>
		</ul>

		</div>

		</div>

	</nav>