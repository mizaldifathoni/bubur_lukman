<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title><?php echo $settings['title'] ?></title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_yamifood') ?>/css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_yamifood') ?>/css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_yamifood') ?>/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_yamifood') ?>/css/custom.css">

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="<?php echo base_url() . $settings['logo_path'] ?>" width="60px" height="60px" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="<?php echo base_url('Home') ?> ">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Menu') ?>">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo base_url('About') ?> ">About</a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Berita') ?>">Berita</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-center">
				<img src="assets/assets_yamifood/images/ayam.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong><?php echo $settings['welcome_message'] ?></strong></h1>
							<p class="m-b-40"><?php echo $settings['welcome_message_description'] ?></p>
							<a class="btn btn-light mt-3" href="#special_menu">Lihat Promo</a>
						</div>
					</div>
				</div>
			</li>
			<li class="text-center">
				<img src="assets/assets_yamifood/images/hitam.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong><?php echo $settings['welcome_message'] ?></strong></h1>
							<p class="m-b-40"><?php echo $settings['welcome_message_description'] ?></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-center">
				<img src="assets/assets_yamifood/images/hijau.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong><?php echo $settings['welcome_message'] ?></strong></h1>
							<p class="m-b-40"><?php echo $settings['welcome_message_description'] ?></p>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->
	
	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="<?php echo base_url() . $settings['shop_photo_path'] ?>" alt="" class="img-thumbnail" width="1000px" height="1000px">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						<h1><?php echo $settings['title'] ?></h1>
						<p><?php echo $settings['shop_history'] ?></p>
						<h4>Saat ini Bubur Lukman memiliki 3 outlet, yang terletak di : </h4>
						<ul>
							<li>Jl. Pulau Legundi No.202, Sukarame, Kota Bandar Lampung</li>
							<li>Jl. Al Hikmah, Sukabumi Indah, Sukabumi, Kota Bandar Lampung</li>
							<li>Jl. Pulau Singkep, Sukarame, Kota Bandar Lampung</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->
	
	<!-- Start Menu -->
	<div class="menu-box" id="special_menu">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Special Menu</h2>
						<p>Belajarlah dari zombie, walaupun dia makan orang tapi dia gak pernah makan temen.</p>
					</div>
				</div>
			</div>
			<?php echo ((isset($menus))? $menus : ''); ?>
			<div class="row">
				<div class="col-lg-12">
					<center><h2><a href="<?php echo base_url('menu') ?>">LIHAT SELENGKAPNYA</a></h2></center>
				</div>
			</div> 
			<!-- <div class="row">
				<div class="col-lg-12">
					<div class="special-menu text-center">
						<div class="button-group filter-button-group">
							<button class="active" data-filter="*">Semua</button>
							<button data-filter=".drinks">Minuman</button>
							<button data-filter=".lunch">Makanan</button>
						</div>
					</div>
				</div>
			</div>
				
			<div class="row special-list">
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="assets/assets_yamifood/images/img-01.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Teh Manis</h4>
							<p>Bikin teh itu sama seperti buat janji, jangan terlalu MANIS.</p>
							<h5> Rp 5000,-</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="assets/assets_yamifood/images/img-02.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Jus</h4>
							<p>Jus apa yang paling gak enak ? Jus a friend.</p>
							<h5> Rp 8.000,-</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="assets/assets_yamifood/images/kopi.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Kopi</h4>
							<p>Kopi apa yang paling pahit ? Kopilih dia daripada aku :(.</p>
							<h5> Rp 5.000,-</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="assets/assets_yamifood/images/buburayam1.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Bubur Ayam</h4>
							<p>Ketika nasi sudah menjadi bubur, tinggal tambahkan ayam, telur, kecap dan kerupuk.</p>
							<h5> Rp 10.000,-</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="assets/assets_yamifood/images/buburkacangijo1.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Bubur Kacang Hijau</h4>
							<p>Awali pagimu dengan bubur kacang hijau karena kalau diawali dengan senyuman, jam 9 sudah lapar .</p>
							<h5> Rp 8.000,-</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="assets/assets_yamifood/images/buburketanhitam.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Bubur Ketan Hitam</h4>
							<p>Makan Bubur .</p>
							<h5> Rp 8.000,-</h5>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="assets/assets_yamifood/images/campur.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Bubur Campur</h4>
							<p>Makan Bubur .</p>
							<h5> Rp 8.000,-</h5>
						</div>
					</div>
				</div> -->
				
				
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- End Menu -->
	
	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Gallery</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="assets/assets_yamifood/images/buburayam.jpg">
							<img class="img-fluid" src="assets/assets_yamifood/images/buburayam.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="assets/assets_yamifood/images/buburkacangijo.jpg">
							<img class="img-fluid" src="assets/assets_yamifood/images/buburkacangijo.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="assets/assets_yamifood/images/buburr.jpg">
							<img class="img-fluid" src="assets/assets_yamifood/images/buburr.jpg" alt="Gallery Images">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->

	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							<?php echo $settings['phone_number'] ?>
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							<?php echo $settings['email'] ?>
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							<?php echo $settings['location'] ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p><?php echo $settings['shop_history'] ?></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><?php echo $settings['opening_hours'] ?></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead"><a href="tel:<?php echo $settings['phone_number'] ?>"><i class="fa fa-phone mr-2"></i><?php echo $settings['phone_number'] ?></a></p>
					<p><a href="mailto:<?php echo $settings['email'] ?>"><i class="fa fa-envelope mr-2"></i><?php echo $settings['email'] ?></a></p>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="<?php echo $settings['facebook_link'] ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="<?php echo $settings['instagram_link'] ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; <a href="#"><?php echo $settings['title'] ?>.</a> v07032020</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="<?php echo base_url('assets/assets_yamifood') ?>/js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url('assets/assets_yamifood') ?>/js/popper.min.js"></script>
	<script src="<?php echo base_url('assets/assets_yamifood') ?>/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="<?php echo base_url('assets/assets_yamifood') ?>/js/jquery.superslides.min.js"></script>
	<script src="<?php echo base_url('assets/assets_yamifood') ?>/js/images-loded.min.js"></script>
	<script src="<?php echo base_url('assets/assets_yamifood') ?>/js/isotope.min.js"></script>
	<script src="<?php echo base_url('assets/assets_yamifood') ?>/js/baguetteBox.min.js"></script>
	<script src="<?php echo base_url('assets/assets_yamifood') ?>/js/form-validator.min.js"></script>
    <script src="<?php echo base_url('assets/assets_yamifood') ?>/js/contact-form-script.js"></script>
    <script src="<?php echo base_url('assets/assets_yamifood') ?>/js/custom.js"></script>
</body>
</html>