<?php
date_default_timezone_set('Asia/Jakarta');
$hari = date('d/m/Y');
$kelas = $_SESSION['kelas'];
$sqlCommand2 = "SELECT COUNT(*) FROM `kelas` WHERE `id`='$kelas'"; 
$query2 = mysqli_query($koneksi, $sqlCommand2) or die (mysqli_error($koneksi)); 
$row2 = mysqli_fetch_row($query2);
mysqli_free_result($query2); 
$sqlCommand3 = "SELECT COUNT(*) FROM `siswa`"; 
$query3 = mysqli_query($koneksi, $sqlCommand3) or die (mysqli_error($koneksi)); 
$row3 = mysqli_fetch_row($query3);
mysqli_free_result($query3); 
$sqlCommand4 = "SELECT COUNT(*) FROM `absensi` where `tanggal` = '$hari' "; 
$query4 = mysqli_query($koneksi, $sqlCommand4) or die (mysqli_error($koneksi)); 
$row4 = mysqli_fetch_row($query4);
mysqli_free_result($query4); 
$s = $row3[0] - $row4[0];
mysqli_close($koneksi);
?>
<h2><?php echo $_SESSION['username']; ?> Home Page</h2>
<h5>Selamat Datang Kembali Siswa Kelas <?php echo $_SESSION['username']; ?> </h5>
            <div class="col-md-5 col-sm-5 col-xs-5">           
      <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-users"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"style="font-size: 130%">Ada <?php echo "$row3[0]" ?> Siswa</p>
                    <p class="text-muted">Di Dalam Database</p>
                </div>
             </div>
         </div>
            <div class="col-md-5 col-sm-5 col-xs-5">           
      <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-calendar"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text" style="font-size: 130%">Ada <?php echo "$s " ?></p>
                    <p class="text-muted">Yang Belum Melakukan Absensi</p>
                </div>
             </div>
         </div>