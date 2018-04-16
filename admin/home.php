<?php
    session_start();
    include_once  "../class/Db.php";
    include_once  "../class/Fungsi.php";

    $username = $ff->sess('username');
    if ($username == "") {
        $ff->alert('Anda harus login dulu untuk mengakses halaman ini!');
        $ff->redirect('index.php?err=2');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Admin Template</title>

        <!-- Bootstrap -->
        <link href="../vendor/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../style/css/admin.css">
    </head>
    <body>
        <div class="container-fluid display-table">
            <div class="row display-table-row">
                <!-- side-menu -->
                <div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">
                    <h1 class="hidden-sm hidden-xs">Navigation</h1>
                    <ul>
                        <li class="link active">
                            <a href="?hal=dashboard">
                                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                                <span class="hidden-sm hidden-xs">Dahsboard</span>
                            </a>
                        </li>
                        <li class="link">
                            <a href="?hal=tarif-data">
                                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                <span class="hidden-sm hidden-xs">Data Tarif</span>
                                <?php
                                    $q = $odb->select("tarif");
                                    $a = $odb->nur($q);
                                ?>
                                <span class="label label-warning pull-right hidden-sm hidden-xs"><?=$a?></span>
                            </a>
                        </li>
                        <li class="link">
                            <a href="?hal=pelanggan-data">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                <span class="hidden-sm hidden-xs">Data Pelanggan</span>
                                <?php
                                    $q = $odb->select("pelanggan");
                                    $a = $odb->nur($q);
                                ?>
                                <span class="label label-success pull-right hidden-sm hidden-xs"><?=$a?></span>
                            </a>
                        </li>
                        <li class="link">
                            <a href="?hal=penggunaan-data">
                                <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                                <span class="hidden-sm hidden-xs">Data Pengguna</span>
                                <?php
                                    $q = $odb->select("penggunaan");
                                    $a = $odb->nur($q);
                                ?>
                                <span class="label label-success pull-right hidden-sm hidden-xs"><?=$a?></span>
                            </a>
                        </li>
                        <li class="link settings-btn">
                            <a href="?hal=laporan">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                <span class="hidden-sm hidden-xs">Laporan</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- menu-content-area -->
                <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                    <div class="row">
                        <header id="nav-header" class="clearfix">
                            <div class="col-md-5">
                                <nav class="navbar-default pull-left">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu">
                                        <span class="sr-only">Navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </nav>
                                <form action="cari.php" method="get">
                                    <input type="text" name="cari" id="header-search-field" class="hidden-sm hidden-xs"  placeholder="cari pelanggan disini . . .">
                                </form>
                            </div>
                            <div class="col-md-7">
                                <ul class="pull-right">
                                    <li id="welcome" class="hidden-xs">Admin Pembayaran Listrik Online</li>
                                    <li class="fixed-width">
                                        <a href="#">
                                            <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                                            <span class="label label-warning">3</span>
                                        </a>
                                    </li>
                                    <li class="fixed-width">
                                        <a href="">
                                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                            <span class="label label-danger">3</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="logout.php" class="logout">
                                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                            Log out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </header>
                    </div>
                    <div id="content">
                        <?php 
                            $hal = isset($_GET['hal'])?$_GET['hal']:"dashboard";
                            include ("$hal".".php");
                        ?>
                    </div>
                    <!-- footer -->
                    <div class="row">
                        <footer id="footer" class="clearfix">
                            <div class="pull-left">
                                <b>Copyright</b> &copy; RIKA AN ROKHIM -
                                <b>Show Full <a href="">Code In Here</a></b>
                            </div>
                            <div class="pull-right">RPL II - 2018</div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="../vendor/js/bootstrap.min.js"></script>
        <script src="../style/js/admin.js"></script>
    </body>
</html>