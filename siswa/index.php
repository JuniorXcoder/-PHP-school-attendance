<?php
$koneksi = new mysqli ("localhost", "id8349832_db_test", "admin", "id8349832_db_test");
include "auth.php";
$kelas = $_SESSION['kelas'];
$sesi_username = $_SESSION['username'];
$sqlkelas = $koneksi->query("SELECT * FROM `kelas` WHERE `id`='$kelas'");
$nkelas = $sqlkelas->fetch_assoc();
error_reporting(0)
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
	<!-- BOOTSTRAP STYLES-->
    <link rel="stylesheet" type="text/css" href="assets/css/ngegaya.css"/>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
         <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?page=beranda"><?php echo $_SESSION['username']; ?> Page</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/logo_smk.png" class="user-image img-responsive"/>
                      <li>
                        <a  href="?page=beranda"><i class="fa fa-home fa-3x"></i>Beranda</a>
                      </li>
                      <li>
                        <a  href="?page=datasiswa"><i class="fa fa-users fa-3x"></i>View Data Siswa</a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-calendar fa-3x"></i>Absensi Siswa<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                              <a href="?page=inputabsensi">Input Absensi</a>
                            </li>
                            <li>
                              <a href="?page=viewabsensi">View Absensi</a>
                            </li>
                            </ul>
                        </li>
                      <li>
                        <a  href="?page=setting"><i class="fa fa-cogs fa-3x"></i>Pengaturan Akun</a>
                      </li>
                      <li>
                        <a  href="logout.php"><i class="fa fa-sign-out fa-3x"></i>Logout</a>
                      </li>
        </li>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
            <?php
            $page = $_GET['page'];
            $action = $_GET['action'];
            if ($page == "inputabsensi") {
              if ($action == "") {
              include "page/absen/index_add.php";
              }elseif ($action == "submit") {
              include "page/absen/submit_add.php";
            }
            }elseif ($page == "viewabsensi") {
              include "page/absen/index.php";
            }elseif ($page == "datasiswa") {
              if ($action == "") {
              include "page/data/view.php";
            }elseif($action == "details"){
              include "page/data/details.php";
            }
          }elseif ($page == "setting") {
            if ($action == "") {
              include "page/setting/index.php";
            }elseif ($action == "submit") {
              include "page/setting/sub_edit.php";
            }
          }elseif ($page == "changepassword") {
            if ($action == "") {
              include "page/setting/index_password.php";
            }elseif ($action == "submit") {
              include "page/setting/sub_password.php";
            }
          }elseif ($page == "beranda") {
              include "page/beranda/beranda.php";
            }
            ?>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/select2.full.min.js"></script>
    <script type="text/javascript" src="assets/js/adapter.min.js"></script>
    <script type="text/javascript" src="assets/js/vue.min.js"></script>
    <script type="text/javascript" src="assets/js/instascan.min.js"></script>
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/app.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
        <script src="assets/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
          $('#sandbox-container .input-group.date').datepicker({
});
        </script>
</body>
</html>