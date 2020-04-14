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
						<li class="nav-item active"><a class="nav-link" href="">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo base_url('About') ?> ">About</a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Berita') ?> ">Berita</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					</br></br></br><?php echo ((isset($locations))? $locations : ''); ?>
				</div>
				<div class="col-lg-12">
					<div class="heading-title text-center">
						</br></br><h2>Special Menu</h2>
						<!-- <p>Belajarlah dari zombie, walaupun dia makan orang tapi dia gak pernah makan temen.</p> -->
					</div>
				</div>
			</div>

			<?php echo ((isset($accordions))? $accordions : ''); ?>
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
		
	<script>
    $(document).ready(function(){
      // Add minus icon for collapse element which is open by default
      $(".collapse.show").each(function(){
      	$(this).prev(".card-header").find(".fas").addClass("fa-chevron-down").removeClass("fa-chevron-right");
      });
      
      // Toggle plus minus icon on show hide of collapse element
      $(".collapse").on('show.bs.collapse', function(){
      	$(this).prev(".card-header").find(".fas").removeClass("fa-chevron-right").addClass("fa-chevron-down");
      }).on('hide.bs.collapse', function(){
      	$(this).prev(".card-header").find(".fas").removeClass("fa-chevron-down").addClass("fa-chevron-right");
      });
    });

		function tokoOnClick(idToko) {
			if(idToko != 0){
				//semua
				document.getElementById('allMenu').setAttribute('data-filter', '.toko' + idToko);
				document.getElementById('allMenu').className = 'active';

				//makanan
				document.getElementById('dishes').setAttribute('data-filter', '.dishes.toko' + idToko);
				document.getElementById('dishes').className = '';

				//minuman
				document.getElementById('beverages').setAttribute('data-filter', '.beverages.toko' + idToko);
				document.getElementById('beverages').className = '';
			}else{
				//semua
				document.getElementById('allMenu').setAttribute('data-filter', '*');
				document.getElementById('allMenu').className = 'active';

				//makanan
				document.getElementById('dishes').setAttribute('data-filter', '.dishes');
				document.getElementById('dishes').className = '';

				//minuman
				document.getElementById('beverages').setAttribute('data-filter', '.beverages');
				document.getElementById('beverages').className = '';
			}
		}
	</script>
</body>
</html>