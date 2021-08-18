<?php
$db = mysqli_connect('localhost', 'root', '', 'e_farming');
$idblog = @$_GET['p'];
$blogwriter = @$_GET['a'];
$sqlblog = mysqli_query($db, "SELECT * FROM blog WHERE id_blog = '$idblog' AND blogwriter  = '$blogwriter'");
$blogfeed = mysqli_fetch_array($sqlblog);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title><?= $blogfeed['blogtitle']; ?></title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">



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

    .top-title h1 {
      text-shadow: 2px 2px #d4cbcb;
    }

    .col-text {
      padding: 20px 3em;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="css/product.css" rel="stylesheet">
</head>

<body>

  <header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="<?= base_url('admin/guidebook'); ?>" class="navbar-brand d-flex align-items-center">
          <img src="<?= base_url('assets/'); ?>img/logo.jpg" height="56px">
          <strong>EcoFarming</strong>
        </a>
      </div>
    </div>
  </header>

  <main>
    <div id="post<?= $blogfeed['id_blog']; ?>">
      <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light top-title" style="background-image: url('<?= base_url('assets/img/blog/') . $blogfeed['blogimg']; ?>');background-size: cover;">
        <div class="col-md-10 p-lg-5 mx-auto my-5">
          <h1 class="display-4 fw-normal"><?= $blogfeed['blogtitle']; ?></h1>
        </div>
      </div>
    </div>

    <div class="text-content">
      <div class="col-md-12 mx-auto col-text">
        <h3><?= $blogfeed['blogsubtitle'] ?></h3>
        <p><?= $blogfeed['blogcontent']; ?></p>
      </div>
    </div>
  </main>

  <footer class="text-muted py-5">
    <div class="container">
      <span>Blog writed by : <?= $blogfeed['blogwriter']; ?></span>
      <p class="float-end mb-1">
        <a href="#">Back to top</a>
      </p>
    </div>
  </footer>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>