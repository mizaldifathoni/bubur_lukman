
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
    <title><?php echo $settings['title'] ?> - Dashboard</title>  
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
                <a class="nav-link active" href="home">
                  <span data-feather="bar-chart-2"></span>
                  Ikhtisar <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="posts">
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
                <a class="nav-link" href="reviews">
                  <span data-feather="users"></span>
                  Ulasan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="settings">
                  <span data-feather="settings"></span>
                  Pengaturan
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
            <h1 class="h2">Ikhtisar</h1>
          </div>

          <div class="row mb-5">
            <div class="col-lg-3">
              <div class="card alert alert-info">
                <div class="card-body text-center">
                  <h3 class="mb-3"><a href="<?php echo base_url() ?>dashboard/Shop">Jumlah Toko</a></h3>
                  <h1 class="display-4"><?php echo $shop_counts ?></h1>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card alert alert-info">
                <div class="card-body text-center">
                  <h3 class="mb-3"><a href="<?php echo base_url() ?>dashboard/Menu">Jumlah Menu</a></h3>
                  <h1 class="display-4"><?php echo $menu_counts ?></h1>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card alert alert-info">
                <div class="card-body text-center">
                  <h3 class="mb-3"><a href="<?php echo base_url() ?>dashboard/Post">Jumlah Posting</a></h3>
                  <h1 class="display-4"><?php echo $post_counts ?></h1>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card alert alert-info">
                <div class="card-body text-center">
                  <h3 class="mb-3"><a href="<?php echo base_url() ?>dashboard/Review">Jumlah Ulasan</a></h3>
                  <h1 class="display-4"><?php echo $review_counts ?></h1>
                </div>
              </div>
            </div>
          </div>

          <h1 class="mb-3">Grafik Penayangan</h1>
          <canvas class="my-4 mb-5" id="myChart" width="900" height="380"></canvas>

          <div class="row">
            <div class="col-lg-6">
              <h1 class="mb-3">Penayangan terhadap Waktu</h1>
              <table class="table table-bordered rounded">
                <tbody>
                <tr>
                    <td>Penayangan kemarin</td>
                    <td><?php echo $all_statistics['yesterday'] ?></td>
                  </tr>
                  <tr class="table-info">
                    <td>Penayangan hari ini</td>
                    <td><?php echo $all_statistics['today'] ?></td>
                  </tr>
                  <tr>
                    <td>Penayangan minggu ini</td>
                    <td><?php echo $all_statistics['weekly'] ?></td>
                  </tr>
                  <tr>
                    <td>Penayangan bulan ini</td>
                    <td><?php echo $all_statistics['monthly'] ?></td>
                  </tr>
                  <tr>
                    <td>Penayangan tahun ini</td>
                    <td><?php echo $all_statistics['yearly'] ?></td>
                  </tr>
                  <tr>
                    <td>Penayangan sepanjang waktu</td>
                    <td><?php echo $all_statistics['all_time'] ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-lg-6">
              <h1 class="mb-3">Penayangan terhadap Lokasi</h1>
              <?php echo $most_visitor_location ?>
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

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: [<?php
              for($i=6; $i>=0; $i--){
                echo ($i == 0)? '"' . $weekly_statistics['days'][$i] . '"' : '"' . $weekly_statistics['days'][$i] . '", ';
              } 
              ?>],
          datasets: [{
            data: [<?php
              for($i=6; $i>=0; $i--){
                echo ($i == 0)? $weekly_statistics['views'][$i] : $weekly_statistics['views'][$i] . ', ';
              } 
              ?>],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#00858D',
            borderWidth: 4,
            pointBackgroundColor: '#00858D'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
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

      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
  </body>
</html>
