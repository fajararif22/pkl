<?php $db = mysqli_connect('localhost', 'root', '', 'e_farming'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>ECOFarming Guide Book</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">



  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    .col .card .card-text {
      min-height: 50px;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


</head>

<body>

  <header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="<?= base_url('user'); ?>" class="navbar-brand d-flex align-items-center">
          <img src="<?= base_url('assets/'); ?>img/logo.jpg" height="56px">
          <strong>EcoFarming</strong>
        </a>
      </div>
    </div>
  </header>

  <main>

    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Welcome to EcoFarming</h1>
          <p class="lead text-muted">Here you will find the steps to farm and infos about farming.</p>
        </div>
      </div>
    </section>

    <div class="text-center">
      <span>Wanna share your tips and trick about farming?</span>
      <a href="<?= base_url('user/blogwrite'); ?>">
        <span>Let's go!</span>
      </a>
    </div>
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <!-- blog feed -->

          <?php
          $sqlblog = mysqli_query($db, "SELECT * FROM blog ORDER BY id_blog DESC");
          while ($blogfeed = mysqli_fetch_array($sqlblog)) {
          ?>
            <div class="card shadow-sm">
              <div id="post<?= $blogfeed['id_blog']; ?>">
                <?php
                if ($blogfeed['blogimg'] != '') {
                ?>
                  <img src="<?= base_url('assets/img/blog/') . $blogfeed['blogimg']; ?>" width="100%" style="max-height:225px;">
                <?php
                } else {
                ?>
                  <img src="<?= base_url('assets/'); ?>/img/logo.jpg" width="100%" style="max-height:225px">
                <?php
                }
                ?>
                <div class="card-body">
                  <p class="card-text"><?= $blogfeed['blogtitle']; ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a class="btn btn-sm btn-outline-secondary" href="<?= base_url('user/blogview'); ?>?p=<?= $blogfeed['id_blog']; ?>&a=<?= $blogfeed['blogwriter']; ?>" style='text-decoration: none;color: #777777;'>View</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>

          <!-- blog feed -->
          <div class="col">
            <div class="card shadow-sm">
              <img src="<?= base_url('assets/img/'); ?>hama-tikus.jpeg" alt="padi" width="100%" style="max-height:225px;">

              <div class="card-body">
                <p class="card-text">3 Cara Ampuh Mengusir Hama Wereng dan Tikus</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                      <a href="<?= base_url('user/jagungarticle'); ?>" style='text-decoration: none;color: #777777;'>View</a>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <img src="<?= base_url('assets/img/'); ?>jagung.jpeg" alt="padi" width="100%" style="max-height:225px;">

              <div class="card-body">
                <p class="card-text">7 Cara Mudah Menanam Jagung Yang Baik dan Benar Agar Menghasilkan Panen
                  Menguntungkan</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                      <a href="<?= base_url('user/jagungarticle'); ?>" style='text-decoration: none;color: #777777;'>View</a>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Back to top</a>
      </p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/bootstrap.bundle.min.js"></script>


</body>

</html>