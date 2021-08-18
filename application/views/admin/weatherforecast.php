<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/minty/bootstrap.min.css" />

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>weatherforecast</title>
</head>

<body>

  <body>
    <nav class="navbar navbar-dark bg-primary mb-3">
      <div class="container">
        <a href="<?= base_url('user') ?>" class="navbar-brand">Home</a>
      </div>
    </nav>
    <div class="container searchContainer">
      <div class="search card card-body">
        <h1>Get weather for your location</h1>
        <p class="lead">Enter location</p>
        <input type="text" id="searchUser" class="form-control" placeholder="Location">
      </div>
      <br>
      <div id="profile"></div>
    </div>
    <div class="container text-center mt-2">
      <button class="btn btn-primary" id="submit">Submit</button>
    </div>

    <div id="content">

    </div>
    <footer class="mt-5 p-3 text-center bg-light">
      cuaca &copy;
    </footer>
  </body>
  <script src="<?= base_url('assets/js/'); ?>fetch.js"></script>
  <script src="<?= base_url('assets/js/'); ?>ui.js"></script>
  <script src="<?= base_url('assets/js/'); ?>app.js"></script>

</html>