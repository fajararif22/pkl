<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog write</title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="<?= base_url('admin/guidebook'); ?>" class="navbar-brand d-flex align-items-center">
                    <img src="<?= base_url('assets/'); ?>img/logo.jpg" height="56px" alt="">
                    <strong>EcoFarming</strong>
                </a>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Your blog</h1>
                            </div>
                            <form method="POST" action="#" enctype="multipart/form-data">
                                <?php
                                $db = mysqli_connect('localhost', 'root', '', 'e_farming');
                                if (isset($_POST['postbtn'])) {
                                    $user['name'];
                                    $user['id_user'];
                                    $blogtitle = $_POST['title'];
                                    $blogsubtitle = $_POST['subtitle'];
                                    $blogcontent = $_POST['content'];
                                    $blogthumbnail = @$_FILES['image']['tmp_name'];
                                    $blogthumbnailsrc = @$_FILES['image']['name'];
                                    $folder = "assets/img/blog/";

                                    $uploadfile = move_uploaded_file($blogthumbnail, $folder . $blogthumbnailsrc);

                                    if ($uploadfile) {
                                        mysqli_query($db, "INSERT INTO blog VALUES('','$user[name]','$blogtitle','$blogsubtitle','$blogcontent',$user[id_user],'$blogthumbnailsrc')");
                                        echo "<div class='alert alert-success'>Your blog has been added</div>";
                                    } else if ($blogcontent == '') {
                                        echo "<div class='alert alert-danger'>Your content is required</div>";
                                    } else if ($blogtitle == '') {
                                        echo "<div class='alert alert-danger'>Your content is required</div>";
                                    } else if ($blogsubtitle == '') {
                                        echo "<div class='alert alert-danger'>Your content is required</div>";
                                    } else if ($uploadfile == '') {
                                        mysqli_query($db, "INSERT INTO blog VALUES('','$user[name]','$blogtitle','$blogsubtitle',$user[id_user],'$blogcontent', '')");
                                        echo "<div class='alert alert-success'>Your blog has been added</div>";
                                    }
                                }
                                ?>
                                <div class="form-group">
                                    <input required type="text" class="form-control form-control-user" id="title" name="title" placeholder="The title">
                                </div>
                                <div class="form-group">
                                    <input required type="text" class="form-control form-control-user" id="subtitle" name="subtitle" placeholder="The subtitle">
                                </div>
                                <div class="form-group">
                                    <textarea required type="text" class="form-control form-control-user" id="content" name="content" placeholder="Your content"></textarea>
                                </div>
                                <div class="text-center">
                                    <input type="file" name="image">
                                </div>
                                <br>
                                <input type="submit" name="postbtn" class="btn btn-primary btn-user btn-block" value="Post">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
</body>

</html>