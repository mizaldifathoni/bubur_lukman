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
				<a class="navbar-brand" href="<?php echo base_url('Home') ?>">
					<img src="<?php echo base_url() . $settings['logo_path'] ?>" width="60px" height="60px" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Home') ?> ">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Menu') ?>">Menu</a></li>
						<li class="nav-item active"><a class="nav-link" href="<?php echo base_url('About') ?> ">About</a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Berita') ?>">Berita</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					</br></br></br><img src="<?php echo base_url() . $settings['shop_photo_path'] ?>" alt="" class="img-thumbnail" width="1000px" height="1000px">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						</br></br></br><h1><?php echo $settings['title'] ?></h1>
						<h2>Tentang Kami</h2>
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
						<p class="company-name">All Rights Reserved. &copy; <a href="#"><?php echo $settings['title'] ?>.</a> v07032020</p>
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