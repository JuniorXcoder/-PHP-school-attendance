<?php
date_default_timezone_set('Asia/jakarta');
$koneksi = new mysqli ("localhost", "id8349832_db_test", "admin", "id8349832_db_test");
error_reporting(0);
include "auth.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
	<!-- BOOTSTRAP STYLES-->
    <link rel="stylesheet" type="text/css" href="../assets/css/ngegaya.css"/>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
         <!-- TABLE STYLES-->
    <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="?page=beranda">Admin Page</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust"><i class="fa fa-sign-out"></i>Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../assets/img/logo_smk.png" class="user-image img-responsive"/>
                      <li>
                        <a  href="?page=beranda"><i class="fa fa-home fa-3x"></i>Beranda</a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-graduation-cap fa-3x"></i>Data Kelas<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                              <a href="?page=inputkelas">Input Data Kelas</a>
                            </li>
                            <li>
                              <a href="?page=viewkelas">View Data Kelas</a>
                            </li>
                            </ul>
                      <li>
                        <a href="#"><i class="fa fa-users fa-3x"></i>Data Siswa<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                              <a href="?page=inputsiswa">Input Data Siswa</a>
                            </li>
                            <li>
                              <a href="?page=viewsiswa">View Data Siswa</a>
                            </li>
    
                            </ul>
                            </li>
                      <li>
                        <a  href="?page=absensisiswa"><i class="fa fa-calendar fa-3x"></i>Absensi Hari Ini</a>
                      </li>
                      <li>
                        <a  href="?page=report"><i class="fa fa-clipboard fa-3x"></i>Report Absen</a>
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

            if ($page == "beranda") {
              include "page/beranda/beranda.php";
            }
            if ($page == "inputkelas") {
              if($action == ""){
              include "page/kelas/index.php";
            }elseif ($action == "inputsekretaris") {
              include "page/kelas/sek.php";
            }elseif ($action == "siswa") {
              include "page/kelas/siswa.php";
            }
        }
            if ($page == "viewkelas") {
               if ($action == "") {
              include "page/kelas/view.php";
            }elseif ($action == "edit") {
              include "page/kelas/edit.php";
            }elseif ($action == "delete") {
              include "page/kelas/delete.php";
            }
          }
            if ($page == "inputsiswa") {
              include "page/data/input/index_add.php";
            }
            if ($page == "report") {
              if ($action == "") {
                include "page/report/proses.php";
              }elseif($action == "view"){
                include "page/report/view.php";
              }
          } 
            if ($page == "viewsiswa") {
              if ($action == "") {
              include "page/data/view/index.php";
            }elseif ($action == "details") {
              include "page/data/view/details.php";
            }elseif ($action == "generate") {
              include "page/qrgenerate/index.php";
            }elseif ($action == "edit") {
              include "page/data/view/edit.php";
            }elseif ($action == "delete") {
              include "page/data/view/delete.php";
            }elseif ($action == "view") {
              include "page/data/view/view.php";
            }
          }
            if ($page == "absensisiswa") {
              include "page/absen/index.php";
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
    <script src="../assets/js/select2.full.min.js"></script>
    <script type="text/javascript" src="../assets/js/adapter.min.js"></script>
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="../assets/js/app.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
        <script src="../assets/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
          $('#sandbox-container .input-group.date').datepicker({
});
        </script>
</body>
</html>