<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Home</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
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
                <a class="nav-link" href="<?= base_url('admin/userprofile/'); ?>">
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

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <id class="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h5 class="page-head-line">
                        Hello!
                        <?php
                        date_default_timezone_set("Asia/Jakarta");
                        $d = time();
                        $date = date("G", $d);
                        if ($date >= 0 && $date <= 10) {
                            echo "Good morning";
                        } elseif ($date >= 11 && $date <= 14) {
                            echo "Good afternoon.";
                        } elseif ($date >= 15 && $date <= 17) {
                            echo "Good afternoon.";
                        } elseif ($date >= 18 && $date <= 23) {
                            echo "Good night.";
                        }
                        ?>
                    </h5>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <a class="nav-link dropdown-toggle-no-arrow" href="<?= base_url('admin/weatherforecast'); ?>">
                            <i class="fas fa-cloud-sun fa-fw my-4"></i>
                        </a>
                        <a class="nav-link dropdown-toggle-no-arrow" href="<?= base_url('admin/guidebook'); ?>">
                            <i class="fas fa-book-open fa-fw my-4"></i>
                        </a>
                        <a class="nav-link dropdown-toggle-no-arrow" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw my-4">
                            </i>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated-grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notification
                                </h6>
                                <?php
                                $db = mysqli_connect('localhost', 'root', '', 'e_farming');
                                $reportnotifdata = mysqli_query($db, "SELECT * FROM report");
                                while ($reportnotif = mysqli_fetch_array($reportnotifdata)) {
                                    $report = mysqli_query($db, "SELECT * FROM post WHERE id_post = '$reportnotif[id_post]' AND writer = '$reportnotif[post_writer]' ");
                                    $reportfeed = mysqli_fetch_array($report);
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="<?= base_url('admin/post') ?>?p=<?php echo $reportfeed["id_post"]; ?>&a=<?php echo $reportfeed['writer'] ?>">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-exclamation-circle "></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500"><?= $reportnotif['date_reported']; ?></div>
                                            <h6 class="font-weight-bold"><?= $reportnotif['name']; ?> :</h6>
                                            <span class="font-weight-bold"><?= $reportnotif['report']; ?></span>
                                        </div>
                                    </a>
                                <?php
                                }
                                ?>
                                <?php
                                $commentnotifdata = mysqli_query($db, "SELECT * FROM comment_section WHERE post_writer = '$user[name]' ");
                                while ($commentnotif = mysqli_fetch_array($commentnotifdata)) {
                                    $sqlfeed = mysqli_query($db, "SELECT * FROM post WHERE id_post = '$commentnotif[id_post]' AND writer = '$commentnotif[post_writer]'");
                                    $postFeed = mysqli_fetch_array($sqlfeed);
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="<?= base_url('admin/post') ?>?p=<?php echo $postFeed["id_post"]; ?>&a=<?php echo $postFeed["writer"]; ?>">
                                        <?php
                                        if ($commentnotif['cName'] == $user['name']) {
                                        } else {
                                        ?>
                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-comment text-white "></i>
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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <!-- Discussion fprum -->
                <div class="container-fluid">
                    <!-- Discussion modal-->
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <!-- Discussion script -->
                        <?php
                        $db = mysqli_connect('localhost', 'root', '', 'e_farming');
                        if (@$_POST['post']) {
                            $user['name'];
                            $user['id_user'];
                            $image = $_FILES['image']['tmp_name'];
                            $image_src = $_FILES['image']['name'];
                            $folder = "assets/img/post/";

                            $upload = move_uploaded_file($image, $folder . $image_src);

                            $content = mysqli_escape_string($db, $_POST['content']);

                            $date = date("G:i d/m/Y");

                            if ($content == "") {
                                echo "<div class='alert alert-danger'>Your content is required</div>";
                            } else if ($upload) {
                                mysqli_query($db, "INSERT INTO post VALUES('','$content','$user[name]','$user[id_user]','$date','$image_src')");
                                echo "<div class='alert alert-success'>Your post has been added</div>";
                            } else {
                                mysqli_query($db, "INSERT INTO post VALUES('','$content','$user[name]','$user[id_user]','$date','')");
                                echo "<div class='alert alert-success'>Your post has been added</div>";
                            }
                        }
                        ?>
                        <!-- End of discussion script -->
                        <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h8 class="modal-title" id="exampleModalLabel">Hello <?= $user['name']; ?>! What your thinking for today?</h8>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="I think..."></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="file" name="image">
                                        <input type="submit" name="post" class="btn btn-primary" value="Post">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- End of discussion modal -->

                    <!-- End of discussion forum -->

                    <!-- Discussion feed -->
                    <?php
                    $sqlfeed = mysqli_query($db, "SELECT * FROM post ORDER BY id_post DESC");
                    while ($postFeed = mysqli_fetch_array($sqlfeed)) {
                        $datauserpost = mysqli_fetch_array(mysqli_query($db, " SELECT * FROM user WHERE name = '$postFeed[writer]'"));
                    ?>
                        <div class="alert alert-info" id="post <?= $postFeed['id_post']; ?>">
                            <a style="float: right; " class="nav-link dropdown-toggle-no-arrow" href="<?= base_url('admin/post') ?>?p=<?php echo $postFeed["id_post"]; ?>&a=<?php echo $postFeed["writer"]; ?>">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <span style="float:right;"><?php echo $postFeed["date"]; ?></span>
                            <?php if ($datauserpost['image'] === 'default.jpg') { ?>
                                <img class="img-profile rounded-circle" style="width: 36px; length:36px;" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                            <?php
                            } ?>
                            <?php if ($datauserpost['image'] !== 'default.jpg') { ?>
                                <img class="img-profile rounded-circle" style="width:30px;height:30px;border-radius:100%" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                            <?php
                            } ?>
                            <span><?= $postFeed['writer']; ?></span>
                            <br>
                            <br>
                            <?php if ($postFeed['image'] != '') { ?>
                                <h6><?php echo $postFeed['content']; ?></h6>
                                <br>
                                <center>
                                    <a href="assets/img/post/<?= $postFeed['image']; ?>">
                                        <img src="assets/img/post/<?= $postFeed['image']; ?>" class="img img-thumbnail" style="width: 620px;">
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
                                <button name="btn btn-comment" type="button" class="btn btn-light btn" onclick="shw_comment">
                                    <i class="fa fa-comment">
                                        <?php $comment = mysqli_num_rows(mysqli_query($db, "SELECT * FROM comment_section WHERE id_post='$postFeed[id_post]'"));
                                        echo $comment; ?>
                                    </i>
                                </button>
                            </a>
                            <br><br>
                            <?php
                            $commentdata = mysqli_query($db, "SELECT * FROM comment_section WHERE id_post = '$postFeed[id_post]' ORDER BY id ASC LIMIT 3 ");
                            while ($commentpost = mysqli_fetch_array($commentdata)) {
                                $commentating = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM user WHERE name = '$commentpost[cName]' "))
                            ?>
                                <div class="alert alert-light" style="font-size: 12px;" <?= $commentpost['id_post']; ?>>
                                    <span style="float: right;"><?= $commentpost['cDate']; ?></span>
                                    <img class="img-profile rounded-circle" style="width: 26px; length:26px;" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                                    <span><?= $commentpost['cName']; ?></span><br><br>
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
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#postModal">
                        <div class="scroll-to-top rounded">
                            <i class="fas fa-feather text-white"></i>
                        </div>
                    </a>
                </div>
            </id>
        </div>
        <!-- End of discussion feed -->
    </div>
    <!-- End of Content Wrapper -->

    <!-- End of Main Content -->



    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->


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