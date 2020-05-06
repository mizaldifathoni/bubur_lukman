<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
     <!-- Site Metas -->
    <title>Berita - <?php echo $settings['title'] ?></title>  
    <meta name="author" content="<?php echo $settings['meta_author'] ?>">
    <meta name="description" content="<?php echo $settings['meta_description'] ?>">
    <meta name="keywords" content="<?php echo $settings['meta_keywords'] ?>">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?php echo base_url() . $settings['favicon'] ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo base_url() . $settings['favicon_apple'] ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_yamifood') ?>/css/bootstrap.min.css">    
    <!-- Site CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_yamifood') ?>/css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_yamifood') ?>/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_yamifood') ?>/css/custom.css">
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet"> 
    <!-- Responsive styles for this template -->
    <link href="<?php echo base_url('assets/assets_yamifood/assets_berita') ?>/css/responsive.css" rel="stylesheet">
    <!-- Colors for this template -->
    <link href="<?php echo base_url('assets/assets_yamifood/assets_berita') ?>/css/colors.css" rel="stylesheet">
    

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
                        <li class="nav-item mx-1"><a class="nav-link" href="<?php echo base_url('Menu') ?>">Menu</a></li>
                        <li class="nav-item mx-1"><a class="nav-link" href="<?php echo base_url('About') ?> ">About</a></li>
                        <li class="nav-item mx-1 active"><a class="nav-link" href="<?php echo base_url('Berita') ?>">Berita</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->


        <br><br><br><section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading-title text-center">
                            </br></br></br><h2>Berita</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-list clearfix">
                                
                                <?php echo $posts ?>

                                
                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

    <!-- Start Contact info -->
    <br><br><div class="contact-imfo-box">
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
        
    </div><!-- end wrapper -->

    <!-- Post detail modal -->
    <div class="modal fade" id="viewPostModal" tabindex="-1" role="dialog" aria-labelledby="viewPostModal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-white p-0 mb-4">
              <img id="view_foto_posting" src="http://localhost/bubur_lukman/assets/picture/posts/Lebaran_Ya_Balapan_5eb1127ba6c41.jpg" alt="Lebaran Ya Balapan" class="img-fluid">
              <button type="button" class="close top-right pr-4" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pxm-5">
              <h2 id="view_judul_posting" class="mb-3"><span class="badge badge-success mr-2">Promo</span> Judul</h2>
              <p>
                <h4 id="view_isi_posting" class="text-content">
              ...
                </h4>
              </p>
            </div>
            <div class="modal-footer d-flex justify-content-between pxm-5">
              <small id="view_tanggal_posting" class="text-muted">...</small>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
      </div>
    </div>

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

    <script src="assets/assets_yamifood/assets_berita/js/jquery.min.js"></script>
    <script src="assets/assets_yamifood/assets_berita/js/tether.min.js"></script>
    <script src="assets/assets_yamifood/assets_berita/js/bootstrap.min.js"></script>
    <script src="assets/assets_yamifood/assets_berita/js/custom.js"></script>

    <script>
      $('#viewPostModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var idPosting = button.data('id-posting');

        document.getElementById('view_foto_posting').src = document.getElementById('foto_posting_' + idPosting).src;
        document.getElementById('view_judul_posting').innerHTML = document.getElementById('judul_posting_' + idPosting).innerHTML;
        document.getElementById('view_isi_posting').innerHTML = document.getElementById('isi_posting_' + idPosting).innerHTML;
        document.getElementById('view_tanggal_posting').innerHTML = 'Diposting pada ' + document.getElementById('tanggal_posting_' + idPosting).innerHTML;
      });
    </script>

  </body>
</html>