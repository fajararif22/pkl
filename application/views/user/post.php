<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
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
            <id class="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <a class="nav-link dropdown-toggle-no-arrow" href="<?= base_url('user/weatherforecast'); ?>">
                            <i class="fas fa-cloud-sun fa-fw my-4"></i>
                        </a>
                        <a class="nav-link dropdown-toggle-no-arrow" href="<?= base_url('user/guidebook'); ?>">
                            <i class="fas fa-book-open fa-fw my-4"></i>
                        </a>
                        <a class="nav-link dropdown-toggle-no-arrow" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw my-4">
                                <span class="badge badge-danger badge-counter">
                                    <?php
                                    $db = mysqli_connect('localhost', 'root', '', 'e_farming');
                                    $sqlFeed = mysqli_query($db, "SELECT * FROM post WHERE writer = '$user[name]' ");
                                    $postfeed = mysqli_fetch_array($sqlFeed);
                                    $comment = mysqli_num_rows(mysqli_query($db, "SELECT * FROM comment_section WHERE id_post='$postfeed[id_post]'"));
                                    echo $comment;
                                    ?>
                                </span>
                            </i>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notification
                                </h6>
                                <?php
                                $db = mysqli_connect('localhost', 'root', '', 'e_farming');
                                $commentnotifdata = mysqli_query($db, "SELECT * FROM comment_section WHERE post_writer = '$user[name]' ");
                                while ($commentnotif = mysqli_fetch_array($commentnotifdata)) {
                                    $sqlfeed = mysqli_query($db, "SELECT * FROM post WHERE id_post = '$commentnotif[id_post]' AND writer = '$commentnotif[post_writer]'");
                                    $postFeed = mysqli_fetch_array($sqlfeed);
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="<?= base_url('user/post') ?>?p=<?php echo $postFeed["id_post"]; ?>&a=<?php echo $postFeed["writer"]; ?>">
                                        <?php
                                        if ($commentnotif['cName'] === $user['name']) {
                                        } else {
                                        ?>
                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-comment text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500"><?= $commentnotif['cDate']; ?></div>
                                                <h6 class="font-weight-bold"><?= $commentnotif['cName']; ?> :</h6>
                                                <span class="font-weight-bold"><?= $commentnotif['cContent']; ?></span>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </a>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                            </a>
                        </li>

                    </ul>
                </nav>
                <div class="container-fluid">
                    <!-- Discussion feed -->
                    <?php
                    $db = mysqli_connect('localhost', 'root', '', 'e_farming');
                    $idpost = @$_GET['p'];
                    $postwriter = @$_GET['a'];
                    $datapost = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM post WHERE id_post = '$idpost' AND writer = '$postwriter'"));
                    $sqlfeed = mysqli_query($db, "SELECT * FROM post ORDER BY id_post = '$idpost'");
                    $postFeed = mysqli_fetch_array($sqlfeed);
                    ?>
                    <div class="alert alert-info" id="post <?= $datapost['id_post']; ?>">
                        <a style="float: right; " class="nav-link dropdown-toggle-no-arrow" data-target="#reportModal" data-toggle="modal">
                            <i class="fas fa-exclamation"></i>
                        </a>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            if (isset($_POST['report'])) {
                                $datapost['id_post'];
                                $reportfield = $_POST['reportfield'];
                                $user['name'];
                                $datereported = date('D, d M Y H:i');

                                mysqli_query($db, "INSERT INTO report VALUES('','$datapost[id_post]','$postwriter','$reportfield','$user[name]','$datereported')");
                                echo "<div class='alert alert-success'>Your report has been post</div>";
                            }
                            ?>
                            <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h8 class="modal-title" id="exampleModalLabel">You want to repot this post?</h8>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h6>If this post bothers you, write down why</h6>
                                            <textarea class="form-control" name="reportfield" id="reportfield" cols="30" rows="10" placeholder="Write the reason"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="report" class="btn btn-primary" value="Report">
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <span style="float: right;"><?= $datapost['date']; ?></span>
                    <img class="img-profile rounded-circle" style="width: 36px; length:36px;" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="">
                    <span><?= $datapost['writer']; ?></span>
                    <br>
                    <br>
                    <?php
                    if ($datapost['image'] != '') { ?>
                        <h6><?php echo $datapost['content']; ?></h6>
                        <br>
                        <center>
                            <a href="<?= base_url('assets/img/post/') . $datapost['image']; ?>">
                                <img src="<?= base_url('assets/img/post/') .  $datapost['image']; ?>" class="img img-thumbnail">
                            </a>
                        </center>
                    <?php
                    } else { ?>
                        <h6><?= $datapost['content']; ?></h6>

                    <?php
                    } ?>
                    <br><br>
                    <a href="<?= base_url('user/post') ?>?p=<?php echo $idpost; ?>&a=<?php echo $postwriter; ?>">
                        <button name="btn btn-comment" type="button" class="btn btn-light btn" onclick="shw_comment">
                            <i class="fa fa-comment">
                                <?php $comment = mysqli_num_rows(mysqli_query($db, "SELECT * FROM comment_section WHERE id_post='$idpost'"));
                                echo $comment; ?>
                            </i>
                        </button>
                    </a>
                    <br><br>
                    <?php
                    $commentdata = mysqli_query($db, "SELECT * FROM comment_section WHERE id_post = '$idpost' ORDER BY id ");
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
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <input type="text" class="form-control form-control-user" name="commentfield" placeholder="Write your comment...">
                        <br>
                        <input type="submit" class="btn btn-primary" name="commentbtn" value="Post">
                        <?php
                        if (isset($_POST['commentbtn'])) {
                            $user['name'];
                            $commentfill = $_POST['commentfield'];
                            $date = date('D, d M Y H:i');
                            $datapost['id_post'];

                            mysqli_query($db, "INSERT INTO comment_section VALUES('','$user[name]','$commentfill','$date','$datapost[id_post]','$postwriter')");
                        }
                        ?>
                    </form>
                </div>
        </div>
        </id>
    </div>
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
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
</body>

</html>