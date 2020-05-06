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
						<li class="nav-item mx-1"><a class="nav-link" href="<?php echo base_url('Home') ?> ">Home</a></li>
						<li class="nav-item mx-1 active"><a class="nav-link" href="">Menu</a></li>
						<li class="nav-item mx-1"><a class="nav-link" href="<?php echo base_url('About') ?> ">About</a></li>
						<li class="nav-item mx-1"><a class="nav-link" href="<?php echo base_url('Berita') ?> ">Berita</a></li>
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
				<div class="col-lg-4 col-md-6">
					<h3>About Us</h3>
					<p><?php echo $settings['shop_history'] ?></p>
				</div>
				<div class="col-lg-4 col-md-6">
					<h3>Opening hours</h3>
					<p><?php echo $settings['opening_hours'] ?></p>
				</div>
				<div class="col-lg-4 col-md-6">
					<h3>Contact information</h3>
					<p><a href="tel:<?php echo $settings['phone_number'] ?>"><i class="fa fa-phone mr-2"></i><?php echo $settings['phone_number'] ?></a></p>
					<p><a href="mailto:<?php echo $settings['email'] ?>"><i class="fa fa-envelope mr-2"></i><?php echo $settings['email'] ?></a></p>
					<p><a href="<?php echo $settings['facebook_link'] ?>" target="_blank"><i class="fa fa-facebook mr-3" aria-hidden="true"></i><?php echo $settings['title'] ?></a></p>
					<p><a href="<?php echo $settings['instagram_link'] ?>" target="_blank"><i class="fa fa-instagram mr-1" aria-hidden="true"></i> <?php echo $settings['instagram_username'] ?></a></p>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">Copyright &copy; 2020 <a href="#"><?php echo $settings['title'] ?>.</a> v06052020</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- Modal Ulasan Menu -->
	<div class="modal fade" id="ulasMenuModal" tabindex="-1" role="dialog" aria-labelledby="ulasMenuModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 id="ulasMenuModalTitle" class="modal-title pb-0" >Tulis ulasan menu</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="POST">
					<div class="modal-body">
						<div class="row">
							<input type="text" id="id_menu_toko" name="id_menu_toko" hidden required="">

							<div class="col-md-12 mb-3">
								<label for="nama_pengulas_menu">Nama Lengkap</label>
								<input type="text" class="form-control rounded" id="nama_pengulas_menu" name="nama_pengulas_menu" placeholder="cth. Muhammad Muttaqin" value="" minlength="3" maxlength="32" required="">
								<div class="invalid-feedback">
									Nama lengkap tidak boleh kosong.
								</div>
							</div>
							<div class="col-md-12 mb-3">
								<label for="no_telepon_pengulas_menu">No. HP</label>
								<input type="text" class="form-control rounded" id="no_telepon_pengulas_menu" name="no_telepon_pengulas_menu" placeholder="cth. 081288701234" value="" minlength="10" maxlength="16" pattern="[+]{0,1}[0-9]{10,16}" required="">
								<div class="invalid-feedback">
									No. HP tidak boleh kosong.
								</div>
							</div>
							<div class="col-md-12 mb-3">
								<label for="isi_ulasan_menu">Ulasan</label>
								<textarea type="text" class="form-control rounded" id="isi_ulasan_menu" name="isi_ulasan_menu" placeholder="cth. Pelayanan baik, tempatnya cozy, buburnya enak sekali pas di kantong" rows="3" minlength="3" maxlength="64" required=""></textarea>
								<div class="invalid-feedback">
									Ulasan tidak boleh kosong.
								</div>
							</div>
							<div class="col-md-12 mb-3">
								<label for="rating_menu">Beri Rating untuk Kami</label>
									<div id="rating_menu" class="btn-group btn-group-toggle starrating risingstar d-flex justify-content-end flex-row-reverse col-6 p-0" data-toggle="buttons">
									<label id="menu_s5" class="btn btn-link p-0 cursor-hand" onmouseout="starLeave('menu_s')" onmouseover="starHover(this.id, 'menu_s')" onclick="rate(this.id, 'menu_s')" title="Sangat Bagus"><input type="radio" id="menu_star5" name="rating_menu" value="5" required/> </label>
									<label id="menu_s4" class="btn btn-link p-0 cursor-hand" onmouseout="starLeave('menu_s')" onmouseover="starHover(this.id, 'menu_s')" onclick="rate(this.id, 'menu_s')" title="Bagus"><input type="radio" id="menu_star4" name="rating_menu" value="4" required/> </label>
									<label id="menu_s3" class="btn btn-link p-0 cursor-hand" onmouseout="starLeave('menu_s')" onmouseover="starHover(this.id, 'menu_s')" onclick="rate(this.id, 'menu_s')" title="Biasa Saja"><input type="radio" id="menu_star3" name="rating_menu" value="3" required/> </label>
									<label id="menu_s2" class="btn btn-link p-0 cursor-hand" onmouseout="starLeave('menu_s')" onmouseover="starHover(this.id, 'menu_s')" onclick="rate(this.id, 'menu_s')" title="Buruk"><input type="radio" id="menu_star2" name="rating_menu" value="2" required/> </label>
									<label id="menu_s1" class="btn btn-link p-0 cursor-hand" onmouseout="starLeave('menu_s')" onmouseover="starHover(this.id, 'menu_s')" onclick="rate(this.id, 'menu_s')" title="Sangat Buruk"><input type="radio" id="menu_star1" name="rating_menu" value="1" required/> </label>
								</div>
								<div class="invalid-feedback">
									Rating tidak boleh kosong.
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" name="tambahUlasanMenu" value="Kirim"/>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- End of Modal Ulasan Menu -->

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

	<?php echo ((isset($messageModal))? $messageModal : ''); ?>
		
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

		checkedRatingId = 0;

		function rate(id, prefixId) {
			star = id.slice(-1);
			checkedRatingId = star;

			for(i=1; i<=5; i++) {
				var id = prefixId + i;

				if(i <= star) {
					document.getElementById(prefixId + i).setAttribute('class', 'btn btn-link p-0 cursor-hand text-primary')
				}else{
					document.getElementById(prefixId + i).setAttribute('class', 'btn btn-link p-0 cursor-hand')
				}
			}
		}

		function starHover(id, prefixId) {
			star = id.slice(-1);

			for(i=1; i<=5; i++) {
				var id = prefixId + i;

				if(i <= star) {
					document.getElementById(prefixId + i).setAttribute('class', 'btn btn-link p-0 cursor-hand text-primary')
				}else{
					document.getElementById(prefixId + i).setAttribute('class', 'btn btn-link p-0 cursor-hand')
				}
			}
		}

		function starLeave(prefixId) {
			var id = prefixId + checkedRatingId;
			rate(prefixId + checkedRatingId, prefixId);
		}

		document.getElementById('no_telepon_pengulas_menu').onkeypress = function() {
			return (event.charCode >= 48 && event.charCode <= 57);
		} 		

		$('#ulasMenuModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var idMenu = button.data('id-menu')
        var namaMenu = button.data('nama-menu');

        var modal = $(this)

        document.getElementById('id_menu_toko').value = idMenu;
        document.getElementById('ulasMenuModalTitle').innerHTML = 'Tulis ulasan tentang ' + namaMenu;
    });
	</script>
</body>
</html>