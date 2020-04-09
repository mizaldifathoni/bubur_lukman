
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Site Metas -->
    <title><?php echo $settings['title'] ?> - Pengaturan</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_yamifood') ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_yamifood') ?>/css/dashboard.css">     
	<!-- Site CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_yamifood') ?>/css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_yamifood') ?>/css/responsive.css">
    <!-- FontAwesome CSS -->
    <link href="<?php echo base_url('assets/fontawesome') ?>/css/all.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_yamifood') ?>/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_yamifood') ?>/css/custom-dashboard.css">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark p-0">
      <div id="navbar_container" class="container-fluid flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><?php echo $settings['title'] ?></a>
        <button type="button" id="menu-toggle" class="btn btn-link float-left"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <form action="" method="POST">
              <button type="submit" class="btn btn-link nav-link" href="#" name="inputLogout">Log out</button>
            </form>
          </li>
        </ul>
      </div>
    </nav>
    

    <div id="wrapper" class="container-fluid">
      <div class="row">
        <nav id="sidebar-wrapper" class="col-md-2 d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="home">
                  <span data-feather="bar-chart-2"></span>
                  Ikhtisar
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="post">
                  <span data-feather="file"></span>
                  Posting
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop">
                  <span data-feather="home"></span>
                  Toko/Cabang
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu">
                  <span data-feather="shopping-cart"></span>
                  Menu Restoran
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ulasan">
                  <span data-feather="users"></span>
                  Ulasan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="settings">
                  <span data-feather="settings"></span>
                  Pengaturan <span class="sr-only">(current)</span>
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 pb-4 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Pengaturan</h1>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="card">
              <a class="card-header p-0" href="#" id="headingOne" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapseOne">
                <h2 class="mb-0 p-0">
                  <button class="btn btn-link btn-lg" type="button">
                    <i id="accordion1" class="fas fa-chevron-right mr-1 accordion-icon"></i> Pengaturan Dasar
                  </button>
                </h2>
              </a>

              <div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body pb-0">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row mb-3">
                          <div class="col-xl-3 d-flex align-items-center justify-content-start">
                            <label class="">Judul</label>
                          </div>
                          <div class="col-xl-9">
                            <input type="text" class="form-control rounded" id="judul_web" name="judul_web" placeholder="cth. Bubur Lukman" value="<?php echo $settings['title'] ?>" minlength="3" maxlength="32" required="">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-xl-3 d-flex align-items-center justify-content-start">
                            <label class="">Sejarah Toko</label>
                          </div>
                          <div class="col-xl-9">
                            <textarea class="form-control rounded" id="sejarah_toko" name="sejarah_toko" placeholder="cth. Bubur Lukman adalah salah satu pengracik bubur terbaik di Lampung" rows="4" required=""><?php echo $settings['shop_history'] ?></textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-xl-3 d-flex align-items-center justify-content-start">
                            <label class="">Logo</label>
                          </div>
                          <div class="col-xl-9">
                            <div class="input-group d-flex justify-contents-center align-items-center">
                              <input type="file" id="logo" name="logo" accept="image/*" onchange="readURL(this, 'logoPreview', 'logoUploadButton', 'logoIndicator');" style="display: none">
                              <label type="button" id="logoUploadButton" class="btn btn-light mr-4" for="logo">Pilih Foto Lain...</label>
                              <span id="logoIndicator" style="display: none">Tidak ada foto yang dipilih.</span>
                              <img id="logoPreview" src="<?php echo base_url() . $settings['logo_path'] ?>" style="max-width: 100%; max-height: 200px; width: auto; height: auto;" onerror="this.style.display = 'none'"/>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-xl-3 d-flex align-items-center justify-content-start">
                            <label class="">Foto Toko</label>
                          </div>
                          <div class="col-xl-9">
                            <div class="input-group d-flex justify-contents-center align-items-center">
                              <input type="file" id="foto_toko" name="foto_toko" accept="image/*" onchange="readURL(this, 'fotoTokoPreview', 'fotoTokoUploadButton', 'fotoTokoIndicator');" style="display: none">
                              <label type="button" id="fotoTokoUploadButton" class="btn btn-light mr-4" for="foto_toko">Pilih Foto Lain...</label>
                              <span id="fotoTokoIndicator" style="display: none">Tidak ada foto yang dipilih.</span>
                              <img id="fotoTokoPreview" src="<?php echo base_url() . $settings['shop_photo_path'] ?>" style="max-width: 100%; max-height: 200px; width: auto; height: auto;" onerror="this.style.display = 'none'"/>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-xl-12 d-flex align-items-center justify-content-end">
                            <button class="btn btn-primary" type="submit" name="updateBaseSettings" id="updateBaseSettings">Simpan</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form> 
                </div>
              </div>
            </div>

            <div class="card">
              <a class="card-header p-0" href="#" id="headingTwo" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseTwo">
                <h2 class="mb-0 p-0">
                  <button class="btn btn-link btn-lg" type="button">
                    <i id="accordion1" class="fas fa-chevron-right mr-1 accordion-icon"></i> Pengaturan Kontak dan Media Sosial
                  </button>
                </h2>
              </a>

              <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body pb-0">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row mb-3">
                          <div class="col-xl-3 d-flex align-items-center justify-content-start">
                            <label class="">Nomor HP</label>
                          </div>
                          <div class="col-xl-9">
                            <input type="text" class="form-control rounded" id="nomor_hp" name="nomor_hp" pattern="[+]{0,1}[0-9]{10,17}" placeholder="cth. 081269803000" value="<?php echo $settings['phone_number'] ?>" minlength="10" maxlength="16" required="">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-xl-3 d-flex align-items-center justify-content-start">
                            <label class="">Email</label>
                          </div>
                          <div class="col-xl-9">
                            <input type="email" class="form-control rounded" id="email" name="email" placeholder="cth. admin@buburlukman.com" value="<?php echo $settings['email'] ?>" minlength="7" maxlength="64" required="">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-xl-3 d-flex align-items-center justify-content-start">
                            <label class="">Alamat Singkat</label>
                          </div>
                          <div class="col-xl-9">
                            <input type="text" class="form-control rounded" id="lokasi" name="lokasi" placeholder="cth. Jl. Pulau Legundi No.202" value="<?php echo $settings['location'] ?>" minlength="5" maxlength="32" required="">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-xl-3 d-flex align-items-center justify-content-start">
                            <label class="">Link Facebook</label>
                          </div>
                          <div class="col-xl-9 input-group">
                            <input type="text" class="form-control rounded-left" id="link_facebook" name="link_facebook" placeholder="cth. https://www.facebook.com/buburlukman" value="<?php echo $settings['facebook_link'] ?>" maxlength="256" aria-describedby="open_facebook">
                            <div class="input-group-append">
                              <a class="input-group-text" id="open_facebook" onclick="openLinkInInputBox('link_facebook');" href="#"><i class="fas fa-link mr-2"></i>Buka Link</a>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-xl-3 d-flex align-items-center justify-content-start">
                            <label class="">Link Instagram</label>
                          </div>
                          <div class="col-xl-9 input-group">
                            <input type="text" class="form-control rounded-left" id="link_instagram" name="link_instagram" placeholder="cth. https://www.instagram.com/buburlukman" value="<?php echo $settings['instagram_link'] ?>" maxlength="256" aria-describedby="open_instagram">
                            <div class="input-group-append">
                              <a class="input-group-text" id="open_instagram" onclick="openLinkInInputBox('link_instagram');" href="#"><i class="fas fa-link mr-2"></i>Buka Link</a>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-xl-12 d-flex align-items-center justify-content-end">
                            <button class="btn btn-primary" type="submit" name="updateContactSettings" id="updateContactSettings">Simpan</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form> 
                </div>
            </div>

            <div class="card">
              <a class="card-header p-0" href="#" id="headingThree" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapseThree">
                <h2 class="mb-0 p-0">
                  <button class="btn btn-link btn-lg" type="button">
                    <i id="accordion3" class="fas fa-chevron-down mr-1 accordion-icon"></i> Pengaturan Waktu Buka
                  </button>
                </h2>
              </a>

              <div id="collapse3" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body pb-0">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row mb-3">
                          <div class="col-xl-3 d-flex align-items-center justify-content-start">
                            <label class="">Waktu Buka</label>
                          </div>
                          <div class="col-xl-9">
                            <input type="text" class="form-control rounded" id="waktu_buka" name="waktu_buka" placeholder="cth. Senin-Sabtu: 09.00-21.00 WIB" value="<?php echo $settings['opening_hours'] ?>" minlength="10" maxlength="48" required="">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-xl-12 d-flex align-items-center justify-content-end">
                            <button class="btn btn-primary" type="submit" name="updateOpeningHoursSettings" id="updateOpeningHoursSettings">Simpan</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form> 
                </div>
            </div>
            
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Popper.JS -->
    <script src="<?php echo base_url('assets/assets_yamifood') ?>/js/popper.min.js"></script>
    <script src="<?php echo base_url('assets/assets_yamifood') ?>/js/bootstrap.min.js"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <?php echo ((isset($messageModal))? $messageModal : ''); ?>

    <script>
      /*
      function responsify() {
        if(window.innerWidth > 1920){
          document.querySelector("#navbar_container").setAttribute("class", "container flex-md-nowrap p-0");
          document.querySelector("#content_container").setAttribute("class", "container");
          document.querySelector("#side_navbar").setAttribute("class", "col-md-2 d-none d-md-block bg-light");
        }else{
          document.querySelector("#navbar_container").setAttribute("class", "container-fluid flex-md-nowrap p-0");
          document.querySelector("#content_container").setAttribute("class", "container-fluid");
          document.querySelector("#side_navbar").setAttribute("class", "col-md-2 d-none d-md-block bg-light sidebar");
        }
      }

      window.addEventListener('load', responsify());

      window.addEventListener('resize', function(event) {
        responsify();
      });
      */

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

      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });

      function readURL(input, preview, tombol, indikator) {
        //Thanks Paolo Forgia and Ivan Baev
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            document.getElementById(preview).style.display = "block";
            document.getElementById(preview).setAttribute('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
          document.getElementById(indikator).style.display = 'none';
          document.getElementById(tombol).innerHTML = 'Pilih foto lain...';
        }else{
          document.getElementById(indikator).style.display = 'block';
          document.getElementById(tombol).innerHTML = 'Pilih foto...';
          document.getElementById(preview).setAttribute('src', '');
          document.getElementById(preview).style.display = 'none';

          //document.getElementById(preview).style.display = '<?php //if($linkgambar != "" ){echo "block";}else{echo "none";} ?>';
        }
      }

      function openLinkInInputBox(id){
        var win = window.open(document.getElementById(id).value, '_blank');
        win.focus();
      }
    </script>
  </body>
</html>
