<?php
date_default_timezone_set('Asia/Jakarta');
$hari = date('d/m/Y');
$sqlCommand2 = "SELECT COUNT(*) FROM `kelas`"; 
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
<h2>Admin HomePage</h2>
<h5>Selamat Datang Kembali <?php echo $_SESSION['username']; ?> </h5>
      <div class="col-md-4 col-sm-4 col-xs-5">           
      <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-graduation-cap"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text" style="font-size: 130%">Ada <?php echo "$row2[0]"?> Kelas</p>
                    <p class="text-muted">Di dalam Database</p>
                    <a href="?page=viewkelas" class="btn btn-success">Lihat</a>
                </div>
             </div>
         </div>
            <div class="col-md-4 col-sm-5 col-xs-5">           
      <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-users"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"style="font-size: 130%">Ada <?php echo "$row3[0]" ?> Siswa</p>
                    <p class="text-muted">Di Dalam Database</p>
                    <a href="?page=viewsiswa" class="btn btn-primary">Lihat</a>
                </div>
             </div>
         </div>
            <div class="col-md-4 col-sm-5 col-xs-5">           
      <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-calendar"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text" style="font-size: 130%">Ada <?php echo "$s " ?> Siswa</p>
                    <p class="text-muted" style="font-size: 13px;">Belum Melakukan Absensi</p>
                    <a href="?page=absensisiswa" class="btn btn-danger">Lihat</a>
                </div>
             </div>
         </div>