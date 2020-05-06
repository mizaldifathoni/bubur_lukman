
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Site Metas -->
    <title>Log Perubahan - <?php echo $settings['title'] ?></title>  
    <meta name="author" content="<?php echo $settings['meta_author'] ?>">
    <meta name="description" content="<?php echo $settings['meta_description'] ?>">
    <meta name="keywords" content="<?php echo $settings['meta_keywords'] ?>">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?php echo base_url() . $settings['favicon'] ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo base_url() . $settings['favicon_apple'] ?>">

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
                <a class="nav-link" href="gallery">
                  <span data-feather="image" class="mb-1"></span>
                  Galeri
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
                <a class="nav-link active" href="changelog">
                  <span data-feather="file-text" class="mb-1"></span>
                  Log Perubahan <span class="sr-only">(current)</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 pb-4 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Laporan Log Perubahan</h1>
          </div>

          <div class="row mb-5">
            <div class="col-12">
              <div class="card alert alert-info">
                <div class="card-body">
                  <strong>Selamat datang di Laporan Log Perubahan!</strong> Laporan log perubahan berfungsi untuk melihat perubahan informasi yang terjadi di dalam web.
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <table class="table table-striped" style="table-layout: fixed">
                <thead>
                  <tr>
                    <th scope="col" style="width: 10%">ID</th>
                    <th scope="col" style="width: 20%">Username</th>
                    <th scope="col" style="width: 50%">Log</th>
                    <th scope="col" style="width: 20%">Waktu</th>
                  </tr>
                </thead>
                <tbody>
                  <?php echo $changelog ?>
                </tbody>
              </table>
            </div>
          </div>
          
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/assets_yamifood') ?>/js/popper.min.js"></script>
    <script src="<?php echo base_url('assets/assets_yamifood') ?>/js/bootstrap.min.js"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    
    <script>
      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });

      function sendWhatsApp(num) {
        var no_telepon = document.getElementById('no_telepon_' + num).innerHTML;
        var message = document.getElementById('promo_message').value;

        var link = 'https://wa.me/' + no_telepon + '?text=' + encodeURI(message);

        var win = window.open(link, '_blank');
        win.focus();
      }
    </script>
  </body>
</html>
