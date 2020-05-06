
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
    <title><?php echo $settings['title'] ?> - Gallery</title>  
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
                  <span data-feather="bar-chart-2" class="mb-1"></span>
                  Ikhtisar
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="posts">
                  <span data-feather="file" class="mb-1"></span>
                  Posting
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop">
                  <span data-feather="home" class="mb-1"></span>
                  Toko/Cabang
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu">
                  <span data-feather="shopping-cart" class="mb-1"></span>
                  Menu Restoran
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="reviews">
                  <span data-feather="users" class="mb-1"></span>
                  Ulasan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="gallery">
                  <span data-feather="image" class="mb-1"></span>
                  Galeri <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="settings">
                  <span data-feather="settings" class="mb-1"></span>
                  Pengaturan
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-2 text-muted">
              <span>Laporan</span>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="userdata">
                  <span data-feather="file-text" class="mb-1"></span>
                  Data Pengguna
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="changelog">
                  <span data-feather="file-text" class="mb-1"></span>
                  Log Perubahan
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 pb-4 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Galeri</h1>
          </div>
          <?php echo $accordions ?>
        </main>
      </div>
    </div>

    <!-- Modal Tambah Foto -->
    <div class="modal fade" id="addPhotoModal" tabindex="-1" role="dialog" aria-labelledby="addPhotoModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h3 class="modal-title pb-0" id="addPhotoModalTitle">Tambah Foto</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="tambah_foto">Unggah Foto</label>
                  <div class="input-group d-flex justify-contents-center align-items-center">
                    <input type="file" id="tambah_foto" name="tambah_foto" accept="image/*" onchange="readURL(this, 'tambahPreviewImage', 'tambahUploadButton', 'tambahImageIndicator');" style="display: none" required>
                    <label type="button" id="tambahUploadButton" class="btn btn-light mr-4" for="tambah_foto">Pilih</label>
                    <span id="tambahImageIndicator">Tidak ada foto yang dipilih.</span>
                    <img id="tambahPreviewImage" src="#" style="max-width: 100%; max-height: 200px; width: auto; height: auto;display: none" onerror="this.style.display = 'none'"/>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="tambah_judul_foto">Judul Foto</label>
                  <input type="text" class="form-control rounded" id="tambah_judul_foto" name="tambah_judul_foto" placeholder="cth. Halaman Depan Bubur Lukman" value="" minlength="3" maxlength="32" required="">
                  <div class="invalid-feedback">
                    Judul foto tidak boleh kosong.
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" id="tambahFoto" name="tambahFoto">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Edit Foto -->
    <div class="modal fade" id="editPhotoModal" tabindex="-1" role="dialog" aria-labelledby="editPhotoModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h3 class="modal-title pb-0" id="editPhotoModalTitle">Edit Foto</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <input id="edit_id_foto" type="text" class="form-control rounded" name="edit_id_foto" value="" hidden required>
                <input id="edit_judul_foto_awal" type="text" class="form-control rounded" name="edit_judul_foto_awal" value="" hidden required>
                <div class="col-md-12 mb-3">
                  <label for="edit_foto">Unggah Foto</label>
                  <div class="input-group d-flex justify-contents-center align-items-center">
                    <input type="file" id="edit_foto" name="edit_foto" accept="image/*" onchange="readURL(this, 'editPreviewImage', 'editUploadButton', 'editImageIndicator');" style="display: none">
                    <label type="button" id="editUploadButton" class="btn btn-light mr-4" for="edit_foto">Pilih</label>
                    <span id="editImageIndicator">Tidak ada foto yang dipilih.</span>
                    <img id="editPreviewImage" src="#" style="max-width: 100%; max-height: 200px; width: auto; height: auto;display: none" onerror="this.style.display = 'none'"/>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="edit_judul_foto">Judul Foto</label>
                  <input type="text" class="form-control rounded" id="edit_judul_foto" name="edit_judul_foto" placeholder="cth. Halaman Depan Bubur Lukman" value="" minlength="3" maxlength="32" required="">
                  <div class="invalid-feedback">
                    Judul foto tidak boleh kosong.
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" id="editFoto" name="editFoto">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Hapus Menu-->
    <div class="modal fade" id="deletePhotoModal" tabindex="-1" role="dialog" aria-labelledby="deletePhotoModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="" method="POST">
            <div class="modal-header">
              <h3 class="modal-title" id="deletePhotoModalTitle">Hapus Foto</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="text" id="hapus_id_foto" name="hapus_id_foto" value="" hidden>
              <input type="text" id="hapus_judul_foto" name="hapus_judul_foto" value="" hidden>
              <span id="pesan_hapus">Apakah Anda yakin untuk menghapus foto X?</span>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-outline-danger" name="hapusFoto"><i class="fas fa-trash"></i> Hapus</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Message -->
    

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

      $('#editPhotoModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var idFoto = button.data('id-foto')
        var judulFoto = button.data('judul-foto');
        var pathFoto = button.data('path-foto');

        var modal = $(this);
        modal.find('.modal-title').text('Edit Foto ' + judulFoto);
        document.getElementById('edit_id_foto').value = idFoto;
        document.getElementById('edit_judul_foto').value = judulFoto;
        document.getElementById('edit_judul_foto_awal').value = judulFoto;
          
        //memuat foto yang sudah ada
        document.getElementById('editPreviewImage').style.display = "block";
        document.getElementById('editPreviewImage').setAttribute('src', '<?php echo base_url(''); ?>' + pathFoto);
        document.getElementById('editImageIndicator').style.display = 'none';
        document.getElementById('editUploadButton').innerHTML = 'Pilih foto lain...';
      });

      $('#deletePhotoModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var idFoto = button.data('id-foto')
        var judulFoto = button.data('judul-foto');

        var modal = $(this)

        document.getElementById('hapus_id_foto').value = idFoto;
        document.getElementById('hapus_judul_foto').value = judulFoto;
        document.getElementById('pesan_hapus').innerHTML = 'Apakah Anda yakin menghapus foto <i>' + judulFoto + '</i> ?';
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
    </script>
  </body>
</html>
