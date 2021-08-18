<?php
$db = mysqli_connect('localhost', 'root', '', 'e_farming');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello <?= $user['name']; ?></title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user'); ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('assets/'); ?>img/logo.jpg" height="56px" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">ECOFARMING</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <li class="nav-item">
                <center>
                    <img class="img-profile-fw rounded-circle" height="33px" src="<?= base_url('assets/img/profile/') . $user['image']; ?>"><br>
                    <span style="color: aliceblue; font-size: 10.5px;"><?= $user['name']; ?></span>
                </center>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/userprofile/'); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>My Profile</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt "></i>
                    <span>Logout</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <id class="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h3 class="h3 text-gray-900 mb-10">My profile</h3>
                                            </div>
                                            <br>
                                            <br>
                                            <center>
                                                <img class="img-profile-fw rounded-circle mb-4" height="89px" src="<?= base_url('assets/img/profile/') . $user['image']; ?>"><br>
                                                <span style="color: gray; font-size: 15px;"><?= $user['name']; ?></span>
                                            </center>
                                            <span class="text-gray-900">Email : <br><?= $user['email']; ?></span>
                                            <center>
                                                <div class="nav-link">
                                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#updateprofileModal">
                                                        <button class="btn btn-primary" name="edit-profile">Edit profile</button>
                                                    </a>
                                                </div>
                                            </center>
                                            <!-- Postingan user -->
                                            <hr class="sidebar-divider my-0">
                                            <br>
                                        </div>
                                        <center>
                                            <h4 style="font-family: 'Times New Roman', Times, serif;">Your post</h4>
                                        </center>
                                        <br>
                                        <?php
                                        $user['name'];
                                        $sqlfeed = mysqli_query($db, "SELECT * FROM post WHERE writer = '$user[name]'");
                                        while ($postFeed = mysqli_fetch_array($sqlfeed)) {
                                        ?>
                                            <div class="alert alert-info" <?= $postFeed['writer'] . $postFeed['id_post']; ?>>
                                                <span style="float:right;"><?= $postFeed['date']; ?></span>
                                                <img class="img-profile rounded-circle" style="width: 40px; length:40px;" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="">
                                                <span><?= $postFeed['writer']; ?></span>
                                                <br>
                                                <br>
                                                <?php if ($postFeed['image'] != '') { ?>
                                                    <h6><?php echo $postFeed['content']; ?></h6>
                                                    <br>
                                                    <center>
                                                        <a href="<?= base_url('assets/img/post/') . $postFeed['image']; ?>" style="width: 620px;">
                                                            <img src="<?= base_url('assets/img/post/') . $postFeed['image']; ?>" class="img img-thumbnail" style="width: 620px;">
                                                        </a>
                                                    </center>
                                                <?php
                                                } else { ?>
                                                    <h6><?= $postFeed['content']; ?></h6>

                                                <?php
                                                } ?>
                                                <br>
                                                <br>
                                                <a href="<?= base_url('user/post') ?>?p=<?php echo $postFeed["id_post"]; ?>&a=<?php echo $postFeed["writer"]; ?>">
                                                    <button name="btn btn-comment" type="button" class="btn btn-light btn">
                                                        <i class="fa fa-comment">
                                                            <?php $comment = mysqli_num_rows(mysqli_query($db, "SELECT * FROM comment_section WHERE id_post='$postFeed[id_post]'"));
                                                            echo $comment; ?>
                                                        </i>
                                                    </button>
                                                </a>
                                                <br>
                                                <br>
                                                <?php
                                                $commentdata = mysqli_query($db, "SELECT * FROM comment_section WHERE id_post = '$postFeed[id_post]' ORDER BY id ASC LIMIT 3 ");
                                                while ($commentpost = mysqli_fetch_array($commentdata)) {
                                                    $commentating = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM user WHERE name = '$commentpost[cName]' "))
                                                ?>
                                                    <div class="alert alert-light" style="font-size: 12px;" <?php $commentpost['id_post']; ?>>
                                                        <span style="float: right;"><?= $commentpost['cDate']; ?></span>
                                                        <img class="img-profile rounded-circle" style="width: 26px; length:26px;" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="">
                                                        <span><?= $commentpost['cName']; ?></span>
                                                        <br><br>
                                                        <span><?= $commentpost['cContent']; ?></span>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                $limit = mysqli_query($db, "SELECT * FROM comment_section WHERE id_post = '$postFeed[id_post]'");
                                                if (mysqli_num_rows($limit) >= 4) {
                                                    $commenttotal = mysqli_num_rows(mysqli_query($db, "SELECT * FROM comment_section WHERE id_post = '$postFeed[id_post]'"));
                                                    $commentlimit = $commenttotal - 3;
                                                ?>
                                                    <br>
                                                    <a style="float: right;" href="<?= base_url('user/post') ?>?p=<?php echo $postFeed["id_post"]; ?>&a=<?php echo $postFeed["writer"]; ?>"><?= $commentlimit; ?> more comments</a>
                                                    <br>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <form action="#" method="POST" enctype="multipart/form-data">
                                            <?php
                                            if (isset($_POST['save'])) {
                                                $user['id'];
                                                $image = $_FILES['image']['tmp_name'];
                                                $image_src = $_FILES['image']['name'];
                                                $folder = 'assets/img/user';
                                                $uploadImage = move_uploaded_file($image, $folder . $image_src);
                                                $name = $_POST['name'];
                                                $email = $_POST['email'];
                                                if ($name !== '') {
                                                    $sql = "UPDATE user SET name ='$name' WHERE id='$user[id]'";
                                                    $query = mysqli_query($db, $sql);
                                                    base_url('user/index/');
                                                    echo '<div class="alert alert-success">Your name has been change</div>';
                                                } else if ($email !== '') {
                                                    $sql = "UPDATE user SET email ='$email' WHERE id='$user[id]'";
                                                    $query = mysqli_query($db, $sql);
                                                    base_url('auth/login/');
                                                    echo '<div class="alert alert-success">Your email has been change, please log in again</div>';
                                                    // } else if ($uploadImage) {
                                                    //     $sql = "UPDATE user SET image ='$image_src' WHERE id='$user[id]'";
                                                    //     $query = mysqli_query($db, $sql);
                                                    //     base_url('user/index/');
                                                    //     echo '<div class="alert alert-success">Your profile picture has been change</div>';
                                                } else {
                                                    $sql = "UPDATE user SET name = '$name', email = '$email', image = '$image_src' WHERE id='$user[id]'";
                                                    $query = mysqli_query($db, $sql);
                                                    base_url('user/index/');
                                                    echo '<div class="alert alert-success">Your profile has been change, please log in again</div>';
                                                }
                                            }
                                            ?>
                                            <div class="modal fade" id="updateprofileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h8 class="modal-title" id="exampleModalLabel">
                                                                Edit your profile
                                                            </h8>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- <span class="text-gray">
                                                        Change profile picture <br>
                                                        <input type="file" name="image">
                                                    </span> -->
                                                            <input class="form-control" type="text" name="name" id="name" placeholder="Enter new name"><br>
                                                            <input class="form-control" type="email" name="email" id="email" placeholder="Enter new Email">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="submit" name="save" class="btn btn-primary" value="Save">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </id>
        </div>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= base_url('auth/'); ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Logout Modal -->
</body>
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</html>