<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemilwa 2021</title>
    <!-- Bootstrap Styles-->
    <link href="<?=base_url();?>/assets/admin/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- FontAwesome Styles-->
    <!-- Morris Chart Styles-->
    <link href="<?=base_url();?>/assets/admin/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="<?=base_url();?>/assets/admin/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url();?>index.html">Pemilwa 2021</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="<?=base_url();?>#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?=base_url();?>pemilwa/admin"><i class="fa fa-user fa-fw"></i> Admin</a>
                        <li><a href="<?=base_url();?>pemilwa/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="<?=base_url();?>pemilwa/dashboard"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?=base_url();?>pemilwa/paslon"><i class="fa fa-desktop"></i>Paslon BEM</a>
                    </li>
					<li>
                        <a href="<?=base_url();?>pemilwa/bpm"><i class="fa fa-bookmark"></i>Calon BPM</a>
                    </li>
                    <li>
                        <a href="<?=base_url();?>pemilwa/pemilih"><i class="fa fa-users"></i>Pemilih</a>
                    </li>
                </ul>

            </div>

        </nav>
    <script src="<?=base_url();?>/assets/admin/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="<?=base_url();?>/assets/admin/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="<?=base_url();?>/assets/admin/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="<?=base_url();?>/assets/admin/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?=base_url();?>/assets/admin/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="<?=base_url();?>/assets/admin/js/custom-scripts.js"></script>
    <script src="<?=base_url();?>assets/admin/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?=base_url();?>assets/admin/js/dataTables/dataTables.bootstrap.js"></script>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
        <?php
                $this->load->view($content_view);
            ?>
            <!-- /. PAGE INNER  -->
            
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
</body>

</html>